<?php

namespace larsvg\lvgimages;

use Illuminate\Support\ServiceProvider;

class LvgImagesServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if (app()->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/laravel-glide.php' => config_path('cms.php'),
            ], 'lvgimages');

            return;
        }
    }
}
