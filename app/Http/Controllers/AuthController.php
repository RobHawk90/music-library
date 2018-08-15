<?php

namespace App\Http\Controllers;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function userLevel()
    {
        $hasAccess = $this->isAccess('User') || $this->isAccess('Admin');
        if (!$hasAccess) {
            return view('permission');
        }
    }

    private function isAccess($level)
    {
        return auth()->user()->access === $level;
    }
}
