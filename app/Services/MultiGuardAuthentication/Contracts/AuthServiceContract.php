<?php

namespace App\Services\MultiGuardAuthentication\Contracts;

interface AuthServiceContract
{
    /**
     * Handle Login Functionality based on System User
     * @param array validated_credentials
     * @return bool
     */
    public function Login(array $validated_credentials): bool;
    /**
     * Handle Logout Functionality based on System User
     *
     * @return void
     */
    public function Logout(): void;
}
