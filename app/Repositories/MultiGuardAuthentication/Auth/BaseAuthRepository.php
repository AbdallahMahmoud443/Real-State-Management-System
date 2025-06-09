<?php

namespace App\Repositories\MultiGuardAuthentication\Auth;

use App\Repositories\MultiGuardAuthentication\Auth\Contracts\BaseAuthContract;
use Illuminate\Support\Facades\Auth;


class BaseAuthRepository implements BaseAuthContract
{
    function __construct(protected string $guard) {}
    /**
     * Login Method
     * @param array credentials
     *
     * @return bool
     */
    public function login(array $credentials): bool
    {
        $result = Auth::guard($this->guard)->attempt($credentials);
        return $result;
    }
    /**
     * Logout Method
     *
     */
    public function logout(): void
    {
        Auth::guard($this->guard)->logout();
    }
}
