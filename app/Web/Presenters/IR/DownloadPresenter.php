<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/19/2016
 * Time: 14:01
 */

namespace BlazeCMS\Web\Presenters\IR;


use Laracasts\Presenter\Presenter;



class DownloadPresenter extends \BlazeCMS\IR\Presenter
{


    //custom methods here
    public function image($default = null)
    {
        if ($this->entity->image != '') {

            return $this->entity->image;
        } else if (isset($default)){

            return theme_url($default);
        }

        return null;
    }

}
