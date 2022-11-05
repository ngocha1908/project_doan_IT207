<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function getModel()
    {
        return Product::class;
    }

    public function getAll()
    {
        return $this->model->orderBy('created_at', 'DESC');
    }

    public function getProduct($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getProductByName($name)
    {
        return $this->model->where('name', $name)->firstOrFail();
    }

    public function getAllProductWithImages()
    {
        return $this->model->with(['images'])
            ->orderBy('created_at', 'DESC')
            ->paginate(config('app.pagination.productPagination'));
    }

    public function getProductWithImages($id)
    {
        return $this->model->with(['images'])->findOrFail($id);
    }

    public function getProductShop()
    {
        return $this->model->with(['images'])
            ->orderBy('id', 'desc')
            ->paginate(config('app.limit.shop'));
    }

    public function getProductFilter($category_id, $start, $end)
    {
        return $this->model->with(['images'])
            ->where('category_id', $category_id)
            ->whereBetween('price', [$start, $end])
            ->orderBy('id', 'DESC')
            ->paginate(config('app.limit.shop'));
    }

    public function getProductBySlug($slug)
    {
        return $this->model->with(['images'])->where('slug', $slug)->first();
    }

    public function getProductRecommend($slug, $category_id)
    {
        return $this->model->with('images')
            ->where('slug', '<>', $slug)
            ->where('category_id', '=', $category_id)
            ->orderBy('id', 'DESC')
            ->limit(config('app.limit.recommend'))
            ->get();
    }

    public function getProductByCategory($category_id)
    {
        return $this->model->with(['images'])
            ->where('category_id', $category_id)
            ->orderBy('id', 'desc')
            ->paginate(config('app.limit.category'));
    }

    public function getFeaturedProducts()
    {
        return $this->model->with(['images'])
            ->where('is_featured', config('app.is_featured'))
            ->orderBy('id', 'desc')
            ->limit(config('app.limit.featured'))
            ->get();
    }

    public function getNewProducts()
    {
        return $this->model->with(['images'])
            ->orderBy('id', 'desc')
            ->limit(config('app.limit.new'))
            ->get();
    }
}
