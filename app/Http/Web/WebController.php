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
            $parent = $page->parent()->first();
            $sidebar = $this->menuService->get($parent->slug);
            $title = $sidebar->hasTag('has-sidebar') ? $parent->present()->title : $page->present()->title;

            //redirect to external url if exists
            if (!empty($page->external_url)) {
                return redirect($page->external_url);
            }
            return view('web.page', compact('page', 'sidebar', 'title'));
        }

        return redirect('home');

    }


    public function index()
    {

        $post = $this->postService->get('intro-page')->first();

        if (isset($post)) {
            return view('web.intropage', compact('post'));

        } else {

            return $this->home();
        }
    }

    public function home()
    {
        $is_home = true;
        $page = $this->pageService->get('home');
        $pages = $this->pageService->get('home')->children()->public()->get();

        $dialog = $this->postService->get('intro-dialog')->first();

        return view('web.home', compact('is_home', 'pages', 'page', 'dialog'));

    }

    public function management($root, $category)
    {

        $category = $this->categoryService->get("management/{$category}")->first();
        $menu = $this->menuService->get($root, $category->slug);
        $parent = $menu->parent()->first();
        $sidebar = $this->menuService->get($parent->slug);
        $title = $sidebar->hasTag('has-sidebar') ? $parent->present()->name : $menu->present()->name;
        $posts = $this->postService->getCoerciveOrder($category->path);

        return view('web.management.index', compact('root', 'menu', 'category', 'posts', 'title', 'sidebar'));
    }

    public function showManagement($root, $category, $id, $title = null)
    {

        $post = $this->postService->find($id);

        if ($post->present()->title(true) !== $title) {
            return redirect(action('Web\WebController@showManagement', ['root'=> $root, 'category' => $category, 'id' => $id, 'title' => $post->present()->title(true)]));
        }

        $category = $this->categoryService->get("management/{$category}")->first();
        $menu = $this->menuService->get($root, $category->slug);

        return view('web.management.detail', compact('root', 'menu', 'category', 'post'));

    }



}
