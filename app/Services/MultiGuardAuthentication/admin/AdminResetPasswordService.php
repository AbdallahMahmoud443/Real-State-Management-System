<?php

namespace App\Services\MultiGuardAuthentication\admin;

use App\Repositories\MultiGuardAuthentication\Reset_password\Contracts\AdminResetPasswordContract;
use App\Services\MultiGuardAuthentication\Contracts\ResetPasswordEmailVerificationContract;
use App\Services\MultiGuardAuthentication\Contracts\ResetPasswordServiceContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;


class AdminResetPasswordService implements ResetPasswordServiceContract
{
    public function __construct(protected AdminResetPasswordContract $adminResetPasswordRepo, protected ResetPasswordEmailVerificationContract $verifyResetPassword) {}

    public function ForgetPassword(string $email): bool
    {
        // hint: Check email exist or not
        $admin =  $this->adminResetPasswordRepo->GetSystemUser($email);
        if (!$admin) {
            return false;
        }
        // todo: generate token to verify Email
        $token = hash('sha256', time()); // note: Generate hash(encryption Algorithm,value)
        $admin->token =  $token;
        $admin->save();
        $this->verifyResetPassword->SendVerificationEmail($email, $token, $admin->name, 'admin');
        return true;
    }
    public function getSystemUserForResetPassword(string $email, string $token): ?Model
    {
        $admin = $this->adminResetPasswordRepo->GetSystemUserWithTokenAndEmail($email, $token);
        return  $admin;
    }
    public function postResetPassword(string $email, string $token, string $newPassword): bool
    {
        // todo: check email has token or not
        $admin = $this->adminResetPasswordRepo->GetSystemUserWithTokenAndEmail($email, $token);
        if (!$admin) {
            return false;
        }
        // todo: Reset password and remove old token
        $admin->password = Hash::make($newPassword);
        $admin->token = null;
        $admin->update();
        return true;
    }
}
