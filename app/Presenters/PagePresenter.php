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


class PagePresenter extends Presenter
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
        return $this->entity->url();
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



    public function date($format = null)
    {
        return intl_date($this->entity->date, $format);
    }


    public function title($slug = false)
    {
        if ($slug)
            return slugify($this->entity->title);

        return $this->entity->title;
    }



    public function alternate_title()
    {
        if (isset($this->entity->alternate_title) && $this->entity->alternate_title != '') {
            return $this->entity->alternate_title;
        }
        return $this->entity->title;
    }


    public function body()
    {
        return Shortcode::parse($this->entity->body);
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


    public function excerpt()
    {
        return Shortcode::parse($this->entity->excerpt);
    }

    public function file()
    {
        if (isset($this->entity->file) && $this->entity->file != '') {
            return asset($this->entity->file);
        }

        return null;
    }

    public function custom_css()
    {
        return $this->entity->custom_css;
    }

    public function custom_js()
    {
        return $this->entity->custom_js;
    }


    public function top_parent_slug()
    {
        return explode("/", $this->entity->path)[0];
    }


}