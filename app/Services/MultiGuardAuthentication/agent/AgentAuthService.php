<?php

namespace App\Services\MultiGuardAuthentication\agent;

use App\Repositories\MultiGuardAuthentication\Auth\Contracts\AgentAuthContract;
use App\Services\MultiGuardAuthentication\Contracts\AuthServiceContract;

class AgentAuthService implements AuthServiceContract
{
    public function __construct(protected AgentAuthContract $agentAuthRepo) {}
    public function Login(array $validated_credentials): bool
    {
        return $this->agentAuthRepo->login($validated_credentials);
    }
    public function Logout(): void
    {
        $this->agentAuthRepo->logout();
    }
}
