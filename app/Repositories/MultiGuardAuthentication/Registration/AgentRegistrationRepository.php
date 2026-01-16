<?php

namespace App\Repositories\MultiGuardAuthentication\Registration;

use App\Models\Agent;
use App\Repositories\MultiGuardAuthentication\Registration\Contracts\AgentRegistrationContract;

class AgentRegistrationRepository extends BaseRegistrationRepository implements AgentRegistrationContract
{
    public function __construct(protected Agent $agent)
    {
        parent::__construct($this->agent);
    }
}
