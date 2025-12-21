<?php

namespace App\Providers;

use App\Services\CartService;
use App\Services\WishlistService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(CartService::class, function ($app) {
            return new CartService();
        });

        $this->app->singleton(WishlistService::class, function ($app) {
            return new WishlistService();
        });
    }
}
