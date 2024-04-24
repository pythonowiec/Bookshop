<?php

namespace App\Repositories;

use App\Interfaces\AuthorRepositoryInterface;
use App\Models\Author;
use Illuminate\Database\Eloquent\Collection;

class AuthorRepository implements AuthorRepositoryInterface
{

    public function all(): Collection
    {
        return Author::all();
    }
}
