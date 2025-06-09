<?php

namespace App\Repositories\MultiGuardAuthentication\Update_profile\Contracts;

use App\Repositories\MultiGuardAuthentication\Update_profile\Contracts\BaseUpdateProfileContract;

interface UserUpdateProfileContract extends BaseUpdateProfileContract 
{
    /**
     * Update  User Profile
     * @param array ProfileData
     * @return bool
     */
    public function UpdateUserProfile(array $data);
}
