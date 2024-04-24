<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class ShortStoryCollection extends Model
{
    use HasFactory;

    protected $fillable = [
        'theme',
    ];

    public function getFillableFields(): array
    {
        return $this->fillable;
    }


    public function item(): MorphOne
    {
        return $this->morphOne(Item::class, 'itemable');
    }
}
