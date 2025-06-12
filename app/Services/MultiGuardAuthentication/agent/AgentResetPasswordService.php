<?php

namespace App\Services\MultiGuardAuthentication\agent;

use App\Repositories\MultiGuardAuthentication\Reset_password\Contracts\AgentResetPasswordContract;
use App\Services\MultiGuardAuthentication\Contracts\ResetPasswordEmailVerificationContract;
use App\Services\MultiGuardAuthentication\Contracts\ResetPasswordServiceContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;


class AgentResetPasswordService implements ResetPasswordServiceContract
{
    public function __construct(protected AgentResetPasswordContract $agentResetPasswordRepository, protected ResetPasswordEmailVerificationContract $verifyResetPassword) {}

    public function ForgetPassword(string $email): bool
    {
        // hint: Check email exist or not
        $agent = $this->agentResetPasswordRepository->GetSystemUser($email);
        if (!$agent) {
            return false;
        }
        // todo: generate token to verify Email
        $token = hash('sha256', time()); // note: Generate hash(encryption Algorithm,value)
        $agent->token =  $token;
        $agent->save();
        $this->verifyResetPassword->SendVerificationEmail($email, $token, $agent->name, 'agent');
        return true;
    }
    public function getSystemUserForResetPassword(string $email, string $token): ?Model
    {
        $agent = $this->agentResetPasswordRepository->GetSystemUserWithTokenAndEmail($email, $token);
        return  $agent;
    }
    public function postResetPassword(string $email, string $token, string $newPassword): bool
    {
        // todo: check email has token or not
        $agent = $this->agentResetPasswordRepository->GetSystemUserWithTokenAndEmail($email, $token);
        if (!$agent) {
            return false;
        }
        // todo: Reset password and remove old token
        $agent->password = Hash::make($newPassword);
        $agent->token = null;
        $agent->update();
        return true;
    }
}
