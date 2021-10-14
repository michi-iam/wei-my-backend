<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\Blade;
use App\View\Components\Carousel;
use App\View\Components\Clearfix;

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
        Blade::component('carousel', Carousel::class);
        Blade::component('clearfix', Clearfix::class);
        Schema::defaultStringLength(191);
    }
}
