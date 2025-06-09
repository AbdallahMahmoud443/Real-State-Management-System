<?php

namespace App\Services\MultiGuardAuthentication\user;

use App\Repositories\MultiGuardAuthentication\Update_profile\Contracts\UserUpdateProfileContract;
use App\Services\MultiGuardAuthentication\Contracts\UpdateProfileServiceContract;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class UserUpdateProfileService implements UpdateProfileServiceContract
{
    public function __construct(protected UserUpdateProfileContract $userUpdateProfileRepository) {}

    public function UpdateProfile($validated_data): void
    {
        // todo : update admin profile
        $this->userUpdateProfileRepository->UpdateUserProfile($validated_data);
    }
    public function uploadImageProfile($image): void
    {
        $user = $this->userUpdateProfileRepository->getAuthenticatedUser();
        if ($user->photo != null) {
            File::delete(public_path($user->photo));
        }
        $customFileName = 'user_' . Str::uuid()  .  $image->getClientOriginalExtension();
        $path = $image->storeAs('/user/profile_images', $customFileName, 'public');
        $this->userUpdateProfileRepository->UpdateSystemUserImageProfile(['photo' => '/uploads/' . $path]);
    }
}
