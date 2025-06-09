<?php

namespace App\Services\MultiGuardAuthentication\admin;

use App\Repositories\MultiGuardAuthentication\Auth\Contracts\AdminAuthContract;
use App\Services\MultiGuardAuthentication\Contracts\AuthServiceContract;

class AdminAuthService implements AuthServiceContract
{
    public function __construct(protected AdminAuthContract $adminAuthRepository) {}
    public function Login($validated_credentials): bool
    {
        return $this->adminAuthRepository->login($validated_credentials);
    }
    public function Logout(): void
    {
        $this->adminAuthRepository->logout();
    }
}
