<?php

namespace App\Providers;

use App\Model\Brand;
use App\Model\Category;
use App\Model\GenderCategory;
use App\Model\Product;
use App\Model\Size;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // данные для header
        view()->composer('user.layout.header', function ($view) {
            $view->with('genders', GenderCategory::all());
        });

        // данные для header
        view()->composer('user.product.filter', function ($view) {
            $view->with('genders', GenderCategory::all());
            $view->with('categories', Category::all());
            $view->with('brands', Brand::all());
            $view->with('sizes', Size::all());
        });

        view()->composer('user.layout.footer', function ($view) {
            $view->with('genders', GenderCategory::all());
            $view->with('categories', Category::all());
            $view->with('brands', Brand::all());
            $view->with('sizes', Size::all());
        });
    }
}
