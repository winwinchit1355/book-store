<?php

namespace App\Providers;

use App\Repositories\BookRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\BookRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(BookRepositoryInterface::class, BookRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
