<?php

namespace App\Repositories\OrderProduct;

use App\Models\OrderProduct;
use App\Repositories\BaseRepository;

class OrderProductRepository extends BaseRepository implements OrderProductRepositoryInterface
{
    public function getModel()
    {
        return OrderProduct::class;
    }

    public function getOrderProduct($order_id)
    {
        return $this->model->where('order_id', $order_id)->get();
    }
}
