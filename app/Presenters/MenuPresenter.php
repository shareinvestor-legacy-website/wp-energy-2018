<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/19/2016
 * Time: 14:01
 */

namespace BlazeCMS\Presenters;


use Laracasts\Presenter\Presenter;
use Shortcode;


class MenuPresenter extends Presenter
{


    public function status()
    {
        return $this->entity->status;
    }

    public function slug()
    {
        return $this->entity->slug;
    }


    public function path()
    {
        return $this->entity->path;
    }


    public function url()
    {
        $url = $this->entity->url();

        if (isset($url) && $url != '')
            return $url;

        return 'javascript:;';
    }


    public function external_url()
    {
        return $this->entity->external_url;
    }


    public function external_url_target()
    {
        if (isset($this->entity->external_url_target) && $this->entity->external_url_target != '') {
            return $this->entity->external_url_target;
        }
        return '_self';
    }


    public function name()
    {
        return $this->entity->name;
    }


}