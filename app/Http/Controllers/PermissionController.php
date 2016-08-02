<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Http\Requests;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        return Permission::all();
    }
}
