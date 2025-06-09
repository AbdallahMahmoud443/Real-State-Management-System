<?php

namespace App\Repositories\MultiGuardAuthentication\Update_profile;

use  App\Repositories\MultiGuardAuthentication\Update_profile\BaseUpdateProfileRepository;
use App\Models\User;
use App\Repositories\MultiGuardAuthentication\Update_profile\Contracts\UserUpdateProfileContract;
use Illuminate\Support\Facades\Hash;



class UserUpdateProfileRepository extends BaseUpdateProfileRepository implements UserUpdateProfileContract
{
    public function __construct(protected User $user)
    {
        parent::__construct($this->user, 'web');
    }
    public function UpdateUserProfile(array $data)
    {
        $user = $this->getAuthenticatedUser();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->address = $data['address'];
        $user->zip = $data['zip'];
        $user->city = $data['city'];
        $user->state = $data['state'];
        $user->country = $data['country'];
        if ($data['password']) {
            $user->password = Hash::make($data['password']);
        }
        $user->save();
    }
}
