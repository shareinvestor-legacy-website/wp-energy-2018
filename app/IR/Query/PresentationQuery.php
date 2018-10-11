<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/16/2017
 * Time: 9:06 PM
 */

namespace BlazeCMS\IR\Query;


class PresentationQuery extends QueryBuilder
{

    public function url()
    {
        return 'downloads/presentations.html';

    }

    public function cacheMinutes()
    {
        return 60;
    }
}
