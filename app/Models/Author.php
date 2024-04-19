<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'place_of_birth',
    ];

    public function books() : hasMany
    {
        return $this->hasMany(Book::class);
    }

    public function comics() : hasMany
    {
        return $this->hasMany(Comic::class);
    }

    public function shortStoryCollections() : hasMany
    {
        return $this->hasMany(ShortStoryCollection::class);
    }
}
