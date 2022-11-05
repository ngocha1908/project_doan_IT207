<?php

namespace Tests\Unit\Models;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use PHPUnit\Framework\TestCase;
use Tests\Unit\ModelTestCase;

class OrderTest extends ModelTestCase
{
    protected $category;

    protected function initModel()
    {
        return new Order();
    }

    public function testModelConfiguration()
    {
        $fillable = [
            'user_id',
            'total_price',
            'phone',
            'note',
            'address',
            'status',
        ];

        $this->runConfigurationAssertions(
            $this->model,
            [
                'table' => 'orders',
                'fillable' => $fillable,
            ]
        );
    }

    public function testUserRelation()
    {
        $relation = $this->model->user();
        $related = new User();
        $key = 'user_id';

        $this->assertBelongsToRelation(
            $relation,
            $this->model,
            $related,
            $key
        );
    }

    public function testProductsRelation()
    {
        $relation = $this->model->products();
        $related = new Product();
        $key = 'order_products.order_id';
        $relater = 'order_products.product_id';

        $this->assertBelongsToManyRelation(
            $relation,
            $this->model,
            $related,
            $key,
            $relater
        );
    }
}
