<?php

namespace App\Repositories;

use App\Http\Requests\StoreItemRequest;
use App\Interfaces\ItemRepositoryInterface;
use App\Models\Item;
use App\Traits\ItemTypes;
use Illuminate\Support\Collection;

class ItemRepository implements ItemRepositoryInterface
{
    use ItemTypes;

    public function all(): Collection
    {
        return Item::with('itemable')->get();
    }

    public function show(string $id): null|Item
    {
        return Item::find($id) ?? null;
    }

    public function store(StoreItemRequest $request): Item
    {
        $type = $this->getItemType($request->type);

        $details = new $type();

        $fillableFields = $details->getFillableFields();

        $data = $request->only($fillableFields);

        $details = $details::create($data);

        $item = new Item();
        $item->itemable()->associate($details);
        $item->title = $request->title;
        $item->price = $request->price;
        $item->author_id = $request->author_id;
        $item->save();

        return $item;
    }
}
