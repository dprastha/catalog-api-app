<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Item\StoreItemRequest;
use App\Http\Requests\Item\UpdateItemRequest;
use App\Http\Resources\Item\ItemResource;
use App\Models\Item;
use App\Services\ItemService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ItemService $itemService)
    {
        $items = $itemService->index();

        return ItemResource::collection($items->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request, ItemService $itemService)
    {
        $item = $itemService->store($request);

        return response([
            'data' => new ItemResource($item),
            'message' => 'Item successfully created'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item, ItemService $itemService)
    {
        return response([
            'data' => new ItemResource($itemService->show($item))
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, Item $item, ItemService $itemService)
    {
        $itemService->update($request, $item);

        return response([
            'data' => new ItemResource($item),
            'message' => 'Item successfully updated'
        ]);
    }

    public function updateItemName(Request $request, Item $item, ItemService $itemService)
    {
        $itemService->updateItemName($request, $item);

        return response([
            'data' => new ItemResource($item),
            'message' => 'Item name successfully updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item, ItemService $itemService)
    {
        $itemService->destroy($item);

        return response([
            'data' => new ItemResource($item),
            'message' => 'Item successfully deleted'
        ]);
    }
}
