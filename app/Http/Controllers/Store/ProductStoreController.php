<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Comment\CommentRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Size\SizeRepositoryInterface;
use Illuminate\Http\Request;

class ProductStoreController extends Controller
{
    public function __construct(
        CommentRepositoryInterface $commentRepo,
        CategoryRepositoryInterface $categoryRepo,
        ProductRepositoryInterface $productRepo,
        SizeRepositoryInterface $sizeRepo
    ) {
        $this->commentRepo = $commentRepo;
        $this->categoryRepo = $categoryRepo;
        $this->productRepo = $productRepo;
        $this->sizeRepo = $sizeRepo;
    }

    public function shop()
    {
        $parentCategories = $this->categoryRepo->getParentCategory();

        $products = $this->productRepo->getProductShop();

        return view('store.product.shop')->with(compact('parentCategories', 'products'));
    }

    public function filter(Request $request)
    {
        $category_id = $request->category;
        $start = $request->start;
        $end = $request->end;

        $products = $this->productRepo->getProductFilter($category_id, $start, $end);

        $parentCategories = $this->categoryRepo->getParentCategory();

        return view('store.product.shop')->with(compact('products', 'parentCategories'));
    }

    public function detail($slug)
    {
        $detail = $this->productRepo->getProductBySlug($slug);

        $sizes = $this->sizeRepo->getSizeExistByProductId($detail->id);

        $products = $this->productRepo->getProductRecommend($slug, $detail->category_id);

        $comments = $this->commentRepo->getCommentByProduct($detail->id);

        return view('store.product.detail')->with(compact('detail', 'products', 'sizes', 'comments'));
    }

    public function category($slug)
    {
        $category = $this->categoryRepo->getCategoryBySlug($slug);
        $products = $this->productRepo->getProductByCategory($category->id);

        return view('store.product.category')->with(compact('products', 'category'));
    }
}
