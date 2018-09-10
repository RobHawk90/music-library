<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return $users;
    }

    public function show(User $user)
    {
        return $user;
    }

    public function store(UserRequest $req)
    {
        $user = $req->validated();
        $user['password'] = bcrypt($user['password']);
        $user = User::create($user);
        return $this->buildResponse($user);
    }

    public function update(Request $req, User $user)
    {
        if (isset($req->password)) {
            $this->validate(request(), ['password' => 'required|confirmed|min:5|max:191']);
            $user->password = bcrypt($req->password);
        }

        if ($user->needChangeEmail()) {
            $this->validate(request(), ['email' => 'required|email|unique:users|max:191']);
        }

        $user->name = $req->name;
        $user->access = $req->access;
        $user->email = $req->email;
        $user->save();

        return $this->buildResponse($user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return ['msg' => sprintf(__("The user '%s' was removed"), $user->name)];
    }

    private function buildResponse($user)
    {
        return [
            'msg' => sprintf(__("The user '%s' was saved"), $user->name),
            'data' => $user,
        ];
    }
}
