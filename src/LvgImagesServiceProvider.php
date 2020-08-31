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
        dd('init');
    }
}
