<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/20/2016
 * Time: 05:32
 */

namespace BlazeCMS\Shortcode;


use Shortcode;

class ShortcodeServiceProvider extends \Pingpong\Shortcode\ShortcodeServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('shortcode', function ($app) {
            return new \Pingpong\Shortcode\Shortcode();
        });
    }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(\BlazeCMS\Web\Shortcodes $compiler)
    {
        $shortcodes = get_class_methods(get_class($compiler));

        foreach ($shortcodes as $shortcode) {
            $code = str_replace('_', '-', $shortcode);
            Shortcode::register($code, array($compiler, $shortcode));
        }


    }

}
