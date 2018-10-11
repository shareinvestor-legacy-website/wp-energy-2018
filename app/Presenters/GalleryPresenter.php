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


class GalleryPresenter extends Presenter
{


    public function status()
    {
        return $this->entity->status;
    }

    public function date()
    {
        return intl_date($this->entity->date);
    }

    public function name()
    {
        return $this->entity->name;
    }



    public function description()
    {
        return Shortcode::parse($this->entity->description);
    }


}