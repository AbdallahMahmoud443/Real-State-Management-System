<?php

namespace App\Http\Controllers\User\auth;

use App\Http\Controllers\Controller;
use App\Services\MultiGuardAuthentication\user\UserRegistrationService;
use Illuminate\Http\Request;



class RegistrationUserController extends Controller
{
    public function __construct(protected UserRegistrationService $userRegistrationService) {}
    //
    public function register()
    {
        return view('user.auth.register');
    }
    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:100',
            'confirm_password' => 'required|same:password'
        ]);
        $validated_data = $request->only('name', 'email', 'password');
        $this->userRegistrationService->postRegister($validated_data);
        return redirect()->route('user.login.show')->with('success', 'Verification Email Send Successfully,please Check inbox of provided Email');
    }
    public function postRegisterVerify($token)
    {
        $result = $this->userRegistrationService->RegisterVerify($token);
        if (!$result) redirect()->route('user.login.show')->with('error', 'invalid token');
        return redirect()->route('user.login.show')->with('success', 'Registration Process Complete Successfully');
    }
}
