<?php

namespace BlazeCMS\Web;

use Blade;
use Illuminate\Support\ServiceProvider;


class ComponentAlias extends ServiceProvider
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

        //sample
        //Blade::component('components.alert', 'alert');
    }
}
