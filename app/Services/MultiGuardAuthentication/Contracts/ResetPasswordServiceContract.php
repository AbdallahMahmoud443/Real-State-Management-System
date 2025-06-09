<?php

namespace App\Services\MultiGuardAuthentication\Contracts;

use Illuminate\Database\Eloquent\Model;

interface ResetPasswordServiceContract
{
    /**
     * Check Email exist or not To Complete Forget Password Process
     * @param $email
     * @return bool
     */
    public function ForgetPassword(string $email): bool;

    /**
     * return System User Based on email and token to complete reset password process
     * @param $email
     * @return Model
     */
    public function getSystemUserForResetPassword(string $email, string $token): ?Model;

    /**
     * Change old password with new password based on (email & token & newPassword)
     * @param $email
     * @param $token
     * @param $newPassword
     * @return bool
     */
    public function postResetPassword(string $email, string $token, string $newPassword): bool;
}
