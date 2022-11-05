<?php

namespace Tests\Unit\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Slug\Slug;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Tests\TestCase;
use Mockery as m;
use Mockery;

class CategoryControllerTest extends TestCase
{
    protected $categories;
    protected $category;
    protected $categoryRepo;
    protected $controller;
    protected $categoryMock;

    public function setUp(): void
    {
        parent::setUp();
        $this->categories = Category::factory()->count(10)->make();
        $this->request = m::mock(Request::class);
        $this->categoryRepo = m::mock(CategoryRepositoryInterface::class)->makePartial();
        $this->controller = new CategoryController($this->categoryRepo);
        $this->categoryMock = m::mock(Category::class, [
            'id' => 1,
            'name' => 'Giay dep',
            'slug' => 'giay-dep',
            'parent' => 0,
        ])->makePartial();
    }

    public function tearDown(): void
    {
        Mockery::close();
        unset($this->controller);
        parent::tearDown();
    }

    public function testIndex()
    {
        $this->categoryRepo->shouldReceive('getCategoryList')
            ->andReturn($this->categories);

        $view = $this->controller->index();

        $this->assertInstanceOf(View::class, $view);
        $this->assertEquals('admin.categories.listcategory', $view->getName());
        $this->assertArrayHasKey('categories', $view->getData());
    }

    public function testCreate()
    {
        $this->categoryRepo->shouldReceive('getParentCategory')
            ->andReturn([]);
        $view = $this->controller->create();

        $this->assertInstanceOf(View::class, $view);
        $this->assertEquals('admin.categories.addcategory', $view->getName());
    }

    public function testStore()
    {
        $data = [
            'name' => 'Giay dep',
            'parent' => 0
        ];
        
        $request = new CreateCategoryRequest($data);
        $this->category = Category::factory()->make([
            'name' => $data['name'],
            'slug' => Slug::getSlug($data['name']),
            'parent' => 0,
        ]);

        $this->categoryRepo->shouldReceive('creatCategory')->andReturn($this->category);

        $response = $this->controller->store($request);

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertArrayHasKey('success', session()->all());
    }

    public function testStoreFailed()
    {
        $data = [
            'name' => 'Giay dep',
            'parent' => 0
        ];
        $request = new CreateCategoryRequest($data);

        $this->categoryRepo->shouldReceive('creatCategory')->andReturn(null);

        $response = $this->controller->store($request);

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertArrayHasKey('error', session()->all());
    }

    public function testEdit()
    {
        $id = 1;
        $this->category = Category::factory()->make([
            'id' => $id,
            'name' => 'Giay dep',
            'slug' => 'giay-dep-1',
            'parent' => 0,
        ]);

        $this->categoryRepo->shouldReceive('getCategory')->with($id)->andReturn($this->category);
        $this->categoryRepo->shouldReceive('getParentCategory')->andReturn([]);

        $view = $this->controller->edit($id);

        $this->assertEquals('admin.categories.editcategory', $view->getName());
    }

    public function testUpdate()
    {
        $id = 1;

        $data = [
            'name' => 'Giay dep update',
            'parent' => 0
        ];

        $request = new EditCategoryRequest($data);

        $options = [
            'name' => $data['name'],
            'slug' => Slug::getSlug($data['name']),
            'parent' => $data['parent'],
        ];

        $this->categoryMock->shouldReceive('update')->with($options)->andReturn(true);

        $this->categoryRepo->shouldReceive('getCategory')->with($id)->andReturn($this->categoryMock);

        $response = $this->controller->update($request, $id);

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertArrayHasKey('success', session()->all());
    }

    public function testUpdateFailed()
    {
        $id = 1;

        $data = [
            'name' => 'Giay dep update',
            'parent' => 0
        ];

        $request = new EditCategoryRequest($data);

        $options = [
            'name' => $data['name'],
            'slug' => Slug::getSlug($data['name']),
            'parent' => $data['parent'],
        ];

        $this->categoryMock->shouldReceive('update')->with($options)->andReturn(false);

        $this->categoryRepo->shouldReceive('getCategory')->with($id)->andReturn($this->categoryMock);

        $response = $this->controller->update($request, $id);

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertArrayHasKey('error', session()->all());
    }

    public function testDestroy()
    {
        $id = 1;

        $this->categoryRepo->shouldReceive('getCategory')->with($id)->andReturn($this->categoryMock);

        $this->categoryMock->shouldReceive('delete')->with($id)->andReturn(true);

        $response = $this->controller->destroy($id);

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertArrayHasKey('success', session()->all());
    }
}
