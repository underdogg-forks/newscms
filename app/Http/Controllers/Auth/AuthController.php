<?php

namespace App\Http\Controllers\Auth;

use App\Events\Auth\Login;
use App\Events\Auth\Logout;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        $event = event(new Login($credentials));
        if ($event) {
            return redirect()->intended();
        } else {
            return redirect('admin/login');
        }
    }

    public function logout()
    {
        $user = \Sentinel::getUser();
        \Sentinel::logout($user);
        event(new Logout($user->getUserId()));
        return redirect('/');
    }
}
