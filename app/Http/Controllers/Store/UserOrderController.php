<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Repositories\Order\OrderRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserOrderController extends Controller
{
    protected $orderRepo;

    public function __construct(OrderRepositoryInterface $orderRepo)
    {
        $this->orderRepo = $orderRepo;
    }

    public function orderdetail($id)
    {
        $order = $this->orderRepo->getOrderWithUser($id);

        if (Auth::user()->id == $order->user_id) {
            $order_products = $order->products;

            return view('store.order.orderdetail')->with(compact('order', 'order_products'));
        }

        return abort(404);
    }
}
