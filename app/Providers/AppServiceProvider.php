<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // <-- Iki tambahan penting 1

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
        // Iki tambahan penting 2: Mekso rute dadi HTTPS pas online
        if (config('app.env') === 'production' || env('PORT')) {
            URL::forceScheme('https');
        }
    }
}