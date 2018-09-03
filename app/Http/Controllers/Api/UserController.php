<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AuthController;
use App\Http\Requests\UserRequest;
use App\User;

class UserController extends AuthController
{
    public function index()
    {
        $users = User::all();
        return $users;
    }

    public function edit(User $user)
    {
        return $user;
    }

    public function store(UserRequest $req)
    {
        $req->password = bcrypt($req->password);
        $user = User::create($req->validated());
        return $user;
    }

    public function update(UserRequest $req, User $user)
    {
        $user->name = $req->name;
        $user->password = bcrypt($req->password);
        $user->access = $req->access;
        $user->save();
        return $user;
    }

    public function destroy(User $user)
    {
        $user->delete();
    }
}
