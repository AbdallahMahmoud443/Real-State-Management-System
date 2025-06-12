<?php

namespace App\Repositories\MultiGuardAuthentication\Auth;

use App\Repositories\MultiGuardAuthentication\Auth\BaseAuthRepository;
use App\Repositories\MultiGuardAuthentication\Auth\Contracts\AgentAuthContract;

class AgentAuthRepository  extends BaseAuthRepository implements AgentAuthContract
{
    public function __construct(protected string $guard = 'agent')
    {
        parent::__construct($this->guard);
    }
}
