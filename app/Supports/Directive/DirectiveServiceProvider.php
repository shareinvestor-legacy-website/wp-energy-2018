<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/12/2017
 * Time: 3:21 PM
 */

namespace BlazeCMS\Supports\Directive;


use Blade;

use Illuminate\Support\ServiceProvider;

class DirectiveServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(DirectiveCompiler $compiler)
    {
        $directives = get_class_methods(get_class($compiler));

        foreach ($directives as $directive) {

            Blade::directive($directive, function ($expression) use ($directive, $compiler) {

                return $compiler->{$directive}($expression);

            });
        }
    }

}