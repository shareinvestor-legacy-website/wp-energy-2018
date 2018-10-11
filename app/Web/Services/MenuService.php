<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 11/22/2016
 * Time: 18:04
 */

namespace BlazeCMS\Web\Services;


use BlazeCMS\Models\Menu;

class MenuService
{


    public function get(...$paths)
    {
        //normalize path
        if (is_array($paths)) {
            $paths = implode('/', array_filter($paths, 'strlen'));
        }
        $paths = strtolower($paths);

        //look slug first
        $menu = Menu::where('slug', $paths)->public()->first();
        if (isset($menu))
            return $menu;

        //try match exactly first
        $menu = Menu::where('path', $paths)->public()->first();
        if (isset($menu))
            return $menu;

        //if not found, try  look around match
        $menu = Menu::where('path', 'LIKE', "%{$paths}%")->public()->first();
        if (isset($menu))
            return $menu;


        //if not found again!, aggressively use regex match
        $pattern = "/".str_replace("/", ".*", $paths) ."/";
        foreach (Menu::all() as $menu) {

            if (preg_match($pattern, $menu->path)) {
                return $menu;
            }
        }
        return null;
    }

}
