<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function list() {
        $roles = Role::paginate(10);

        return view('dashboard.roles.list', compact('roles'));
    }
}
