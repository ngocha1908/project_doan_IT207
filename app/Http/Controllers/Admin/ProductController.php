<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Image\ImageRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Size\SizeRepositoryInterface;
use App\Slug\Slug;

class ProductController extends Controller
{
    const PAGINATION_NUMBER = 10;

    public function __construct(
        ProductRepositoryInterface $productRepo,
        CategoryRepositoryInterface $categoryRepo,
        ImageRepositoryInterface $imageRepo,
        SizeRepositoryInterface $sizeRepo
    ) {
        $this->productRepo = $productRepo;
        $this->categoryRepo = $categoryRepo;
        $this->imageRepo = $imageRepo;
        $this->sizeRepo = $sizeRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productRepo->getAllProductWithImages();

        return view('admin.products.listproduct')->with(compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentCategories = $this->categoryRepo->getParentCategory();

        return view('admin.products.addproduct')->with(compact('parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $data = [];
        $files = $request->file('images');
        if ($request->has('images')) {
            $this->productRepo->create([
                'name' => $request->name,
                'code' => $request->code,
                'slug' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'is_featured' => $request->is_featured,
                'status' => $request->status,
                'category_id' => $request->category_id,
            ]);

            $product = $this->productRepo->getProductByName($request->name);

            $this->sizeRepo->insert([
                'product_id' => $product->id,
                'size' => config('app.size.s'),
                'quantity' => $request->s
            ]);

            $this->sizeRepo->insert([
                'product_id' => $product->id,
                'size' => config('app.size.m'),
                'quantity' => $request->m
            ]);

            $this->sizeRepo->insert([
                'product_id' => $product->id,
                'size' => config('app.size.l'),
                'quantity' => $request->l
            ]);

            $this->sizeRepo->insert([
                'product_id' => $product->id,
                'size' => config('app.size.xl'),
                'quantity' => $request->xl
            ]);

            $this->sizeRepo->insert([
                'product_id' => $product->id,
                'size' => config('app.size.xxl'),
                'quantity' => $request->xxl
            ]);

            foreach ($files as $key => $file) {
                $imageName = $product->slug . '-' . time() . '.' . $file->extension();
                $file->move(public_path('uploads'), $imageName);
                $data[$key] = [
                    'product_id' => $product->id,
                    'name' => $imageName,
                ];
            }

            $this->imageRepo->insert($data);
        }

        return redirect()->route('admin.products.index')->with('success', __('Add Success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->productRepo->getProductWithImages($id);
        $category_id = $product->category_id;
        $parentCategories = $this->categoryRepo->getParentCategory();

        return view('admin.products.editproduct')->with(compact('category_id', 'product', 'parentCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request, $id)
    {
        $product = $this->productRepo->getProduct($id);
        $data = [];
        $files = $request->file('images');
        $this->productRepo->update(
            $id,
            [
                'name' => $request->name,
                'code' => $request->code,
                'slug' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'is_featured' => $request->is_featured,
                'status' => $request->status,
                'category_id' => $request->category_id,
            ]
        );

        $size_s = $this->sizeRepo->getSizeByProductId($product->id, config('app.size.s'));
        $this->sizeRepo->update(
            $size_s->id,
            [
                'product_id' => $product->id,
                'size' => config('app.size.s'),
                'quantity' => $request->s
            ]
        );

        $size_m = $this->sizeRepo->getSizeByProductId($product->id, config('app.size.m'));
        $this->sizeRepo->update(
            $size_m->id,
            [
                'product_id' => $product->id,
                'size' => config('app.size.m'),
                'quantity' => $request->m
            ]
        );

        $size_l = $this->sizeRepo->getSizeByProductId($product->id, config('app.size.l'));
        $this->sizeRepo->update(
            $size_l->id,
            [
                'product_id' => $product->id,
                'size' => config('app.size.l'),
                'quantity' => $request->l
            ]
        );

        $size_xl = $this->sizeRepo->getSizeByProductId($product->id, config('app.size.xl'));
        $this->sizeRepo->update(
            $size_xl->id,
            [
                'product_id' => $product->id,
                'size' => config('app.size.xl'),
                'quantity' => $request->xl
            ]
        );

        $size_xxl = $this->sizeRepo->getSizeByProductId($product->id, config('app.size.xxl'));
        $this->sizeRepo->update(
            $size_xxl->id,
            [
                'product_id' => $product->id,
                'size' => config('app.size.xxl'),
                'quantity' => $request->xxl
            ]
        );

        //Insert Images
        if ($request->hasFile("images")) {
            foreach ($files as $key => $file) {
                $imageName = $product->slug . '-' . time() . '.' . $file->extension();
                $file->move(public_path('images'), $imageName);
                $data[$key] = [
                    'product_id' => $product->id,
                    'name' => $imageName,
                ];
            }
            $this->imageRepo->insert($data);
        }

        return redirect()->route('admin.products.index')->with('success', 'Edit Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->productRepo->getProduct($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Delete success');
    }
}
