<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/19/2016
 * Time: 14:01
 */

namespace BlazeCMS\Web\Presenters;

class MenuPresenter extends \BlazeCMS\Presenters\MenuPresenter
{

    //custom methods here
    public function isActive()
    {
        return str_contains(request()->fullUrl(), $this->url());
    }

    public function getTitle($sidebar = null){

        if(isset($sidebar) && $sidebar != null)
        {

            return $sidebar->hasTag('has-sidebar') ? $this->parent->name : $this->name();
        }

        return $this->name();
    }

    public function getSlugWithDot(){

        return str_replace('-', '.', $this->slug);
    }

}
