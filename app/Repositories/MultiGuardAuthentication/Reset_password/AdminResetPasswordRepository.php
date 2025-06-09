<?php

namespace App\Repositories\MultiGuardAuthentication\Reset_password;

use App\Repositories\MultiGuardAuthentication\Reset_password\ResetPasswordRepository;
use App\Models\Admin;
use App\Repositories\MultiGuardAuthentication\Reset_password\Contracts\AdminResetPasswordContract;

class AdminResetPasswordRepository extends ResetPasswordRepository implements AdminResetPasswordContract
{
    public function __construct(protected Admin $admin)
    {
        parent::__construct($this->admin);
    }
}
