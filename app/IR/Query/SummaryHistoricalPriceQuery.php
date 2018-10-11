<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/16/2017
 * Time: 9:06 PM
 */

namespace BlazeCMS\IR\Query;


class SummaryHistoricalPriceQuery extends HistoricalPriceQuery
{


    public function __construct($date_from = null, $date_to = null)
    {
        parent::__construct($date_from, $date_to);;
    }


    public function url()
    {
        return 'historical-prices/summary.html';

    }

    public function cacheMinutes()
    {
        return 60;
    }
}