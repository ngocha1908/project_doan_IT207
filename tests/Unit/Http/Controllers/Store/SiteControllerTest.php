<?php

namespace Tests\Unit\Http\Controllers\Store;

use App\Http\Controllers\Store\SiteController;
use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;
use Tests\TestCase;
use Mockery as m;
use Illuminate\View\View;

class SiteControllerTest extends TestCase
{
    protected $productRepo;
    protected $controller;
    protected $products;

    public function setUp(): void
    {
        parent::setUp();
        $this->products = Product::factory()->count(10)->make();
        $this->productRepo = m::mock(ProductRepositoryInterface::class)->makePartial();
        $this->controller = new SiteController($this->productRepo);
    }

    public function tearDown(): void
    {
        unset($this->productRepo);
        unset($this->controller);
        m::close();
        parent::tearDown();
    }

    public function testIndex()
    {

        $this->productRepo->shouldReceive('getFeaturedProducts')->andReturn($this->products);
        $this->productRepo->shouldReceive('getNewProducts')->andReturn($this->products);

        $view = $this->controller->index();
        $this->assertInstanceOf(View::class, $view);
        $this->assertEquals('store.index', $view->getName());
    }
}
