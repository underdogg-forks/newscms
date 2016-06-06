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
            $user = \Sentinel::authenticate($credentials);
            // If castle is enabled track the successful login
            if (config('services.castle.api_secret')) {
                \Castle::setApiKey(config('services.castle.api_secret'));
                \Castle::track([
                    'name' => '$login.succeeded',
                    'user_id' => $user->getUserId()
                ]);
            }
            return redirect()->intended();
        } catch (\Exception $e) {
            // If castle is enabled track the failed login
            if (config('services.castle.api_secret')) {
                \Castle::setApiKey(config('services.castle.api_secret'));
                \Castle::track([
                    'name' => '$login.failed',
                    'details' => [
                        '$login' => $credentials['email']
                    ]
                ]);
            }
            return redirect('auth/login')->withErrors('auth', $e->getMessage());
        }
    }

    public function register()
    {
    }
}
