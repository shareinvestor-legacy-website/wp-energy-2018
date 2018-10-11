<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/16/2016
 * Time: 17:58
 */

namespace BlazeCMS\Http\Web;


use BlazeCMS\Http\Controller;
use BlazeCMS\Web\Services\SitemapService;


class SitemapController extends Controller
{

    private $sitemapService;


    public function __construct(SitemapService $sitemapService)
    {


        $this->sitemapService = $sitemapService;
    }

    public function xml()
    {

        return $this->sitemapService->get('xml', 'assets/vendor/sitemap/styles/xml.xsl');
    }
}