<?php

namespace App\Services;

use App\Models\Item;
use Illuminate\Support\Facades\DB;

class ItemService
{
    public function index()
    {
        return Item::with(['category']);
    }

    public function store($request)
    {
      $item = DB::transaction(function () use ($request) {
        $item = Item::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price' => $request->price
        ]);

        return $item;
      });

      return $item;
    }

    public function show($data)
    {
      return $data->loadMissing(['category']);
    }

    public function update($request, $data)
    {
      $item = DB::transaction(function () use ($request, $data) {
        $data->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price' => $request->price
        ]);
      });

      return $item;
    }

    public function updateItemName($request, $data)
    {
      return $data->update([
        'name' => $request->name
      ]);
    }

    public function destroy($data)
    {
      return $data->delete;
    }
}