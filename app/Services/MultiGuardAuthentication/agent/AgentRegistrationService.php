<?php

namespace App\Services\MultiGuardAuthentication\Agent;

use App\Services\MultiGuardAuthentication\Contracts\RegistrationServiceContract;
use App\Repositories\MultiGuardAuthentication\Registration\Contracts\AgentRegistrationContract;
use App\Services\MultiGuardAuthentication\Contracts\RegisterEmailVerificationContract;
use Illuminate\Auth\Notifications\VerifyEmail;

class AgentRegistrationService implements RegistrationServiceContract
{
    public function __construct(protected AgentRegistrationContract $agentRegistrationRepo, protected RegisterEmailVerificationContract $verifyRegistration) {}
    public function postRegister($validated_data): void
    {
        // create token
        $token = Hash('sha256', time());
        // add token in validated_data
        $validated_data['token'] =  $token;
        // create user with token
        $this->agentRegistrationRepo->CreateUser($validated_data);
        // send email based on user's email and generated token
        $this->verifyRegistration->SendVerificationEmail($validated_data['email'], $token, 'agent');
    }

    public function RegisterVerify($token): bool
    {
        // get user by token
        $agent = $this->agentRegistrationRepo->getUserByToken($token);
        // check user exists not not
        if (!$agent) {
            return false;
        }
        // update state = 1 to able user login and remove verification token
        $agent->status = 1;
        $agent->token = null;
        $agent->save();
        return true;
    }
}
