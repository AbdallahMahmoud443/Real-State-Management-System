<?php

namespace App\Repositories\MultiGuardAuthentication\Reset_password;

use App\Repositories\MultiGuardAuthentication\Reset_password\ResetPasswordRepository;
use App\Models\User;
use App\Repositories\MultiGuardAuthentication\Reset_password\Contracts\UserResetPasswordContract;

class UserResetPasswordRepository extends ResetPasswordRepository implements UserResetPasswordContract
{
    public function __construct(protected User $user)
    {
        parent::__construct($this->user);
    }
}
