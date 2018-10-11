<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 2/8/2017
 * Time: 6:17 AM
 */

namespace BlazeCMS\Providers;


use BlazeCMS\Services\TagService;

class EloquentTaggableServiceProvider extends \Cviebrock\EloquentTaggable\ServiceProvider
{

    public function boot()
    {

        $this->publishes([
            __DIR__ . '/../resources/config/taggable.php' => config_path('taggable.php'),
        ], 'config');

        if (!class_exists('CreateTaggableTable')) {
            $this->loadMigrationsFrom(
                __DIR__ . '/../resources/database/migrations'
            );
        }
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton(TagService::class);
    }
}