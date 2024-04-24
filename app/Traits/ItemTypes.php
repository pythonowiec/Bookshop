<?php

namespace App\Traits;

use Illuminate\Support\Collection;

trait ItemTypes
{
    public function allTypes(): Collection
    {
        return collect([
            '1' => 'App\Models\Book',
            '2' => 'App\Models\Comic',
            '3' => 'App\Models\ShortStoryCollection',
        ]);
    }

    public function getItemType($type): string
    {
        return $this->allTypes()->get($type) ?? '';
    }
}
