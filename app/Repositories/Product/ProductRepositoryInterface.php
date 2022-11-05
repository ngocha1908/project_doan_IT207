<?php

namespace App\Repositories\Product;

use App\Repositories\RepositoryInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{
    public function getAll();

    public function getProduct($id);

    public function getAllProductWithImages();

    public function getProductWithImages($id);

    public function getProductShop();

    public function getProductFilter($category_id, $start, $end);

    public function getProductBySlug($slug);

    public function getProductRecommend($slug, $category_id);

    public function getProductByCategory($category_id);

    public function getFeaturedProducts();

    public function getNewProducts();
}
