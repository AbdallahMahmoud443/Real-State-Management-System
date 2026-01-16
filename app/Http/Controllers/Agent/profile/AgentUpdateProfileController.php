<?php

namespace App\Http\Controllers\Agent\profile;

use App\Http\Controllers\Controller;
use App\Services\MultiGuardAuthentication\agent\AgentUpdateProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentUpdateProfileController extends Controller
{
    //
    public function __construct(protected AgentUpdateProfileService $agentUpdateProfileService) {}
    public function profile()
    {
        return view('agent.profile.profile');
    }
    public function postProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email|unique:agents,email,' . Auth::guard('agent')->user()->id,
            'designation' => 'string',
            'company' => 'string',
            'biography' => 'min:100|max:500',
            'confirm_password' => 'same:password',
        ]);
        if ($request->has('photo') && $request->file('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $this->agentUpdateProfileService->uploadImageProfile($request->file('photo'));
        }
        $this->agentUpdateProfileService->UpdateProfile($request->all());
        return redirect()->back()->with('success', 'Profile Updated Successfully');
    }
}
