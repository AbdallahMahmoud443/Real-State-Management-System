<?php

namespace App\Repositories\MultiGuardAuthentication\Update_profile\Contracts;

use App\Repositories\MultiGuardAuthentication\Update_profile\Contracts\BaseUpdateProfileContract;

interface AdminUpdateProfileContract extends BaseUpdateProfileContract
{
    /**
     * Update  Admin Profile
     * @param array ProfileData
     * @return bool
     */
    public function UpdateAdminProfile(array $data);
}
