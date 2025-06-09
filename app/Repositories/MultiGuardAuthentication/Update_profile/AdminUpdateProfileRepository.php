<?php

namespace App\Repositories\MultiGuardAuthentication\Update_profile;

use  App\Repositories\MultiGuardAuthentication\Update_profile\BaseUpdateProfileRepository;
use App\Models\Admin;
use App\Repositories\MultiGuardAuthentication\Update_profile\Contracts\AdminUpdateProfileContract;
use Illuminate\Support\Facades\Hash;



class AdminUpdateProfileRepository extends BaseUpdateProfileRepository implements AdminUpdateProfileContract
{
    public function __construct(protected Admin $admin)
    {
        parent::__construct($this->admin, 'admin');
    }
    public function UpdateAdminProfile(array $data)
    {
        $admin = $this->getAuthenticatedUser();
        $admin->name = $data['name'];
        $admin->email = $data['email'];
        if ($data['password']) {
            $admin->password = Hash::make($data['password']);
        }
        $admin->save();
    }
}
