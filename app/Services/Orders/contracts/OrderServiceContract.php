<?php

namespace App\Services\Orders\contracts;

interface OrderServiceContract
{
    /**
     * Fetch All Orders From Database
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function fetchAllOrders();
    /**
     * Fetch one Order From Database Based Id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function fetchOneOrder(int $id);
    /**
     * Create New Order
     * @param array data
     * @return \App\Models\Order
     */
    public function createOrder(array $data);
    /**
     * Update New Order
     * @param int agent_id
     * @param array data
     * @return bool
     */
    public function UpdateAgentOldOrdersState(int $agent_id, array $data);
    /**
     * Fetch All Orders based on agent id
     * @param int agent_id
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function fetchOrdersByAgentId(int $agent_id);
    /**
     * fetch  Current Active state for  order based on agent id
     *
     * @param int $agent_id
     * @return \App\Models\Order
     */
    public function FetchActiveOrderByAgentId(int $agent_id);
}
