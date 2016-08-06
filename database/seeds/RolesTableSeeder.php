<?php

use App\Role;
use App\Permission;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => 'Admin',
            'slug' => 'admin'
        ]);
            $adminPermissions = Permission::pluck('id');
            // dd($adminPermissions->toArray());
            $admin->permissions()->attach($adminPermissions->toArray());
        
        $observer = Role::create([
            'name' => 'Observer',
            'slug' => 'observer'
        ]);
            $observerPermissions = Permission::where('id', '>', '4')->pluck('id');
            $observer->permissions()->attach($observerPermissions->toArray());

    }
}
