<?php

namespace Tests\Unit\Models;

use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use PHPUnit\Framework\TestCase;
use Tests\Unit\ModelTestCase as UnitModelTestCase;

class CommentTest extends UnitModelTestCase
{
    protected $comment;

    protected function initModel()
    {
        return new Comment();
    }

    public function testModelConfiguration()
    {
        $fillable = [
            'user_id',
            'product_id',
            'content',
        ];

        $this->runConfigurationAssertions(
            $this->model,
            [
                'table' => 'comments',
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
            $key,
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
            $key,
        );
    }
}
