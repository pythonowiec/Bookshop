<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Resources\ItemResource;
use App\Services\ItemService;
use App\Traits\ItemDescription;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ItemController extends Controller
{
    use ItemDescription;

    private ItemService $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    public function index(): AnonymousResourceCollection
    {
        return ItemResource::collection($this->itemService->all());
    }

    public function show(string $id): JsonResponse
    {
        if(is_null($this->prepareDescription($this->itemService->show($id)))) {
            return response()->json(['error' => 'Not found item'], 404);
        }

        return response()->json([
            $this->prepareDescription($this->itemService->show($id)),
        ]);
    }

    public function store(StoreItemRequest $request): JsonResponse
    {
        $this->itemService->store($request);
       return response()->json(['status' => 'success'], 201);
    }
}
