<?php

namespace App\Repositories\Users\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;


interface AgentsRepositoryContract extends UsersRepositoryContract
{
    public function fetchSomeAgent(int $limit): Collection;
    public function fetchAllAgentsWithPaginate(int $pageSize): LengthAwarePaginator;
}
