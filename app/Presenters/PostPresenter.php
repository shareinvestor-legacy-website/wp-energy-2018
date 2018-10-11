<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/19/2016
 * Time: 14:01
 */

namespace BlazeCMS\Presenters;


use File;
use Laracasts\Presenter\Presenter;
use Shortcode;


class PostPresenter extends Presenter
{


    public function status()
    {
        return $this->entity->status;
    }


    public function date($format = null)
    {
        return intl_date($this->entity->date, $format);
    }


    public function period_from($format = null)
    {
        return intl_datetime($this->entity->period_from, $format);
    }


    public function period_to($format = null)
    {
        return intl_datetime($this->entity->period_to, $format);
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

    public function slug()
    {
        return $this->entity->slug;
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


    public function url()
    {
        return $this->entity->url();
    }


    public function excerpt()
    {
        return Shortcode::parse($this->entity->excerpt);
    }


    public function body()
    {
        return Shortcode::parse($this->entity->body);
    }


    public function file()
    {

        if (isset($this->entity->file) && $this->entity->file != '') {

            return asset($this->entity->file);
        }
        return null;
    }


    public function fileExtension()
    {
        if (isset($this->entity->file) && $this->entity->file != '') {
            return strtoupper(File::extension($this->entity->file));
        }
        return null;
    }

    public function fileSize()
    {
        if (isset($this->entity->file) && $this->entity->file != '') {
            try {
                return bytesToHuman(File::size(public_path($this->entity->file)));
            } catch (\Exception $e) {
                return null;
            }

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



}