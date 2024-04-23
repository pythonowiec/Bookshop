<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'author_id',
        'item_category_id'
    ];

    public function author() : BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function itemable(): MorphTo
    {
        return $this->morphTo();
    }

    public function getItemDetails(): array
    {
        if ($this->itemable_type == 'App\Models\Book') {
            return $this->bookDetails();
        }
        else if ($this->itemable_type == 'App\Models\Comic') {
            return $this->comicDetails();
        }
        else if ($this->itemable_type == 'App\Models\ShortStoryCollection') {
            return $this->shortStoryCollectionDetails();
        }

        return [];
    }

    private function bookDetails(): array
    {
        return [
            'genre' => $this->itemable->genre,
        ];
    }

    private function comicDetails(): array
    {
        return [
            'series' => $this->itemable->series,
        ];
    }

    private function shortStoryCollectionDetails(): array
    {
        return [
            'theme' => $this->itemable->theme,
        ];
    }
}
