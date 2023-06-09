<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/20/2016
 * Time: 05:29
 */

namespace BlazeCMS\Web;

use BlazeCMS\IR\QueryService;
use BlazeCMS\Web\Services\ApiService;
use BlazeCMS\Web\Services\CategoryService;
use BlazeCMS\Web\Services\DepartmentService;
use BlazeCMS\Web\Services\GalleryService;
use BlazeCMS\Web\Services\LocationService;
use BlazeCMS\Web\Services\PageService;
use BlazeCMS\Web\Services\PositionService;
use BlazeCMS\Web\Services\PostService;
use Thunder\Shortcode\Shortcode\ShortcodeInterface;


class Shortcodes extends \BlazeCMS\Shortcode\Shortcodes
{

    protected $pageService;
    protected $postService;
    protected $categoryService;
    protected $galleryService;
    protected $positionService;
    protected $departmentService;
    protected $locationService;
    protected $apiService;
    protected $irService;


    public function __construct(PageService $pageService, PostService $postService, CategoryService $categoryService,
                                GalleryService $galleryService, PositionService $positionService, DepartmentService $departmentService,
                                LocationService $locationService, ApiService $apiService, QueryService $irService)
    {
        $this->pageService = $pageService;
        $this->postService = $postService;
        $this->categoryService = $categoryService;
        $this->galleryService = $galleryService;
        $this->positionService = $positionService;
        $this->departmentService = $departmentService;
        $this->locationService = $locationService;
        $this->apiService = $apiService;
        $this->irService = $irService;
    }


    public function hero_banner()
    {

        $posts = $this->postService->getCoerciveOrder('hero-banner');

        return view('shortcode.home.hero-banner', compact('posts'));
    }

    public function home_news(ShortcodeInterface $s)
    {
        $root = 'news-media';
        $posts = $this->postService->get('update/csr-activities')->take(2);
        $posts = $posts->merge($this->postService->get('update/press-conference')->take(1));

        return view('shortcode.home.news', compact('posts', 'root'));
    }

    public function home_stock()
    {

        $stock = $this->irService->getStockPrice();

        return view("shortcode.home.stock", compact('stock'));

    }

    public function stockquote()
    {
        $stock = $this->irService->getStockPrice();

        return view('shortcode.stockquote', compact('stock'));

    }

    public function ir_highlights(ShortcodeInterface $s)
    {

        $posts = $this->irService->getHighlightDownloads()->take(3);

        return view('shortcode.home.download', compact('posts'));
    }

    public function ir_news()
    {

        $posts = $this->irService->getHighlightNews()->take(2);

        return view('shortcode.home.ir-news', compact('posts'));
    }

    public function ir_stock()
    {

        $stock = $this->irService->getStockPrice();

        return view("shortcode.ir.stock", compact('stock'));

    }

    public function download(ShortcodeInterface $s)
    {

        $slug = $s->getParameter('slug');
        $limit = $s->getParameter('limit');
        $posts = $this->postService->getCoerciveOrder("download/{$slug}");

        if($limit)
            $posts = $posts->take($limit);

        return view('shortcode.download', compact('posts'));
    }

    public function accordion(ShortcodeInterface $s)
    {

        $path = $s->getParameter('path');
        $category = $this->categoryService->get($path)->first();
        $posts = $this->postService->getCoerciveOrder($category->path);

        return view('shortcode.accordion', compact('posts','category'));

    }

    public function form(ShortcodeInterface $s)
    {

        $name = $s->getParameter('name') ?? 'ir-contact';

        return view("shortcode.form.{$name}");

    }

    public function online_application()
    {

        $positions = $this->positionService->get();

        return view("shortcode.form.online-application", compact('positions'));

    }

    public function jobboard()
    {

        $positions = $this->positionService->get();

        return view("shortcode.jobboard", compact('positions'));

    }

    public function presentation()
    {

        $post = $this->apiService->getDownloads('presentation')->first();

        return view("shortcode.ir.presentation", compact('post'));

    }

    public function set_announcements()
    {

        $posts = $this->irService->getSetAnnouncements()->take(2);

        return view('shortcode.ir.set-announcements', compact('posts'));
    }

    public function upcomming_event()
    {

        $category = $this->categoryService->get("ir-calendar")->first();
        $post = $this->postService->getComingPosts($category->path)->first();
        
        return view('shortcode.ir.upcomming-event', compact('post', 'category'));
    }

    public function ir_download()
    {

        $posts = $this->irService->getHighlightDownloads()->take(3);

        return view('shortcode.ir.download', compact('posts'));
    }

    public function sitemap()
    {
        return view('shortcode.sitemap');
    }

}
