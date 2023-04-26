<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserController extends Controller
{
    public function list() {
        $users = User::paginate(10);

        return view('dashboard.users.list', compact('users'));
    }

    public function add() {
        $roles = Role::all();

        return view('dashboard.users.add', compact('roles'));
    }

    public function edit($user_id) {
        $user = User::findOrFail($user_id);
        $roles = Role::all();

        return view('dashboard.users.edit', compact('roles', 'user'));
    }

    public function create(Request $request) {
        $request->validate([
            'role' => ['required', 'integer'],
            'username' => ['required', 'string', 'min:3', 'max:255', 'unique:users'],
            'first_name' => ['nullable', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = new User;

        $user->role_id = $request->role;
        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->hide_profile = $request->hide ?? 0;

        if($user->save()) {
            return redirect()->route('dashboard.users')->with('status', "User $user->id created");
        }
    }

    public function update(Request $request, $user_id) {
        $request->validate([
            'role' => ['required', 'integer'],
            'username' => ['required', 'string', 'min:3', 'max:255', 'unique:users,username,' . $user_id],
            'first_name' => ['nullable', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'. $user_id],
            'password' => ['nullable', 'string', 'min:8'],
        ]);

        $user = User::findOrFail($user_id);

        $user->role_id = $request->role;
        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->email = $request->email;

        if($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if($user->save()) {
            if($request->filled('password')) {
                return redirect()->route('dashboard.users')->with('status', "User $user->id updated. Password: $request->password");
            }

            return redirect()->route('dashboard.users')->with('status', "User $user->id updated");
        }
    }
}
