<?php

namespace App\Services\Users\Agents;

use App\Repositories\Users\Contracts\AgentsRepositoryContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class AgentServices
{
    public function __construct(protected AgentsRepositoryContract $agentsRepository)
    {
        // Constructor logic if needed
    }
    /**
     * Fetch all agents.
     *
     * @return mixed
     */
    public function fetchAllAgents()
    {
        return $this->agentsRepository->fetchAll();
    }
    /**
     * Fetch a Agent by ID.
     *
     * @param int $agentId
     * @return mixed
     */
    public function fetchAgentById($agentId)
    {
        return $this->agentsRepository->fetchOne($agentId);
    }
    public function fetchSomeAgent(int $limit): Collection
    {
        return $this->agentsRepository->fetchSomeAgent($limit);
    }
    public function fetchAllAgentsWithPaginate(int $pageSize): LengthAwarePaginator
    {
        return $this->agentsRepository->fetchAllAgentsWithPaginate($pageSize);
    }
    /**
     * Update agent information.
     *
     * @param int $agentId
     * @param array $data
     * @return bool
     */
    public function updateAgentInformation($agentId, $data)
    {
        if (isset($data['password']) &  $data['password'] != null) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }
        return $this->agentsRepository->update($agentId, $data);
    }
    /**
     * Delete an agent.
     *
     * @param int $agentId
     * @return bool
     */
    public function deleteAgent($agentId)
    {
        return $this->agentsRepository->delete($agentId);
    }
}
