<?php

namespace App\Services\MultiGuardAuthentication\Contracts;

interface ResetPasswordEmailVerificationContract
/**
 * Sending Verification Email to Reset Password
 */
{
    public function SendVerificationEmail(string $email, string $token, string $name, string $userType): void;
}
