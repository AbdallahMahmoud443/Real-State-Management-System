<?php

namespace App\Repositories\Orders\contracts;

interface OrderContract
{
    /**
     * Get all Orders
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function fetchALL();


    /**
     * Get one order based on id
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function fetchOne(int $id);

    /**
     * Create a new order
     *
     * @param array $data
     * @return \App\Models\Order
     */

    public function create(array $data);

    /**
     * Update a order information
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data);

    /**
     * Delete a order
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id);
    /**
     * return All  orders of agent
     *
     * @param int $agent_id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function fetchOrdersByAgentId(int $agent_id);
    /**
     * Update All Current Active state for all orders based on agent id
     *
     * @param int $agent_id
     * @return bool
     */
    public function updateCurrentStateForOrdersByAgentId(int $agent_id, array $data);
    /**
     * fetch  Current Active state for  order based on agent id
     *
     * @param int $agent_id
     * @return \App\Models\Order
     */
    public function fetchActiveOrder(int $agent_id);
}
