<?php

namespace App\Providers;

use App\Services\TinyUrlShortener;
use App\Services\UrlShortener;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UrlShortener::class, TinyUrlShortener::class);
    }
}
