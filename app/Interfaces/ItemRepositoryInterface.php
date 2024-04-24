<?php

namespace App\Interfaces;

use App\Http\Requests\StoreItemRequest;
use App\Models\Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface ItemRepositoryInterface
{
    public function all(): Collection;

    public function show(string $id): null|Item;

    public function store(StoreItemRequest $request): Item;
}
