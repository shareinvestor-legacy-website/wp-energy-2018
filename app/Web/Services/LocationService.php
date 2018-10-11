<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 11/22/2016
 * Time: 18:05
 */

namespace BlazeCMS\Web\Services;


use BlazeCMS\Models\Location;

class LocationService
{
    public function find($id)
    {
        return Location::find($id);
    }


    public function get()
    {

        return Location::all()->sortBy('name');
    }


}