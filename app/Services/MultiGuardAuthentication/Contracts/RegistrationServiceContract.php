<?php

namespace App\Services\MultiGuardAuthentication\Contracts;

interface RegistrationServiceContract
{
    /**
     * Handle Post Request For Registration Process
     * @param validated_data
     */
    public function postRegister($validated_data): void;

    /**
     * Complete Verification Email from sent mail (run when press on button inside activation link)
     * check if token is valid or not
     * @param $token
     * @return bool
     */
    public function RegisterVerify($token): bool;
}
