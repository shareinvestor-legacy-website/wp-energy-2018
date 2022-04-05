<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/16/2017
 * Time: 9:56 PM
 */

namespace BlazeCMS\IR\Query;


class OneReportQuery extends QueryBuilder
{


    public function url()
    {
        return 'downloads/one-reports.html';
    }

    public function cacheMinutes()
    {
        return 60;
    }

}
