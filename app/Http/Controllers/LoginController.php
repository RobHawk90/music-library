<?php

namespace App\Http\Controllers;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login()
    {
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt(request(['email', 'password']))) {
            return redirect()->home();
        }

        return back();
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->home();
    }

    public function permission()
    {
        return view('permission');
    }
}
