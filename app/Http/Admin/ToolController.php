<?php

namespace BlazeCMS\Http\Admin;




use BlazeCMS\Services\ToolService;
use BlazeCMS\Web\Services\SitemapService;
use DOMDocument;
use Illuminate\Http\Request;


class ToolController extends AdminController
{

    private $sitemapService;
    private $toolService;


    public function __construct(ToolService $toolService, SitemapService $sitemapService)
    {
        $this->toolService = $toolService;
        $this->sitemapService = $sitemapService;
    }


    public function audit(Request $request)
    {

        $ip = $request->ip;
        $event = $request->event;
        $user = $request->user;
        $table = $request->table;
        $from = $request->from;
        $to = $request->to;
        $old_value = $request->old_value;
        $new_value = $request->new_value;


        $logs = $this->toolService->queryAudit($request);


        return view('tool.audit.index', compact('ip', 'event', 'user', 'table', 'logs', 'from', 'to', 'old_value', 'new_value'));
    }


    public function updateURL(Request $request)
    {

        if ($request->isMethod('get')) {
            return view('tool.url.update');
        }

        $this->toolService->updateURLs($request);

        flash_success('The urls has successfully deleted');

        return back();
    }

    public function sitemap(Request $request)
    {

        if ($request->isMethod('patch')) {
            $this->sitemapService->ping();
            flash_success('Ping sitemap.xml to google successfully');
            return back();
        } else {
            $sitemap = $this->sitemapService->get()->original;


            $dom = new DOMDocument;
            $dom->preserveWhiteSpace = FALSE;
            $dom->loadXML($sitemap);
            $dom->formatOutput = TRUE;
            $sitemap = $dom->saveXml();

            return view('tool.sitemap.update', compact('sitemap'));
        }

    }


    public function clearCache(Request $request)
    {
        //just trigger post request to clear cache via middleware
        return back();
    }


}
