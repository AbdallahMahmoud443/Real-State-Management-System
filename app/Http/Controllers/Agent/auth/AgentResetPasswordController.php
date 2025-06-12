<?php

namespace App\Http\Controllers\Agent\auth;

use App\Http\Controllers\Controller;
use App\Repositories\MultiGuardAuthentication\Reset_password\Contracts\AgentResetPasswordContract;
use App\Services\MultiGuardAuthentication\agent\AgentResetPasswordService;
use Illuminate\Http\Request;

class AgentResetPasswordController extends Controller
{
    public function __construct(protected AgentResetPasswordService $agentResetPasswordService) {}
    public function forgetPassword()
    {
        return view('agent.auth.forget-password');
    }
    public function postForgetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $email = $request->email;
        $result = $this->agentResetPasswordService->ForgetPassword($email);
        if ($result === false) return redirect()->back()->with('error', 'Email Not Found :(');
        return redirect()->back()->with('success', 'Verification email send successfully, please check provided mail');
    }
    public function resetPassword($email, $token)
    {
        $agent = $this->agentResetPasswordService->getSystemUserForResetPassword($email, $token);
        if (!$agent) {
            return redirect()->route('agent.login.show')->with('error', 'Invalid Provided Token or Email');
        }
        // todo: send (email & token to used then to send post request to postResetPassword function)
        return view('agent.auth.reset-password', compact('email', 'token'));
    }
    public function postResetPassword(Request $request, $email, $token)
    {
        // todo: validate data
        $request->validate([
            'password' => 'required|min:8|max:100',
            'confirm_password' => 'required|same:password'
        ]);
        $result = $this->agentResetPasswordService->postResetPassword($email, $token, $request->password);
        if (!$result) return redirect()->route('agent.login.show')->with('error', 'Invalid Provided Token or Email');
        return redirect()->route('agent.login.show')->with('success', 'Password Update Successfully');
    }
}
