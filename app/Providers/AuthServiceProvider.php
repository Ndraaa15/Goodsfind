<?php

namespace App\Providers;

use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if (Schema::hasTable('carts') && Schema::hasTable('wishlists') && Schema::hasTable('products') && Schema::hasTable('product_categories')) {
            View::share('cartTotal', 3);
            View::composer('*', function ($view) {
                if (auth()->check()) {
                    $wishTotal =  WishlistController::count_wishlist();
                    $cartTotal =  CartController::count_cart();
                    $view->with('wishTotal', $wishTotal);
                    $view->with('cartTotal', $cartTotal);
                } else {
                    $view->with('wishTotal', 0);
                    $view->with('cartTotal', 0);
                }
            });
        }
    }
}
