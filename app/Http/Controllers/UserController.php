<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;

class UserController extends AuthController
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $user = new User;
        $user->name = old('name');
        $user->email = old('email');
        $user->access = old('access');
        return view('users.create', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function store(UserRequest $req)
    {
        $req->password = bcrypt($req->password);
        User::create($req->validated());
        return redirect('/users');
    }

    public function update(UserRequest $req, User $user)
    {
        $user->name = $req->name;
        $user->password = bcrypt($req->password);
        $user->access = $req->access;
        $user->save();
        return redirect('/users');
    }

    public function destroy(User $user)
    {
        $user->delete();
    }
}
