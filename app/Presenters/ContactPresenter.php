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


class ContactPresenter extends Presenter
{




    public function name()
    {
        return $this->entity->name;
    }

    public function department()
    {
        return $this->entity->department;
    }


    public function location()
    {
        return $this->entity->location;
    }


    public function subject()
    {
        return $this->entity->subject;
    }

    public function emails()
    {
        return $this->entity->emails;
    }





}