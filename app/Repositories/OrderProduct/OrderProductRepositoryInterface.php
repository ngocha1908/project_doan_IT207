<?php

namespace App\Repositories\OrderProduct;

use App\Repositories\RepositoryInterface;

interface OrderProductRepositoryInterface extends RepositoryInterface
{
    public function getOrderProduct($order_id);
}
