<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Slug\Slug;

class CategoryController extends Controller
{
    protected $categoryRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $categories = $this->categoryRepo->getCategoryList();

            return response()->json([
                'status' => 'success',
                'data' => CategoryResource::collection($categories),
            ], 200);
        } catch (\Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        try {
            if ($request->validator->fails()) {
                return response([
                    'status' => 'error',
                    'error' => $request->validator->errors(),
                ], 422);
            }

            $data = $request->except('_token');
            $data['slug'] = Slug::getSlug($data['name']);
            $category = $this->categoryRepo->create($data);

            return response()->json([
                'message' => __('Add Success'),
                'category' => new CategoryResource($category),
            ], 200);
        } catch (\Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCategoryRequest $request, $id)
    {
        try {
            if ($request->validator->fails()) {
                return response([
                    'status' => 'error',
                    'error' => $request->validator->errors(),
                ], 422);
            }

            $data = $request->except('_token');
            $data['slug'] = Slug::getSlug($data['name']);
            $category = $this->categoryRepo->update($id, $data);

            return response()->json([
                'message' => __('Update success'),
                'category' => new CategoryResource($category),
            ], 200);
        } catch (\Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->categoryRepo->delete($id);

            return response()->json([
                'message' => __('Delete success'),
            ], 200);
        } catch (\Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ], 500);
        }
    }
}
