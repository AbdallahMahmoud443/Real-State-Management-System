<?php

namespace App\Services\MultiGuardAuthentication\user;

use App\Repositories\MultiGuardAuthentication\Reset_password\Contracts\UserResetPasswordContract;
use App\Services\MultiGuardAuthentication\Contracts\ResetPasswordEmailVerificationContract;
use App\Services\MultiGuardAuthentication\Contracts\ResetPasswordServiceContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;


class UserResetPasswordService implements ResetPasswordServiceContract
{
    public function __construct(protected UserResetPasswordContract $userResetPasswordRepository, protected ResetPasswordEmailVerificationContract $verifyResetPassword) {}

    public function ForgetPassword(string $email): bool
    {
        // hint: Check email exist or not
        $user = $this->userResetPasswordRepository->GetSystemUser($email);
        if (!$user) {
            return false;
        }
        // todo: generate token to verify Email
        $token = hash('sha256', time()); // note: Generate hash(encryption Algorithm,value)
        $user->token =  $token;
        $user->save();
        $this->verifyResetPassword->SendVerificationEmail($email, $token, $user->name, 'user');
        return true;
    }
    public function getSystemUserForResetPassword(string $email, string $token): ?Model
    {
        $admin = $this->userResetPasswordRepository->GetSystemUserWithTokenAndEmail($email, $token);
        return  $admin;
    }
    public function postResetPassword(string $email, string $token, string $newPassword): bool
    {
        // todo: check email has token or not
        $user = $this->userResetPasswordRepository->GetSystemUserWithTokenAndEmail($email, $token);
        if (!$user) {
            return false;
        }
        // todo: Reset password and remove old token
        $user->password = Hash::make($newPassword);
        $user->token = null;
        $user->update();
        return true;
    }
}
