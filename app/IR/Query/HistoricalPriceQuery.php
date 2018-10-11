<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/16/2017
 * Time: 9:06 PM
 */

namespace BlazeCMS\IR\Query;


abstract class HistoricalPriceQuery extends QueryBuilder
{


    private $date_start;
    private $date_end;

    public function __construct($date_start = null, $date_end = null)
    {
        $this->date_start = $date_start;   //yyyyMMdd
        $this->date_end = $date_end;       //yyyyMMdd

    }


    public function parameters()
    {

        if (isset($this->date_start) && isset($this->date_end)) {
            return [
                'date_start' => $this->date_start,
                'date_end' => $this->date_end,
            ];
        }
        return null;
    }

}