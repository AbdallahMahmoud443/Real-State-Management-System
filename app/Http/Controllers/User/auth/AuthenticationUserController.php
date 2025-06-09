<?php

namespace App\Http\Controllers\User\auth;

use App\Http\Controllers\Controller;
use App\Services\MultiGuardAuthentication\user\UserAuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationUserController extends Controller
{
    public function __construct(protected UserAuthService $userAuthService) {}
    //
    public function login()
    {
        return view('user.auth.login');
    }
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:20'
        ]);
        $credentials = $request->only('email', 'password');
        // hint if status 0 => user can not logged in website before verify your email
        $credentials['status'] = 1;
        if ($this->userAuthService->Login($credentials)) {
            return redirect()->route('user.dashboard.show')->with('success', 'User Login successfully!');
        }
        return redirect()->route('user.login.show')->with('error', 'Login details are not valid');
    }
    public function logout()
    {
        $this->userAuthService->Logout();
        return redirect()->route('user.login.show')->with('success', 'User logout successfully!');
    }
}
