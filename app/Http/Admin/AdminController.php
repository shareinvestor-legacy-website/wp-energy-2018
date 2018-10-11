<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/3/2016
 * Time: 16:29
 */

namespace BlazeCMS\Http\Admin;


use BlazeCMS\Http\Controller;



class AdminController extends Controller
{


    public function dashboard() {
        return view('dashboard.index');
    }


    public function error($id) {
        return view('errors.'.$id);
    }
}