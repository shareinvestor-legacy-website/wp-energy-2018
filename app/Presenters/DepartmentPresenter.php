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


class DepartmentPresenter extends Presenter
{



    public function name()
    {
        return $this->entity->name;
    }

    public function remark()
    {
        return Shortcode::parse($this->entity->remark);
    }

    

    

}