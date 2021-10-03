<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Resources\Category\CategoryCollection;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    /**
     * @return [type]
     */
    public function index()
    {
        $categories = Category::with(['items']);

        return CategoryResource::collection($categories->paginate(10));
    }

    /**
     * @param StoreCategoryRequest $request
     * 
     * @return [type]
     */
    public function store(StoreCategoryRequest $request)
    {
        return Category::create([
            'name' => $request->name
        ]);
    }

    /**
     * @param Category $category
     * 
     * @return [type]
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    /**
     * @param UpdateCategoryRequest $request
     * @param Category $category
     * 
     * @return [type]
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update([
            'name' => $request->name
        ]);

        return [
            'message' => 'Category successfully updated'            
        ];
    }

    /**
     * @param Category $category
     * 
     * @return [type]
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return [
            'message' => 'Category successfully deleted'
        ];
    }

}
