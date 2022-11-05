<?php

namespace Tests\Unit\Http\Controllers\Admin;

use App\Http\Controllers\Admin\OrderController;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\OrderProduct\OrderProductRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Mockery;
use Mockery as m;
use Tests\TestCase;
use Illuminate\View\View;

class OrderControllerTest extends TestCase
{
    protected $orders;
    protected $order;
    protected $orderRepo;
    protected $orderProductRepo;
    protected $controller;
    protected $orderMock;

    public function setUp(): void
    {
        parent::setUp();
        $this->orders = Order::factory()->count(10)->make();
        $this->request = m::mock(Request::class);
        $this->orderRepo = m::mock(OrderRepositoryInterface::class)->makePartial();
        $this->orderProductRepo = m::mock(OrderProductRepositoryInterface::class)->makePartial();
        $this->controller = new OrderController($this->orderRepo, $this->orderProductRepo);
        $this->orderMock = m::mock(Order::class, [
            'id' => 1,
            'user_id' => 6,
            'total_price' => 1000000,
            'address' => 'Ha Noi',
            'status' => 1,
            'phone' => '0123456789',
            'note' => 'note',
        ]);
    }

    public function tearDown(): void
    {
        Mockery::close();
        unset($this->controller);
        parent::tearDown();
    }

    public function testIndex()
    {
        $this->orderRepo->shouldReceive('getAllWithUsers')
            ->andReturn($this->orders);

        $view = $this->controller->index();

        $this->assertInstanceOf(View::class, $view);
        $this->assertEquals('admin.orders.order', $view->getName());
        $this->assertArrayHasKey('orders', $view->getData());
    }

    public function testShow()
    {
        $id = 1;
        $this->order = Order::factory()->make([
            'id' => $id,
            'user_id' => 6,
            'total_price' => 1000000,
            'address' => 'Ha Noi',
            'status' => 1,
            'phone' => '0123456789',
            'note' => 'note',
        ]);
        $orderProduct = m::mock(OrderProduct::class)->makePartial();
        $this->orderRepo->shouldReceive('getOrderWithUser')->with($id)->andReturn($this->order);
        $this->orderProductRepo->shouldReceive('getOrderProduct')->with($id)->andReturn($orderProduct);
        $this->order->setRelation('products', $orderProduct);
        $view = $this->controller->show($id);

        $this->assertInstanceOf(View::class, $view);
        $this->assertEquals('admin.orders.detailorder', $view->getName());
        $this->assertArrayHasKey('order', $view->getData());
        $this->assertArrayHasKey('order_products', $view->getData());
        $this->assertArrayHasKey('products', $view->getData());
    }
}
