<?php

namespace NewsCMS\Http\Controllers\Auth;

use NewsCMS\Http\Controllers\Controller;
use NewsCMS\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        try {
            \Sentinel::authenticate($credentials);
            return redirect()->intended();
        } catch (\Exception $e) {
            return redirect('auth/login')->withErrors('auth', $e->getMessage());
        }
    }

    public function register()
    {

    }

    public function activate()
    {

    }
}
