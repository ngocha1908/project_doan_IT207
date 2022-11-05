<?php

namespace Tests\Unit\Models;

use App\Models\Product;
use App\Models\Size;
use PHPUnit\Framework\TestCase;
use Tests\Unit\ModelTestCase;

class SizeTest extends ModelTestCase
{
    protected $size;

    protected function initModel()
    {
        return new Size();
    }

    public function testModelConfiguration()
    {
        $fillable = [
            'product_id',
            'size',
            'quantity',
        ];

        $this->runConfigurationAssertions(
            $this->model,
            [
                'table' => 'sizes',
                'fillable' => $fillable,
            ]
        );
    }

    public function testProductRelation()
    {
        $relation = $this->model->product();
        $related = new Product();
        $key = 'product_id';

        $this->assertBelongsToRelation(
            $relation,
            $this->model,
            $related,
            $key
        );
    }
}
