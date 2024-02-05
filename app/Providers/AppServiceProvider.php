<?php

namespace App\Providers;

use App\View\Composers\FavComposer;
use App\View\Composers\CartComposer;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\View\Composers\CategoryComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        View::composer('*', CategoryComposer::class);
        View::composer('*', FavComposer::class);
        View::composer('*', CartComposer::class);
    }
}
