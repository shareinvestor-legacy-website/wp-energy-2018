<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/17/2016
 * Time: 12:28
 */

namespace BlazeCMS\Http\Admin;


class ElfinderController extends  \Barryvdh\Elfinder\ElfinderController
{


    protected function getViewVars()
    {
        $dir = 'assets/vendor/barryvdh/' . $this->package;
        $locale = str_replace("-",  "_", $this->app->config->get('app.locale'));
        if (!file_exists($this->app['path.public'] . "/$dir/js/i18n/elfinder.$locale.js")) {
            $locale = false;
        }
        $csrf = true;
        return compact('dir', 'locale', 'csrf');
    }
}