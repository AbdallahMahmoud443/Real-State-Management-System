<?php

namespace App\Repositories\MultiGuardAuthentication\Update_profile\Contracts;

use App\Repositories\MultiGuardAuthentication\Update_profile\Contracts\BaseUpdateProfileContract;

interface AgentUpdateProfileContract extends BaseUpdateProfileContract
{
    /**
     * Update  Admin Profile
     * @param array ProfileData
     * @return bool
     */
    public function UpdateAgentProfile(array $data);
}
