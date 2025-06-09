<?php

namespace App\Repositories\MultiGuardAuthentication\Reset_password\Contracts;

use Illuminate\Database\Eloquent\Model;


interface BaseResetPasswordContract
{
    /**
     * Get Admin or user by email
     * @param string email
     * @return Model
     */
    public function GetSystemUser(string $email): ?Model;
    /**
     * Get Admin or user by email and token to reset password
     * @param string email
     * @param string token
     * @return Model
     */
    public function GetSystemUserWithTokenAndEmail(string $email, string $token): ?Model;
}
