<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Order;
use App\Models\Product;
use App\Models\Size;
use PHPUnit\Framework\TestCase;
use Tests\Unit\ModelTestCase;

class ProductTest extends ModelTestCase
{
    protected $category;

    protected function initModel()
    {
        return new Product();
    }

    public function testModelConfiguration()
    {
        $fillable = [
            'name',
            'code',
            'slug',
            'description',
            'price',
            'is_featured',
            'status',
            'category_id',
        ];

        $this->runConfigurationAssertions(
            $this->model,
            [
                'table' => 'products',
                'fillable' => $fillable,
            ]
        );
    }

    public function testCategoryRelation()
    {
        $relation = $this->model->category();
        $related = new Category();
        $key = 'category_id';

        $this->assertBelongsToRelation(
            $relation,
            $this->model,
            $related,
            $key
        );
    }

    public function testImageRelation()
    {
        $relation = $this->model->images();
        $related = new Image();
        $key = 'product_id';

        $this->assertHasManyRelation(
            $relation,
            $this->model,
            $related,
            $key
        );
    }

    public function testSizeRelation()
    {
        $relation = $this->model->size();
        $related = new Size();
        $key = 'product_id';

        $this->assertHasManyRelation(
            $relation,
            $this->model,
            $related,
            $key
        );
    }
    
    public function testCommentRelation()
    {
        $relation = $this->model->comments();
        $related = new Comment();
        $key = 'product_id';

        $this->assertHasManyRelation(
            $relation,
            $this->model,
            $related,
            $key
        );
    }

    public function testOrdersRelation()
    {
        $relation = $this->model->orders();
        $related = new Order();
        $key = 'order_products.product_id';
        $relater = 'order_products.order_id';

        $this->assertBelongsToManyRelation(
            $relation,
            $this->model,
            $related,
            $key,
            $relater
        );
    }
}
