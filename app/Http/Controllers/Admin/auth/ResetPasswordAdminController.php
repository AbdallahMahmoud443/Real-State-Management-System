<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MultiGuardAuthentication\admin\AdminResetPasswordService;


class ResetPasswordAdminController extends Controller
{
    public function __construct(protected AdminResetPasswordService $adminResetPasswordService) {}
    public function forgetPassword()
    {
        return view('admin.auth.forget-password');
    }
    public function postForgetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $result = $this->adminResetPasswordService->ForgetPassword($request->email);
        if ($result === false) return redirect()->back()->with('error', 'Email not found');
        return redirect()->back()->with('success', 'Verification email send successfully, please check provided mail');
    }
    public function resetPassword($email, $token)
    {
        // todo: check if admin has token send with verification email
        $admin = $this->adminResetPasswordService->getSystemUserForResetPassword($email, $token);
        if (!$admin) {
            return redirect()->route('admin.login.show')->with('error', 'Invalid Provided Token or Email');
        }
        // todo: send (email & token to used then to send post request to postResetPassword function)
        return view('admin.auth.reset-password', compact('email', 'token'));
    }
    public function postResetPassword(Request $request, $email, $token)
    {
        // todo: validate data
        $request->validate([
            'password' => 'required|min:8|max:100',
            'confirm_password' => 'required|same:password'
        ]);
        $result = $this->adminResetPasswordService->postResetPassword($email, $token, $request->password);
        if (!$result) redirect()->route('admin.login.show')->with('error', 'Invalid Provided Token or Email');
        return redirect()->route('admin.login.show')->with('success', 'Password Update Successfully');
    }
}
