<?php

namespace App\Http\Controllers\User\profile;

use App\Http\Controllers\Controller;

use App\Services\MultiGuardAuthentication\user\UserUpdateProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserProfileController extends Controller
{
    public function __construct(protected UserUpdateProfileService $userUpdateProfileService) {}
    //
    public function profile()
    {
        return view('User.profile.profile');
    }
    public function postProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email|unique:users,email,' . Auth::guard('web')->user()->id,
            'phone' => 'string',
            'address' => 'string',
            'zip' => 'integer',
            'confirm_password' => 'same:password'
        ]);
        if ($request->has('photo') && $request->file('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $this->userUpdateProfileService->uploadImageProfile($request->file('photo'));
        }
        $this->userUpdateProfileService->UpdateProfile($request->all());
        return redirect()->back()->with('success', 'Profile Updated Successfully');
    }
}
