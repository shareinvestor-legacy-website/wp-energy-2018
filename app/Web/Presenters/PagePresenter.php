<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/19/2016
 * Time: 14:01
 */

namespace BlazeCMS\Web\Presenters;




class PagePresenter extends \BlazeCMS\Presenters\PagePresenter
{

    //custom methods here

    public function getTitle(){

        return $this->title();
    }

}
