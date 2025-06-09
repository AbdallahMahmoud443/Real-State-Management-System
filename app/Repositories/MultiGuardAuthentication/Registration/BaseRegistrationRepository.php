<?php

namespace App\Repositories\MultiGuardAuthentication\Registration;

use App\Repositories\MultiGuardAuthentication\Registration\Contracts\BaseRegistrationContract;
use Illuminate\Database\Eloquent\Model;


class BaseRegistrationRepository implements BaseRegistrationContract
{
    public function __construct(protected Model $model) {}
    /**
     * Create New System User
     * @param array data
     */
    public function CreateUser(array $data): void
    {
        $this->model->create($data);
    }
    /**
     * Get User by token to verify Registration
     * @param string token
     */
    public function getUserByToken(string $token): ?Model
    {
        $SystemUser = $this->model->where('token', $token)->first();
        return $SystemUser;
    }
}
