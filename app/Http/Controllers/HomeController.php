<?php

namespace App\Http\Controllers;

use App\Http\Resources\Category\CategoryCollection;
use App\Http\Resources\Item\ItemCollection;
use App\Models\Category;
use App\Models\Item;
use App\Services\ItemService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ItemService $itemService)
    {
        $categories = Category::withCount('items')->get();
        $items = $itemService->index()->get();

        return view('home', [
            'categories' => new CategoryCollection($categories),
            'items' => new ItemCollection($items)
        ]);
    }
}
