<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    /**
     * @return [type]
     */
    public function index(CategoryService $categoryService)
    {
        $categories = $categoryService->index();

        return CategoryResource::collection($categories->paginate(10));
    }

    /**
     * @param StoreCategoryRequest $request
     * 
     * @return [type]
     */
    public function store(StoreCategoryRequest $request, CategoryService $categoryService)
    {
        return response([
            'data' => new CategoryResource($categoryService->store($request)),
            'messagge' => 'Item successfully created'
        ]);
    }

    /**
     * @param Category $category
     * 
     * @return [type]
     */
    public function show(Category $category, CategoryService $categoryService)
    {
        return response([
            'data' => new CategoryResource($categoryService->show($category))
        ]);
    }

    /**
     * @param UpdateCategoryRequest $request
     * @param Category $category
     * 
     * @return [type]
     */
    public function update(UpdateCategoryRequest $request, Category $category, CategoryService $categoryService)
    {
        $categoryService->update($request, $category);

        return response([
            'data' => new CategoryResource($category),
            'message' => 'Category successfully updated'
        ]);
    }

    /**
     * @param Category $category
     * 
     * @return [type]
     */
    public function destroy(Category $category, CategoryService $categoryService)
    {
        $categoryService->destroy($category);

        return response([
            'data' => new CategoryResource($category),
            'message' => 'Category successfully deleted'
        ]);
    }

}
