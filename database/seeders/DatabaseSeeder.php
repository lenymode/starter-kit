<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\ACL\AdminSeeder;
use Database\Seeders\ACL\PermissionSeeder;
use Database\Seeders\ACL\RoleSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {      
        // $this->call([RoleSeeder::class]);
        $this->call([AdminSeeder::class]);
        $this->call([PermissionSeeder::class]);
    }
}
