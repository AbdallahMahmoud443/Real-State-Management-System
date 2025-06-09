<?php

namespace App\Services\MultiGuardAuthentication\Contracts;

interface UpdateProfileServiceContract
{
    /**
     * update profile data
     * @param array $validated_data
     * @return void
     */
    public function UpdateProfile($validated_data): void;
    /**
     * update profile Image
     * @param File $image
     * @return void
     */
    public function uploadImageProfile($image): void;
}
