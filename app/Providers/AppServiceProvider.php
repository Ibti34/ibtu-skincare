<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Fix for "key too long" migration error
        Schema::defaultStringLength(191);

        // ✅ Ensures all asset() links use HTTPS in production
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
