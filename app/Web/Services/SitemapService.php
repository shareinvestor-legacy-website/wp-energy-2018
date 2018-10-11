<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/16/2016
 * Time: 17:55
 */

namespace BlazeCMS\Web\Services;


use BlazeCMS\Models\Page;
use GuzzleHttp\Client;


class SitemapService
{


    public function get($format = 'xml', $style = null)
    {
        $sitemap = app('sitemap');

        $pages = Page::public()->get();
        $default_locale = fallback_locale();

        foreach ($pages as $page) {

            $locales = locales();
            $translations = [];

            

            foreach ($locales as $key => $locale) {
                $translations[] = ['language' => substr($locale['regional'], 0, 2), 'url' => url("$key/$page->path")];
            }


            foreach (array_keys($locales) as $locale) {
                $sitemap->add(url("$locale/$page->path"), date('c', $page->updated_at->timestamp), '1.0', 'daily', [], null, $translations);
            }

        }

        return $sitemap->render($format, $style);

    }

    public function ping()
    {

        // -> http(s):://domain.com/sitemap.xml
        $sitemap = url('/') . "/sitemap.xml";
        $pingUrl = "http://www.google.com/webmasters/tools/ping?sitemap=$sitemap";

        $client = new Client();
        $client->request('GET', $pingUrl);
    }


}