<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/24/2016
 * Time: 16:31
 */

namespace BlazeCMS\Web\Services;


use BlazeCMS\Models\Menu;
use BlazeCMS\Supports\HttpClient;

class ApiService
{

    public function menu($irmenu = null, $sources = null)
    {

        $sources = isset($sources) ? $sources : Menu::roots()->get()->load('translations');

        $menus = [];

        foreach ($sources as $source) {

            if ($source->getLevel() == 1 && $source->path == 'main/investor-relations' && isset($irmenu)) {
                $menus[] = (array)$irmenu;

            } else {
                $menu = [];
                $menu['title'] = $source->name;
                $menu['display'] = $source->status == 'public' ? true : false;
                $menu['link'] = $source->url();
                $menu['target'] = $source->external_url_target;
                $menu['id'] = str_replace(['-', '/'], '_', $source->path);

                if ($source->children()->count() > 0) {
                    $menu['submenus'] = $this->menu(null, $source->children()->get());
                }
                $menus[] = $menu;
            }

        }

        return $menus;


    }

    public function getYears($results, $locale = null)
    {
        $locale = $locale ?? locale();

        $years = $results->map(function ($item) use ($locale) {
            return $item->datetime('yyyy', $locale);
        })->unique()->values();

        return $years;
    }


}