<?php

namespace App\Repositories\MultiGuardAuthentication\Update_profile;

use App\Repositories\MultiGuardAuthentication\Update_profile\Contracts\BaseUpdateProfileContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class BaseUpdateProfileRepository implements BaseUpdateProfileContract
{
    public function __construct(protected Model $model, protected string $guard) {}
    /**
     * GET Authenticated User
     * @param string guard
     * @return Model
     */
    public function getAuthenticatedUser(): Model
    {
        $systemUser = $this->model->where('id', Auth::guard($this->guard)->user()->id)->first();
        return $systemUser;
    }
    /**
     * GET ID Authenticated User
     * @param string guard
     * @return int
     */
    public function getIdOfAuthenticatedUser(): int
    {
        $id = Auth::guard($this->guard)->user()->id;
        return $id;
    }
    /**
     * Update User's Image Profile
     * @param array $image
     *  void
     */
    public function UpdateSystemUserImageProfile(array $image): void
    {
        $systemUser = $this->getAuthenticatedUser($this->guard);
        $systemUser->update($image);
    }
}
