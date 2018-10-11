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


class ImagePresenter extends Presenter
{


    public function path()
    {
        return asset($this->entity->path);
    }

    public function order()
    {
        return $this->entity->order;
    }


    public function caption()
    {
        return  Shortcode::parse($this->entity->caption);
    }


}