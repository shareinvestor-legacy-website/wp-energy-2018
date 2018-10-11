<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/16/2017
 * Time: 9:56 PM
 */

namespace BlazeCMS\IR\Query;


class CompanySnapshotQuery extends QueryBuilder
{


    public function url()
    {
        return 'downloads/company-snapshots.html';
    }

    public function cacheMinutes()
    {
        return 60;
    }

}
