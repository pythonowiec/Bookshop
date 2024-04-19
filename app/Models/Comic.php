<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'author_id',
        'series',
    ];

    public function author() : BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}
