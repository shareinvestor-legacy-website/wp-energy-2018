<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/19/2016
 * Time: 14:01
 */

namespace BlazeCMS\Presenters;




use BlazeCMS\Supports\IntlDate;
use Laracasts\Presenter\Presenter;
use Shortcode;


class PositionPresenter extends Presenter
{


    public function status()
    {
        return $this->entity->status;
    }

    public function date($format = null)
    {
        return intl_date($this->entity->date, $format);
    }


    public function availability()
    {
        return $this->entity->availability;
    }


    public function title()
    {
        return $this->entity->title;
    }

    public function qualification()
    {
        return Shortcode::parse($this->entity->qualification);
    }


    public function description()
    {
        return  Shortcode::parse($this->entity->description);
    }


    public function external_url()
    {
        return $this->entity->external_url;
    }


    public function external_url_target()
    {
        return $this->entity->external_url_target;
    }


}