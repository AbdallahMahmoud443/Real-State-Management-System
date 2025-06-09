<?php

namespace App\Http\Controllers\Admin\auth;

use App\Http\Controllers\Controller;
use App\Services\MultiGuardAuthentication\admin\AdminAuthService;
use Illuminate\Http\Request;


class AuthenticationAdminController extends Controller
{
    //
    public function __construct(protected AdminAuthService $adminAuthService) {}
    public function login()
    {
        return view('admin.auth.login');
    }
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:20'
        ]);
        $credentials = $request->only('email', 'password');

        if ($this->adminAuthService->Login($credentials)) {
            return redirect()->route('admin.dashboard.show')->with('success', 'Admin Login successfully!');
        }
        return redirect()->route('admin.login.show')->with('error', 'Login details are not valid');
    }
    public function logout()
    {
        $this->adminAuthService->Logout();
        return redirect()->route('admin.login.show')->with('success', 'Admin logout successfully!');
    }
}
