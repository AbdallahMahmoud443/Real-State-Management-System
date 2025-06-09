<?php

namespace App\Repositories\MultiGuardAuthentication\Registration\Contracts;

use Illuminate\Database\Eloquent\Model;

interface BaseRegistrationContract
{
    /**
     * Create New System User
     * @param array data
     */
    public function CreateUser(array $data): void;
    /**
     * Get User by token to verify Registration
     * @param string token
     */
    public function getUserByToken(string $token): ?Model;
}
