<?php

namespace App\Services\MultiGuardAuthentication\admin;

use App\Repositories\MultiGuardAuthentication\Update_profile\Contracts\AdminUpdateProfileContract;
use App\Services\MultiGuardAuthentication\Contracts\UpdateProfileServiceContract;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AdminUpdateProfileService implements UpdateProfileServiceContract
{

    public function __construct(protected AdminUpdateProfileContract $adminUpdateProfileRepo) {}


    public function UpdateProfile($validated_data): void
    {
        // todo : update admin profile
        $this->adminUpdateProfileRepo->UpdateAdminProfile($validated_data);
    }
    public function uploadImageProfile($image): void
    {
        $admin = $this->adminUpdateProfileRepo->getAuthenticatedUser();
        if ($admin->photo != null) {
            File::delete(public_path($admin->photo));
        }
        $customFileName = 'admin_' . Str::uuid()  .  $image->getClientOriginalExtension();
        $path = $image->storeAs('/admin/profile_images', $customFileName, 'public');
        $this->adminUpdateProfileRepo->UpdateSystemUserImageProfile(['photo' => '/uploads/' . $path]);
    }
}
