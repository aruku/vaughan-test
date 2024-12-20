<?php

namespace App\Providers;

use App\Http\Middleware\BracketsAuthenticationMiddleware;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->routes(function () {
            Route::middleware(BracketsAuthenticationMiddleware::class)
                ->prefix("api")
                ->group(base_path("routes/api.php"));
        });
    }
}
