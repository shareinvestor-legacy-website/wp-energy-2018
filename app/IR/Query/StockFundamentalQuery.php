<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/16/2017
 * Time: 9:06 PM
 */

namespace BlazeCMS\IR\Query;


class StockFundamentalQuery extends QueryBuilder
{

    public function url()
    {
        return 'stock-fundamental.html';

    }

    public function cacheMinutes()
    {
        return 15;
    }
}