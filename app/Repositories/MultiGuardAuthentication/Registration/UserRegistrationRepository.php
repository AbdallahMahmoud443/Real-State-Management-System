<?php

namespace App\Repositories\MultiGuardAuthentication\Registration;

use App\Models\User;
use App\Repositories\MultiGuardAuthentication\Registration\Contracts\UserRegistrationContract;

class UserRegistrationRepository extends BaseRegistrationRepository implements UserRegistrationContract
{
    public function __construct(protected User $user)
    {
        parent::__construct($this->user);
    }
}
