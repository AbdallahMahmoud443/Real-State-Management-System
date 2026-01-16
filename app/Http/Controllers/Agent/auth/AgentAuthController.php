<?php

namespace App\Http\Controllers\Agent\auth;

use App\Http\Controllers\Controller;
use App\Services\MultiGuardAuthentication\agent\AgentAuthService;
use Illuminate\Http\Request;

class AgentAuthController extends Controller
{
    public function __construct(protected AgentAuthService $agentAuthService) {}
    public function login()
    {
        return view('agent.auth.login');
    }
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:20'
        ]);
        $credentials = $request->only('email', 'password');
        // hint if status 0 => agent can not logged in website before verify your email
        $credentials['status'] = 1;
        if ($this->agentAuthService->Login($credentials)) {
            return redirect()->route('agent.dashboard.show')->with('success', 'Agent Login successfully!');
        }
        return redirect()->route('agent.login.show')->with('error', 'Login details are not valid');
    }
    public function logout()
    {
        $this->agentAuthService->Logout();
        return redirect()->route('agent.login.show')->with('success', 'Agent logout successfully!');
    }
}
