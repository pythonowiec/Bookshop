<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorResource;
use App\Repositories\AuthorRepository;
use App\Services\AuthorService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AuthorController extends Controller
{
    private AuthorService $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    public function index(): AnonymousResourceCollection
    {
        return AuthorResource::collection($this->authorService->all());
    }
}
