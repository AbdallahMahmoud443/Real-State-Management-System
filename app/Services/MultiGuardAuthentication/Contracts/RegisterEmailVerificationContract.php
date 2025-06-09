<?php

namespace App\Services\MultiGuardAuthentication\Contracts;

interface  RegisterEmailVerificationContract
{
    /**
     * Send Verification Email to Complete Registration Process
     * @param $token
     * @param $name

     */
    public function SendVerificationEmail(string $token, string $name): void;
}
