<?php

namespace App\Services;

use App\Models\Order;

class OrderService
{
    public function getAllOrders()
    {
        return Order::all();
    }

    public function createOrder(array $data)
    {
        return Order::create($data);
    }

    public function getOrderById($id)
    {
        return Order::with('book')->findOrFail($id);
    }

    public function updateOrder($id, array $data)
    {
        $order = Order::findOrFail($id);
        $order->update($data);
        return $order;
    }

    public function deleteOrder($id)
    {
        Order::destroy($id);
    }
}
