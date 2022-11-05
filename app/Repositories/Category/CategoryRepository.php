<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function getModel()
    {
        return Category::class;
    }

    public function getCategoryList()
    {
        return $this->model->orderBy('id', 'DESC')
            ->paginate(config('app.pagination.categoryPagination'));
    }

    public function getCategory($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getParentCategory()
    {
        return $this->model->where('parent', config('app.category.root'))->get();
    }

    public function creatCategory($options)
    {
        return $this->model->create($options);
    }

    public function getCategoryBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }
}
