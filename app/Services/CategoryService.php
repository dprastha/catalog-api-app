<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function index()
    {
        return Category::with(['items']);
    }

    public function store($request)
    {
      return Category::create([
        'name' => $request->name
      ]);
    }

    public function show($data)
    {
      return $data->loadMissing(['items']);
    }

    public function update($request, $data)
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