<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/19/2016
 * Time: 14:01
 */

namespace BlazeCMS\Web\Presenters\IR;






class StockPricePresenter extends \BlazeCMS\IR\Presenter
{


    //custom methods here
    public function range52weeks()
    {

        return "{$this->low_52weeks} - {$this->high_52weeks}";
    }

    public function rangeDays()
    {

        return "{$this->low} - {$this->high}";
    }
}
