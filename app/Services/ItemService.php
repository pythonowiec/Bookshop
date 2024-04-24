<?php

namespace App\Services;

use App\Http\Requests\StoreItemRequest;
use App\Models\Item;
use App\Repositories\ItemRepository;
use Illuminate\Support\Collection;

class ItemService
{
    private ItemRepository $itemRepository;

    public function __construct(ItemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    public function all(): Collection
    {
        return $this->itemRepository->all();
    }

    public function show(string $id): null|Item
    {
        return $this->itemRepository->show($id);
    }

    public function store(StoreItemRequest $request): Item
    {
        return $this->itemRepository->store($request);
    }
}
