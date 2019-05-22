<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class AppProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('Language', function ($app) {
            return new \App\Libs\Providers\Language();
        });

        $this->app->singleton('Category', function ($app) {
            return new \App\Libs\Providers\Category();
        });

        $this->app->singleton('Setting', function ($app) {
            return new \App\Libs\Providers\Frontend\Setting();
        });

        $this->app->singleton('Slide', function ($app) {
            return new \App\Libs\Providers\Frontend\Slide();
        });

        $this->app->singleton('Product', function ($app) {
            return new \App\Libs\Providers\Frontend\Product();
        });

        $this->app->singleton('CountView', function ($app) {
            return new \App\Libs\Providers\Frontend\CountView();
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        return ['Category'];
    }
}
