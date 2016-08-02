<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use App\Http\Requests;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return Role::with('permissions')->get();
    }

    public function store(Request $request)
    {
        $role = Role::create($request->all());
        $role->slug = Role::generateSlug($role->name);
        $role->save();
        return $role;
    }

    public function attachPermission(Role $role, Request $request)
    {
        $permission = Permission::findOrFail($request->permission);

        if(! $role->permissions()->find($permission->id)){
            $role->permissions()->attach($permission);
        }

        return $role->permissions;
    }

    public function detachPermission(Role $role, Request $request)
    {
        $role->permissions()->detach($request->permission);
        return $role;
    }
}
