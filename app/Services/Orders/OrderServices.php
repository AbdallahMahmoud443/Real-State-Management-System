<?php

namespace App\Services\Orders;

use App\Repositories\Orders\contracts\OrderContract;
use App\Services\Orders\contracts\OrderServiceContract;
use Illuminate\Support\Facades\Auth;

class OrderServices implements OrderServiceContract
{
    public function __construct(protected OrderContract $orderRepo) {}
    public function fetchAllOrders()
    {
        return $this->orderRepo->fetchALL();
    }

    public function fetchOneOrder(int $id)
    {
        return $this->orderRepo->fetchOne($id);
    }

    public function createOrder(array $data)
    {
        return $this->orderRepo->create($data);
    }

    public function UpdateAgentOldOrdersState(int $agent_id, array $data)
    {
        return $this->orderRepo->updateCurrentStateForOrdersByAgentId($agent_id, $data);
    }

    public  function fetchOrdersByAgentId(int $agent_id)
    {
        return $this->orderRepo->fetchOrdersByAgentId($agent_id);
    }
    public function FetchActiveOrderByAgentId(int $agentId)
    {
        return $this->orderRepo->fetchActiveOrder($agentId);
    }
}
