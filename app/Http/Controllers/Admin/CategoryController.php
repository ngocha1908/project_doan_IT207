<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Slug\Slug;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $categories = $this->categoryRepository->getCategoryList();

        return view('admin.categories.listcategory')->with(compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentCategories = $this->categoryRepository->getParentCategory();
        
        return view('admin.categories.addcategory')->with(compact('parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $options['name'] = $request->name;
        $options['parent'] = $request->parent;
        $options['slug'] =  Slug::getSlug($options['name']);
        $result = $this->categoryRepository->creatCategory($options);

        if ($result) {
            return redirect()->route('admin.categories.index')->with('success', __('Add success'));
        }

        return back()->with('error', __('Add failed'));
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
        
        $cat = $this->categoryRepository->getCategory($id);
        $category_id = $cat->parent;
        $parentCategories = $this->categoryRepository->getParentCategory();
        
        return view('admin.categories.editcategory')->with(compact('cat', 'category_id', 'parentCategories'));
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
        $category = $this->categoryRepository->getCategory($id);
        $options['name'] = $request->name;
        $options['parent'] = $request->parent;
        $options['slug'] =  Slug::getSlug($options['name']);

        if ($category->update($options)) {
            return redirect()->route('admin.categories.index')->with('success', __('Edit success'));
        }

        return back()->with('error', __('Update failed'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->categoryRepository->getCategory($id);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Delete success');
    }
}
