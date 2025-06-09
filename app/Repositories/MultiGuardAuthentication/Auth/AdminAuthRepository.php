<?php

namespace App\Repositories\MultiGuardAuthentication\Auth;

use App\Repositories\MultiGuardAuthentication\Auth\BaseAuthRepository;
use App\Repositories\MultiGuardAuthentication\Auth\Contracts\AdminAuthContract;

class AdminAuthRepository extends BaseAuthRepository implements AdminAuthContract
{
    public function __construct(protected string $guard = 'admin')
    {
        parent::__construct($this->guard);
    }
}
