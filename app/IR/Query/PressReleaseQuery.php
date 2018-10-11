<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/16/2017
 * Time: 9:06 PM
 */

namespace BlazeCMS\IR\Query;


class PressReleaseQuery extends QueryBuilder
{

    public function url()
    {
        return 'newsrooms/press-releases.html';

    }

    public function cacheMinutes()
    {
        return 60;
    }
}
