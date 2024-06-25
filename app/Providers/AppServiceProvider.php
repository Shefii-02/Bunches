<?php

namespace App\Providers;

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
        //
        $theme = \App\Models\Theme::first();
        view()->share('title', 'Bunches');
        view()->share('keywords', 'Bunches');
        view()->share('description', 'Bunches');
        view()->share('theme', $theme->theme_code ?? 'theme-1');

    }
}


