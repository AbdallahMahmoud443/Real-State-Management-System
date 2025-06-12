<?php

namespace App\Http\Controllers\Agent\auth;

use App\Http\Controllers\Controller;
use App\Services\MultiGuardAuthentication\Agent\AgentRegistrationService;
use Illuminate\Http\Request;

class AgentRegistrationController extends Controller
{
    //
    public function __construct(protected AgentRegistrationService $agentRegistrationService) {}
    public function register()
    {
        return view('agent.auth.register');
    }
    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100|string',
            'email' => 'required|email|unique:agents,email',
            'designation' => 'required|min:3|max:100|string',
            'company' => 'required|min:3|max:100|string',
            'password' => 'required|min:8|max:100',
            'confirm_password' => 'required|same:password'
        ]);
        $validated_data = $request->only('name', 'email', 'password', 'designation', 'company');
        $this->agentRegistrationService->postRegister($validated_data);
        return redirect()->route('agent.login.show')->with('success', 'Verification Email Send Successfully,please Check inbox of provided Email');
    }
    public function postRegisterVerify($token)
    {
        $result = $this->agentRegistrationService->RegisterVerify($token);
        if (!$result) return redirect()->route('agent.login.show')->with('error', 'invalid token');
        return redirect()->route('agent.login.show')->with('success', 'Registration Process Complete Successfully');
    }
}
