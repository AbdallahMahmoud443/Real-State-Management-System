<?php

namespace App\Repositories\MultiGuardAuthentication\Reset_password;

use App\Repositories\MultiGuardAuthentication\Reset_password\ResetPasswordRepository;
use App\Models\Agent;
use App\Repositories\MultiGuardAuthentication\Reset_password\Contracts\AgentResetPasswordContract;

class AgentResetPasswordRepository extends ResetPasswordRepository implements AgentResetPasswordContract
{
    public function __construct(protected Agent $agent)
    {
        parent::__construct($this->agent);
    }
}
