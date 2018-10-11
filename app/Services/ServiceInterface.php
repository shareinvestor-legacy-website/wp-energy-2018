<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 25/02/2016
 * Time: 14:31
 */

namespace BlazeCMS\Services;


use Illuminate\Http\Request;

interface ServiceInterface
{

    public function all();

    public function find($id);

    public function query(Request $request);

    public function store(Request $request);

    public function update(Request $request, $id);

    public function destroy($id);

}
