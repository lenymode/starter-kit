<?php

namespace App\Modules\User\Http\Controllers\Backend;

use App\DataTables\User\UserDataTable;
use App\Http\Controllers\Controller;
use App\Modules\User\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDataTable $dataTable , User $users)
    {     
        return $dataTable->render("User::backend.index",compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view ("User::backend.create",compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'roles' => 'required',
   
        ]);

        $input = $request->all();
        // $input['password'] = Hash::make($input['password']);
        $password = 'password';
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        notify()->success('User created successfully');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data ['user'] = User::findOrFail ($id);
        return view ("User::backend.profile", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view ("User::backend.edit",compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        {
            $this->validate($request, [
               'name' => 'required',
               'email' => 'required',
           ]);
           $user = User::where('id', '=', $id)->first();
           $user->update($request->all());
   
        notify()->success('User updated successfully');
        return redirect()->route('users.index');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        notify()->success('User deleted successfully');
        return redirect()->route('users.index');
    }
}
