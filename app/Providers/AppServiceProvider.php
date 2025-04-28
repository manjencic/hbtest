<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;
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
    public function boot(RateLimiter $rateLimiter): void
    {
        $rateLimit = env('CONTRACT_RATE_LIMIT', 100);
        $rateLimitTimeframe = env('CONTRACT_RATE_LIMIT_TIMEFRAME', 60);

        $rateLimiter->for('contract', function ($request) use ($rateLimit, $rateLimitTimeframe) {
            return Limit::perMinutes($rateLimitTimeframe, $rateLimit);
        });
    }
}
