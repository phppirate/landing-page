<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'Create Roles', 'slug' => 'create-roles']);
        Permission::create(['name' => 'Create Trackable Links', 'slug' => 'create-trackable-links']);
        Permission::create(['name' => 'Create Users', 'slug' => 'create-users']);
        Permission::create(['name' => 'Edit Users', 'slug' => 'edit-users']);
        Permission::create(['name' => 'View Associated Trackable Links', 'slug' => 'view-associated-trackable-links']);
        Permission::create(['name' => 'View Permissions', 'slug' => 'view-permissions']);
        Permission::create(['name' => 'View Roles', 'slug' => 'view-roles']);
        Permission::create(['name' => 'View Stats', 'slug' => 'view-stats']);
        Permission::create(['name' => 'View Trackable Links', 'slug' => 'view-trackable-links']);
        Permission::create(['name' => 'View Users', 'slug' => 'view-users']);
    }
}
