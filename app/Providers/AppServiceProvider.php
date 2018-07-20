<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use App\City;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()
            ->composer(['welcome'], function($view){
                $categories = Category::with('jobs')->withCount('jobs')->get();
                $cities = City::with('jobs')->withCount('jobs')->get();

                $view->with(compact('categories', 'cities'));
            });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
