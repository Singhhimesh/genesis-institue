<?php

namespace App\Providers;

use App\Core;
use App\Facades\Core as FacadesCore;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Foundation\AliasLoader;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('core', function () {
            return app()->make(Core::class);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        include __DIR__ .'/../Helpers/helper.php';

        Paginator::useBootstrap();
    }
}
