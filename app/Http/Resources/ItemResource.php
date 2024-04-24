<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return array_merge([
            'author_full_name' => $this->authorFullName(),
            'title' => $this->title,
            'price' => $this->price,
        ], $this->getItemDetails());
    }

    public function authorFullName(): string
    {
        return $this->author()->get()->value('first_name') . ' ' . $this->author()->get()->value('last_name');
    }
}
