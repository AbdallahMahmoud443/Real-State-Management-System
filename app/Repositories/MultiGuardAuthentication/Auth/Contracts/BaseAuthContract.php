<?php

namespace App\Repositories\MultiGuardAuthentication\Auth\Contracts;

interface BaseAuthContract
{
    /**
     * Login Method
     * @param array credentials

     */
    public function login(array $credentials): bool;
    /**
     * Logout Method
     *@param string guard
     */
    public function logout(): void;
}
