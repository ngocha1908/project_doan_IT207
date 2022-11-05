<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PHPUnit\Framework\TestCase;
use Tests\Unit\ModelTestCase as UnitModelTestCase;

class CategoryTest extends UnitModelTestCase
{
    protected $category;

    protected function initModel()
    {
        return new Category();
    }

    public function testModelConfiguration()
    {
        $fillable = [
            'name',
            'slug',
            'parent',
        ];

        $this->runConfigurationAssertions(
            $this->model,
            [
                'table' => 'categories',
                'fillable' => $fillable,
            ]
        );
    }

    public function testProductsRelation()
    {
        $relation = $this->model->products();
        $related = new Product();

        $this->assertHasManyRelation(
            $relation,
            $this->model,
            $related
        );
    }

    public function testCategoryHasManySubcategory()
    {
        $relation = $this->model->subcategory();
        $related = new Category();
        $key = 'parent';

        $this->assertHasManyRelation(
            $relation,
            $this->model,
            $related,
            $key
        );
    }

    public function testCategoryHasParent()
    {
        $relation = $this->model->parentCategory();
        $related = new Category();
        $key = 'parent';
        $parent = 'id';

        $this->assertBelongsToRelation(
            $relation,
            $this->model,
            $related,
            $key,
            $parent
        );
    }
}
