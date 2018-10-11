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


class CategoryPresenter extends Presenter
{

    public function banner($default = null)
    {
        $banner = $this->entity->banner();
        if (isset($banner) && $banner != '') {
            return asset($banner);
        }
        if (isset($default))
            return theme_url($default);

        return null;
    }


    public function image($default = null)
    {
        if (isset($this->entity->image) && $this->entity->image != '') {
            return asset($this->entity->image);
        }
        if (isset($default))
            return theme_url($default);

        return null;
    }


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


    public function name()
    {
        return $this->entity->name;
    }


    public function excerpt()
    {
        return Shortcode::parse($this->entity->excerpt);
    }


    public function body()
    {
        return Shortcode::parse($this->entity->body);
    }



}