<?php

namespace App\Services\MultiGuardAuthentication\Contracts;

interface  RegisterEmailVerificationContract
{
    /**
     * Send Verification Email to Complete Registration Process
     * @param $token
     * @param $name
     * @param $userType

     */
    public function SendVerificationEmail(string $token, string $name, string $userType): void;
}
