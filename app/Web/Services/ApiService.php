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
use BlazeCMS\IR\QueryService;

class ApiService
{

    private $irService;

    public function __construct(QueryService $irService)
    {

        $this->irService = $irService;
    }

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

    public function queryByYear($year, $posts)
    {
        if($year)
        {
            $posts = $posts->filter(function ($item, $key) use ($year) {
                return $item->datetime('yyyy', 'en') == $year;
            });
        }

        return $posts;
    }

    public function getDownloadByYear($year, $results)
    {
        $posts = $results->filter(function ($item, $key) use ($year) {
            return $item->datetime('yyyy') == intl_convert_format($year, 'yyyy', 'yyyy', 'en');
        });

        return $posts;
    }

    public function groupDownloadByQuater($results, $year = null)
    {
        $results = $results->filter(function ($item) use ($year) {
            return $item->datetime('yyyy') == intl_convert_format($year, 'yyyy', 'yyyy', 'en');
        });

        // group by year
        $posts = $results->groupBy(function ($item, $key) {
            return $item->datetime('yyyy');
        });

        return $posts;
    }


    public function groupByYear($results)
    {
        $posts = $results->groupBy(function ($item, $key) {
            return $item->datetime('yyyy');
        });

        return $posts;
    }


    public function getNews($slug = null)
    {
        switch ($slug) {
            case 'set-announcements':
                return $this->irService->getSetAnnouncements();
                break;

            case 'press-releases':
                return $this->irService->getPressReleases();
                break;

            case 'news-clippings':
                return $this->irService->getNewsClippings();
                break;
        }

    }

    public function getDownloads($slug = null)
    {
        switch ($slug) {
            case 'financial-statements':
                return $this->irService->getFinancialStatements();
                break;

            case 'management-discussion-and-analysis':
                return $this->irService->getMdna();
                break;

            case 'form-56-1':
                return $this->irService->getForm561();
                break;

            case 'webcast':
                return $this->irService->getWebcasts();
                break;

            case 'presentation':
                return $this->irService->getPresentations();
                break;

            case 'annual-report':
                return $this->irService->getAnnualReports();
                break;

            case 'factsheet':
                return $this->irService->getFactsheets();
                break;
        }
    }

    public function getDownloadView($slug = null)
    {
        if ($slug == 'form-56-1') {

            return 'form561';
        } else {

            return 'index';
        }
    }

    public function getMatchingPosts($posts, $posts2)
    {
        $starts = $posts;
        $ends = $posts2;

        if($posts->count() < $posts2->count()){
            $starts = $posts2;
            $ends = $posts;
        }

        return $starts->map(function($item) use ($ends){

            foreach ($ends as $post)
            {
                if(str_contains($post->present()->title, $item->present()->title) || str_contains($item->present()->title, $post->present()->title))
                {
                    $post->file = $item->file ?? $post->file;
                    $post->url = $item->url ?? $post->url;

                    return $post;
                }else{

                    $item->file = $item->file ?? null;
                    $item->url = $item->url ?? null;

                    return $item;
                }
            }
        });
    }
}
