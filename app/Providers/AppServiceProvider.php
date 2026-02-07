<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL; // <--- Add this line
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Schema::defaultStringLength(191);

        // ✅ Add this block to fix the "naked" layout on Railway
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
