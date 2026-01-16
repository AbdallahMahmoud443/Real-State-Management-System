<?php

namespace App\Services\Users\Agents\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface AgentServicesContract
{
    /**
     *  Fetch all agents.
     *
     * @return mixed
     */
    public function fetchAllAgents();


    /**
     *  Fetch some agents.
     *
     * @param int $limit
     * @return mixed
     */
    public function fetchSomeAgent(int $limit): Collection;
    /**
     *  Update agent information.
     *
     * @param int $agentId
     * @param array $data
     * @return bool
     */
    public function updateAgentInformation($agentId, $data);

    /**
     *  Delete an agent.
     *
     * @param int $agentId
     * @return bool
     */
    public function deleteAgent($agentId);
    /**
     *  Fetch all agents with pagination.
     *
     * @param int $pageSize
     * @return mixed
     */
    public function fetchAllAgentsWithPaginate(int $pageSize):LengthAwarePaginator;
}
