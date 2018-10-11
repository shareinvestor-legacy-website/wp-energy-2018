<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/16/2017
 * Time: 8:40 PM
 */

namespace BlazeCMS\IR\Query;


class StockPriceQuery extends QueryBuilder
{


    public function url()
    {

        return "stock.html";
    }


    public function cacheMinutes()
    {
        return 3;
    }

}