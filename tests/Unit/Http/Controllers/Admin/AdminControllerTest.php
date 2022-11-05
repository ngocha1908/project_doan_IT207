<?php

namespace Tests\Unit\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Tests\TestCase;
use Illuminate\View\View;
use Mockery as m;

class AdminControllerTest extends TestCase
{
    protected $userRepo;
    protected $categoryRepo;
    protected $productRepo;
    protected $orderRepo;
    protected $controller;
    protected $products;
    protected $categoryMock;
    protected $productMock;

    public function setUp(): void
    {
        parent::setUp();
        $this->products = Product::factory()->count(10)->make();
        $this->categories = Category::factory()->count(10)->make();
        $this->orders = Order::factory()->count(10)->make();
        $this->users = User::factory()->count(10)->make();
        $this->productRepo = m::mock(ProductRepositoryInterface::class)->makePartial();
        $this->orderRepo = m::mock(OrderRepositoryInterface::class)->makePartial();
        $this->categoryRepo = m::mock(CategoryRepositoryInterface::class)->makePartial();
        $this->userRepo = m::mock(UserRepositoryInterface::class)->makePartial();
        $this->controller = new AdminController(
            $this->productRepo,
            $this->categoryRepo,
            $this->orderRepo,
            $this->userRepo
        );
    }

    public function tearDown(): void
    {
        unset($this->controller);
        m::close();
        parent::tearDown();
    }

    public function testIndex()
    {
        $this->productRepo->shouldReceive('getAll')->andReturn($this->products);
        $this->orderRepo->shouldReceive('getAll')->andReturn($this->orders);
        $this->userRepo->shouldReceive('getAll')->andReturn($this->users);
        $this->categoryRepo->shouldReceive('getAll')->andReturn($this->categories);
        $this->orderRepo->shouldReceive('getStatistic')->andReturn($this->categories);

        $view = $this->controller->index();
        $this->assertInstanceOf(View::class, $view);
        $this->assertEquals('admin.index', $view->getName());
        $this->assertArrayHasKey('data', $view->getData());
        $this->assertArrayHasKey('year', $view->getData());
        $this->assertArrayHasKey('chartData', $view->getData());
    }
}
