<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Review;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    public function getCategories()
    {
        if (Schema::hasTable('product_categories')) {
            $productCategoryModel = new ProductCategory();
            return $productCategoryModel->get_all_product_category();
        }
    }

    public function getNews(): array
    {
        return ['Title' => "Goodsvind", 'Desc' => "Get ur 20% Discount on first checkout", 'ImageUrl' => "assets/images/news.jpg", 'Target' => "/shop"];
    }

    public function getSlide(): array
    {
        return [
            [
                'id' => 1,
                'head' => 'Daily Deals',
                'name' => 'AirPods Earphones',
                'url' => 'assets/images/slide-1.jpg',
                'price' => '250000',
                'disc' => '0',
                'target' => '/shop'
            ],
            [
                'id' => 2,
                'head' => 'Deals and Promotions',
                'name' => 'Echo Dot 3rd Gen',
                'url' => 'assets/images/slide-2.jpg',
                'price' => '200000',
                'disc' => '50',
                'target' => '/shop'
            ]
        ];
    }

    public function getProduct()
    {
        if (Schema::hasTable('products')) {
            $productModel = new Product();
            return  $productModel->get_all_product([
                'is_promotion' => true
            ]);
        }
        return [];
    }

    public function getReviews()
    {
        if (Schema::hasTable('reviews')) {
            $reviewModel = new Review();
            return  $reviewModel->get_all_review();
        }
        return [];
    }

    public function boot(): void
    {
        View::share('title', 'Goodsvind');
        View::share('logoUrl', 'assets/images/logo.png');
        View::share('categories', $this->getCategories());
        View::share('news', $this->getNews());
        View::share('slide', $this->getSlide());
        View::share('products', $this->getProduct());
        View::share('reviews', $this->getReviews());
    }
}
