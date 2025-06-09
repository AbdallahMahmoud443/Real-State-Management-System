<?php

namespace App\Http\Controllers\Admin\profile;

use App\Http\Controllers\Controller;
use App\Services\MultiGuardAuthentication\admin\AdminUpdateProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminProfileController extends Controller
{
    public function __construct(protected AdminUpdateProfileService $adminUpdateProfileService) {}

    public function profile()
    {
        return view('Admin.profile.profile');
    }
    public function postProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email|unique:users,email,' . Auth::guard('admin')->user()->id,
            'confirm_password' => 'same:password'
        ]);
        if ($request->has('photo') && $request->file('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            // todo : update image profile
            $this->adminUpdateProfileService->uploadImageProfile($request->file('photo'));
        }
        $this->adminUpdateProfileService->UpdateProfile($request->only('name', 'email', 'password'));
        return redirect()->back()->with('success', 'Profile Updated Successfully');
    }
}
