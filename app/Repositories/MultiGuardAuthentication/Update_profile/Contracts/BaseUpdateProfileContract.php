<?php

namespace App\Repositories\MultiGuardAuthentication\Update_profile\Contracts;

use Illuminate\Database\Eloquent\Model;

interface BaseUpdateProfileContract
{
    /**
     * GET Authenticated User To Update Profile
     * @param String guard
     * @return Model
     */
    public function getAuthenticatedUser(): Model;
    /**
     * GET ID Authenticated User to unique Email
     * @return Model
     */
    public function getIdOfAuthenticatedUser(): int;
    /**
     * Update User's Image Profile
     *  void
     */
    public function UpdateSystemUserImageProfile(array $image): void;
}
