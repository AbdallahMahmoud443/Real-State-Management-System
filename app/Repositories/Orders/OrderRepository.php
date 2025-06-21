<?php

namespace App\Repositories\Orders;

use App\Models\Order;
use App\Repositories\Orders\contracts\OrderContract;
use Illuminate\Support\Facades\Auth;

class OrderRepository implements OrderContract
{

    public function fetchALL()
    {
        return Order::all();
    }

    public function fetchOne(int $id)
    {
        return Order::findOrFail($id);
    }

    public function create(array $data)
    {
        return Order::create($data);
    }

    public function update(int $id, array $data)
    {
        $order = $this->fetchOne($id);
        return $order->update($data);
    }

    public function delete(int $id)
    {
        $order = $this->fetchOne($id);
        return $order->delete();
    }
    public function fetchOrdersByAgentId(int $agent_id)
    {
        return Order::where('agent_id', $agent_id)->get();
    }
    public function updateCurrentStateForOrdersByAgentId(int $agent_id, array $data)
    {
        return Order::where('agent_id', $agent_id)->update($data);
    }
    public function fetchActiveOrder(int $agent_id)
    {
        return Order::where(['agent_id' => $agent_id, 'currently_active' => true])->first();
    }
}
