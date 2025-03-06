<?php

namespace App\Providers;

use App\Http\Repositories\{StatusRepository, SourceRepository};
use App\Interfaces\{StatusRepositoryInterface, SourceRepositoryInterface};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(StatusRepositoryInterface::class, StatusRepository::class);
        $this->app->bind(SourceRepositoryInterface::class, SourceRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
