<?php

namespace Database\Seeders\ACL;

use App\Modules\User\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'admin', 
            'email' => 'admin@mail.com',
            'password' => bcrypt('password')
        ]);
    
        $role = Role::create(['name' => 'admin']);
        $permissions = Permission::all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);

        $user = User::create([
            'name' => 'user@mail.com', 
            'email' => 'user@mail.com',
            'password' => bcrypt('password')
        ]);
    }
}
