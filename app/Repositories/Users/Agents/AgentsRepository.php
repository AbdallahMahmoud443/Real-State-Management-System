<?php

namespace App\Repositories\Users\Agents;

use App\Models\Agent;
use App\Repositories\Users\BaseUsersRepository;
use App\Repositories\Users\Contracts\AgentsRepositoryContract;

class AgentsRepository extends BaseUsersRepository implements AgentsRepositoryContract
{
    public function __construct(protected Agent $agent)
    {
        parent::__construct($this->agent);
    }
}
