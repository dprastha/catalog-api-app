<?php

namespace App\Http\Controllers;

use App\Http\Resources\Category\CategoryCollection;
use App\Http\Resources\Item\ItemCollection;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::withCount('items')->get();
        $items = Item::with('category')->get();

        return view('home', [
            'categories' => new CategoryCollection($categories),
            'items' => new ItemCollection($items)
        ]);
    }
}
