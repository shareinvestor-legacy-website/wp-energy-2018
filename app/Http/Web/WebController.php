<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/17/2016
 * Time: 16:26
 */

namespace BlazeCMS\Http\Web;


use BlazeCMS\IR\QueryService;
use BlazeCMS\Web\Services\ApiService;
use BlazeCMS\Web\Services\CategoryService;
use BlazeCMS\Web\Services\DepartmentService;
use BlazeCMS\Web\Services\GalleryService;
use BlazeCMS\Web\Services\LocationService;
use BlazeCMS\Web\Services\MenuService;
use BlazeCMS\Web\Services\PageService;
use BlazeCMS\Web\Services\PositionService;
use BlazeCMS\Web\Services\PostService;
use BlazeCMS\Http\Controller;
use Illuminate\Http\Request;


class WebController extends Controller
{
    private $menuService;
    private $irService;
    private $pageService;
    private $postService;
    private $categoryService;
    private $galleryService;
    private $positionService;
    private $departmentService;
    private $locationService;
    private $apiService;



    public function __construct(MenuService $menuService, PageService $pageService, PostService $postService, CategoryService $categoryService,
                                GalleryService $galleryService, PositionService $positionService, DepartmentService $departmentService,
                                LocationService $locationService, ApiService $apiService, QueryService $irService)
    {

        $this->irService = $irService;
        $this->menuService = $menuService;
        $this->pageService = $pageService;
        $this->postService = $postService;
        $this->categoryService = $categoryService;
        $this->galleryService = $galleryService;
        $this->positionService = $positionService;
        $this->departmentService = $departmentService;
        $this->locationService = $locationService;
        $this->apiService = $apiService;


        $this->boot();
    }

    //load common data
    private function boot()
    {


        view()->share('is_home', false);
        view()->share('menus', $this->menuService->get('main'));
        view()->share('footer_menus', $this->menuService->get('footer'));

    }

    public function assets($file)
    {
        $file = chunkhash_path("/themes/default/assets/${file}");
        if (env('APP_HTTPS') == true && env('APP_ENV') == 'production') {
            return redirect()->secure($file);
        }

        return redirect($file);
    }



    public function page($page1 = null, $page2 = null, $page3 = null, $page4 = null, $page5 = null)
    {
        $page = $this->pageService->get($page1, $page2, $page3, $page4, $page5);


        if (isset($page)) {

            //redirect to external url if exists
            if (!empty($page->external_url)) {
                return redirect($page->external_url);
            }
            return view('web.page', compact('page'));
        }

        return redirect('home');

    }


    public function index()
    {

        $post = $this->postService->get('intro-page')->first();

        if (isset($post)) {
            return view('web.intropage', compact('post'));

        } else {

            $is_home = true;
            $page = $this->pageService->get('home');
            $dialog = $this->postService->get('intro-dialog')->first();

            return view('web.home', compact('is_home', 'page', 'dialog'));
        }
    }

    public function home()
    {
        $is_home = true;
        $page = $this->pageService->get('home');

        $dialog = $this->postService->get('intro-dialog')->first();

        return view('web.home', compact('is_home', 'page', 'dialog'));

    }



}
