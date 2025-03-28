<?php

namespace App\Providers;

use App\Models\CatalogElement;
use App\Observers\CatalogElementObserver;
use Illuminate\Support\ServiceProvider;

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
        CatalogElement::observe(CatalogElementObserver::class);
    }
}
