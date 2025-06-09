<?php

namespace App\Services\MultiGuardAuthentication\user;


use App\Repositories\MultiGuardAuthentication\Registration\Contracts\UserRegistrationContract;
use App\Services\MultiGuardAuthentication\Contracts\RegistrationServiceContract;
use App\Services\MultiGuardAuthentication\Email_Verification\VerifyRegistration;



class UserRegistrationService implements RegistrationServiceContract
{
    public function __construct(protected UserRegistrationContract $UserRegistrationRepo, protected VerifyRegistration $verifyRegistration) {}

    public function postRegister($validated_data): void
    {
        $token = Hash('sha256', time());
        $validated_data['token'] = $token;
        $this->UserRegistrationRepo->CreateUser($validated_data);
        $this->verifyRegistration->SendVerificationEmail($validated_data['email'], $token);
    }
    public function RegisterVerify($token): bool
    {
        $user = $this->UserRegistrationRepo->getUserByToken($token);
        if (!$user) {
            return false;
        }
        $user->status = 1;
        $user->token = null;
        $user->save();
        return true;
    }
}
