<?php

namespace App\Providers;

use App\Interfaces\AuthorRepositoryInterface;
use App\Interfaces\ItemRepositoryInterface;
use App\Repositories\AuthorRepository;
use App\Repositories\ItemRepository;
use App\Services\AuthorService;
use App\Services\ItemService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthorRepositoryInterface::class, AuthorRepository::class);
        $this->app->bind(AuthorService::class, function ($app) {
            return new AuthorService($app->make(AuthorRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
