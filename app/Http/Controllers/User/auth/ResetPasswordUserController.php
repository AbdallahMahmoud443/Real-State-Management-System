<?php

namespace App\Http\Controllers\User\auth;

use App\Http\Controllers\Controller;
use App\Services\MultiGuardAuthentication\user\UserResetPasswordService;
use Illuminate\Http\Request;


class ResetPasswordUserController extends Controller
{
    //
    public function __construct(protected UserResetPasswordService $userResetPasswordService) {}
    public function forgetPassword()
    {
        return view('user.auth.forget-password');
    }
    public function postForgetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $email = $request->email;
        $result = $this->userResetPasswordService->ForgetPassword($email);
        if ($result === false) return redirect()->back()->with('error', 'Email Not Found :(');
        return redirect()->back()->with('success', 'Verification email send successfully, please check provided mail');
    }
    public function resetPassword($email, $token)
    {
        $user = $this->userResetPasswordService->getSystemUserForResetPassword($email, $token);
        if (!$user) {
            return redirect()->route('user.login.show')->with('error', 'Invalid Provided Token or Email');
        }
        // todo: send (email & token to used then to send post request to postResetPassword function)
        return view('user.auth.reset-password', compact('email', 'token'));
    }
    public function postResetPassword(Request $request, $email, $token)
    {
        // todo: validate data
        $request->validate([
            'password' => 'required|min:8|max:100',
            'confirm_password' => 'required|same:password'
        ]);
        $result = $this->userResetPasswordService->postResetPassword($email, $token, $request->password);
        if (!$result) return redirect()->route('user.login.show')->with('error', 'Invalid Provided Token or Email');
        return redirect()->route('user.login.show')->with('success', 'Password Update Successfully');
    }
}
