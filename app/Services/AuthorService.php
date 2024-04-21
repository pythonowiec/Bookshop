<?php

namespace App\Services;

use App\Repositories\AuthorRepository;
use Illuminate\Database\Eloquent\Collection;

class AuthorService
{
    private AuthorRepository $authorRepository;

    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function all(): Collection
    {
        return $this->authorRepository->all();
    }
}
