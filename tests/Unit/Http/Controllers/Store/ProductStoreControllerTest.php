<?php

namespace Tests\Unit\Http\Controllers\Store;

use App\Http\Controllers\Store\ProductStoreController;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Comment\CommentRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Size\SizeRepositoryInterface;
use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\View\View;
use Mockery as m;

class ProductStoreControllerTest extends TestCase
{
    protected $commentRepo;
    protected $categoryRepo;
    protected $productRepo;
    protected $sizeRepo;
    protected $controller;
    protected $products;
    protected $categoryMock;
    protected $productMock;

    public function setUp(): void
    {
        parent::setUp();
        $this->products = Product::factory()->count(10)->make();
        $this->productRepo = m::mock(ProductRepositoryInterface::class)->makePartial();
        $this->commentRepo = m::mock(CommentRepositoryInterface::class)->makePartial();
        $this->categoryRepo = m::mock(CategoryRepositoryInterface::class)->makePartial();
        $this->sizeRepo = m::mock(SizeRepositoryInterface::class)->makePartial();
        $this->controller = new ProductStoreController(
            $this->commentRepo,
            $this->categoryRepo,
            $this->productRepo,
            $this->sizeRepo
        );
        $this->productMock = m::mock(Product::class, [
            'id' => 1,
            'name' => 'Giay dep',
            'code' => 'ABC',
            'slug' => 'giay-dep',
            'description' => 'text',
            'price' => 100000,
            'is_featured' => 1,
            'status' => 1,
            'category_id' => 1,
        ])->makePartial();
        $this->categoryMock = m::mock(Category::class, [
            'id' => 1,
            'name' => 'Giay dep',
            'slug' => 'giay-dep',
            'parent' => 1,
        ])->makePartial();
    }

    public function tearDown(): void
    {
        unset($this->controller);
        m::close();
        parent::tearDown();
    }

    public function testShop()
    {
        $this->categoryRepo->shouldReceive('getParentCategory')->andReturn([]);
        $this->productRepo->shouldReceive('getProductShop')->andReturn($this->products);

        $view = $this->controller->shop();
        $this->assertInstanceOf(View::class, $view);
        $this->assertEquals('store.product.shop', $view->getName());
        $this->assertArrayHasKey('parentCategories', $view->getData());
        $this->assertArrayHasKey('products', $view->getData());
    }

    public function testFilter()
    {
        $data = [
            'category' => 1,
            'start' => 100000,
            'end' => 500000,
        ];
        $request = new Request($data);
        $this->productRepo->shouldReceive('getProductFilter')
            ->with($data['category'], $data['start'], $data['end'])
            ->andReturn($this->products);
        $this->categoryRepo->shouldReceive('getParentCategory')->andReturn([]);
        $view = $this->controller->filter($request);

        $this->assertInstanceOf(View::class, $view);
        $this->assertEquals('store.product.shop', $view->getName());
        $this->assertArrayHasKey('parentCategories', $view->getData());
        $this->assertArrayHasKey('products', $view->getData());
    }

    public function testDetail()
    {
        $id = 1;
        $data = [
            'id' => $id,
            'slug' => 'san-pham-1',
            'category_id' => 1,
        ];

        $this->productRepo->shouldReceive('getProductBySlug')->with($data['slug'])->andReturn($this->productMock);
        $this->sizeRepo->shouldReceive('getSizeExistByProductId')->with($this->productMock->id)->andReturn([]);
        $this->productRepo->shouldReceive('getProductRecommend')
            ->with($data['slug'], $this->productMock->category_id)
            ->andReturn($this->products);
        $this->commentRepo->shouldReceive('getCommentByProduct')->with($this->productMock->id)->andReturn([]);

        $view = $this->controller->detail($data['slug']);
        $this->assertInstanceOf(View::class, $view);
        $this->assertEquals('store.product.detail', $view->getName());
        $this->assertArrayHasKey('detail', $view->getData());
        $this->assertArrayHasKey('products', $view->getData());
    }

    public function testCategory()
    {
        $id = 1;
        $data = [
            'id' => $id,
            'slug' => 'san-pham-1',
        ];
        $this->categoryRepo->shouldReceive('getCategoryBySlug')
            ->with($data['slug'])
            ->andReturn($this->categoryMock);
        $this->productRepo->shouldReceive('getProductByCategory')
            ->with($this->categoryMock->id)
            ->andReturn($this->products);

        $view = $this->controller->category($data['slug']);
        $this->assertInstanceOf(View::class, $view);
        $this->assertEquals('store.product.category', $view->getName());
        $this->assertArrayHasKey('products', $view->getData());
        $this->assertArrayHasKey('category', $view->getData());
    }
}
