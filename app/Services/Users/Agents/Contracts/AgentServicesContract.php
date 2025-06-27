<?php

namespace App\Services\Users\Agents\Contracts;


interface AgentServicesContract
{
    /**
     *  Fetch all agents.
     *
     * @return mixed
     */
    public function fetchAllAgents();

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
}
