<?php

namespace App\Repositories\MultiGuardAuthentication\Auth;

use App\Repositories\MultiGuardAuthentication\Auth\BaseAuthRepository;
use App\Repositories\MultiGuardAuthentication\Auth\Contracts\UserAuthContract;

class UserAuthRepository extends BaseAuthRepository implements UserAuthContract
{
    public function __construct(protected string $guard = 'web')
    {
        parent::__construct($this->guard);
    }
}
