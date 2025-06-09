<?php

namespace App\Repositories\MultiGuardAuthentication\Reset_password;

use App\Repositories\MultiGuardAuthentication\Reset_password\Contracts\BaseResetPasswordContract;
use Illuminate\Database\Eloquent\Model;


class ResetPasswordRepository implements BaseResetPasswordContract
{
    public function __construct(protected Model $model) {}
    /**
     * Get Admin or user by email to check if email is located in database or not
     * @param string email
     * @return Model
     */
    public function GetSystemUser(string $email): ?Model
    {
        $userSystem = $this->model->where('email', $email)->first();
        return $userSystem;
    }
    /**
     * Get Admin or user by email and token to reset password
     * @param string email
     * @param string token
     * @return Model
     */
    public function GetSystemUserWithTokenAndEmail(string $email, string $token): ?model
    {

        $userSystem = $this->model->where('email', $email)->where('token', $token)->first();
        return $userSystem;
    }
}
