<?php

namespace App\Repositories\Users\Customers;

use App\Models\User;
use App\Repositories\Users\BaseUsersRepository;
use App\Repositories\Users\Contracts\CustomersRepositoryContract;

class CustomersRepository extends BaseUsersRepository implements CustomersRepositoryContract
{
    public function __construct(protected User $user)
    {
        parent::__construct($this->user);
    }
}
