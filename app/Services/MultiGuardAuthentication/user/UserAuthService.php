<?php

namespace App\Services\MultiGuardAuthentication\user;

use App\Repositories\MultiGuardAuthentication\Auth\Contracts\UserAuthContract;
use App\Services\MultiGuardAuthentication\Contracts\AuthServiceContract;

class UserAuthService implements AuthServiceContract
{
    public function __construct(protected UserAuthContract $userAuthRepository) {}

    public function Login($validated_credentials): bool
    {
        return $this->userAuthRepository->login($validated_credentials);
    }
    public function Logout(): void
    {
        $this->userAuthRepository->logout();
    }
}
