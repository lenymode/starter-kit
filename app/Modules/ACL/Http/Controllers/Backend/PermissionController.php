<?php

namespace App\Modules\ACL\Http\Controllers\Backend;

use App\DataTables\ACL\PermissionDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['roles.index','roles.store']]);
         $this->middleware('permission:role-create', ['only' => ['roles.create','roles.store']]);
         $this->middleware('permission:role-edit', ['only' => ['roles.edit','roles.update']]);
         $this->middleware('permission:role-delete', ['only' => ['roles.destroy']]);
    }
    public function index(PermissionDataTable $dataTable, Permission $permissions)
    {
        return $dataTable->render("ACL::permissions.index",compact('permissions'));
    }

    public function create()
    {
        return view("ACL::permissions.create");
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required']);

        Permission::create($validated);

        return to_route('ACL::permissions.index');
    }

    public function edit(Permission $permission)
    {
        $roles = Role::all();
        return view('ACL::permissions.edit', compact('permission', 'roles'));
    }

    public function update(Request $request, Permission $permission)
    {
        $validated = $request->validate(['name' => 'required']);
        $permission->update($validated);

        return to_route('ACL::permissions.index');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        return back()->with('message', 'Permission deleted.');
    }

    public function assignRole(Request $request, Permission $permission)
    {
        if ($permission->hasRole($request->role)) {
            return back()->with('message', 'Role exists.');
        }

        $permission->assignRole($request->role);
        return back()->with('message', 'Role assigned.');
    }

    public function removeRole(Permission $permission, Role $role)
    {
        if ($permission->hasRole($role)) {
            $permission->removeRole($role);
            return back()->with('message', 'Role removed.');
        }

        return back()->with('message', 'Role not exists.');
    }
}
