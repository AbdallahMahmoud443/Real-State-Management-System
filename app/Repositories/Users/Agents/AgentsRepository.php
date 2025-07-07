<?php

namespace App\Repositories\Users\Agents;

use App\Models\Agent;
use App\Repositories\Users\BaseUsersRepository;
use App\Repositories\Users\Contracts\AgentsRepositoryContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class AgentsRepository extends BaseUsersRepository implements AgentsRepositoryContract
{
    public function __construct(protected Agent $agent)
    {
        parent::__construct($this->agent);
    }
    public function fetchSomeAgent(int $limit): Collection
    {
        return Agent::limit($limit)->orderBy('created_at', 'desc')->get();
    }
    public function fetchAllAgentsWithPaginate(int $pageSize): LengthAwarePaginator
    {
        return Agent::where('status', 1)->orderBy('created_at', 'desc')->paginate($pageSize);
    }
}
