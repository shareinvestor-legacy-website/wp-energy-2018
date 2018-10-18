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


        view()->share('isHome', false);
        view()->share('menus', $this->menuService->get('main'));
        view()->share('footerMenus', $this->menuService->get('footer'));

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
            $sidebar = $this->menuService->get($page1, $parent->slug);
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
        $isHome = true;
        $page = $this->pageService->get('home');
        $pages = $this->pageService->get('home')->children()->public()->get();

        $dialog = $this->postService->get('intro-dialog')->first();

        return view('web.home', compact('isHome', 'pages', 'page', 'dialog'));

    }

    //award
    public function award($root)
    {

        $category = $this->categoryService->get("awards-recognitions")->first();
        $menu = $this->menuService->get($root, $category->slug);
        $parent = $menu->parent()->first();
        $sidebar = $this->menuService->get($root, $parent->slug);
        $title = $sidebar->hasTag('has-sidebar') ? $parent->present()->name : $menu->present()->name;
        $posts = $this->postService->getCoerciveOrder($category->path);
        $highlights = $this->postService->getCoerciveOrder("{$category->path}/highlights");

        return view('web.award.index', compact('root', 'menu', 'category', 'highlights', 'posts', 'title', 'sidebar'));
    }

    //milestone
    public function milestone($root)
    {

        $category = $this->categoryService->get("company-milestone")->first();
        $menu = $this->menuService->get($root, $category->slug);
        $parent = $menu->parent()->first();
        $sidebar = $this->menuService->get($root, $parent->slug);
        $title = $sidebar->hasTag('has-sidebar') ? $parent->present()->name : $menu->present()->name;
        $posts = $this->postService->getCoerciveOrder($category->path);

        return view('web.milestone', compact('root', 'menu', 'category', 'highlights', 'posts', 'title', 'sidebar'));
    }

    //subsidiary
    public function subsidiary($root)
    {

        $category = $this->categoryService->get("company-subsidiary")->first();
        $menu = $this->menuService->get($root, $category->slug);
        $parent = $menu->parent()->first();
        $sidebar = $this->menuService->get($root, $parent->slug);
        $title = $sidebar->hasTag('has-sidebar') ? $parent->present()->name : $menu->present()->name;
        $posts = $this->postService->getCoerciveOrder($category->path);

        return view('web.subsidiary', compact('root', 'menu', 'category', 'highlights', 'posts', 'title', 'sidebar'));
    }

    //download
    public function download(Request $request, $root, $page2)
    {

        $posts = $this->apiService->getDownloads($page2);
        $latest = $posts->first();

        $menu = $this->menuService->get($root, $page2);

        $years = $this->apiService->getYears($posts, 'en');
        $year = $request->year ?? $years->first();
        $years = locale_years_mapping($years);

        $posts =  $this->apiService->queryByYear($year, $posts);

        $view =  'index';
        if($page2 == 'analyst-report'){
            $view =  'analyst';
            $posts = paginate($posts, 12);
        }

        return view("web.download.{$view}", compact('root', 'menu', 'posts', 'years', 'year', 'latest'));
    }

    //document
    public function document(Request $request, $root, $category)
    {

        $category = $this->categoryService->get("document/{$category}")->first();
        $menu = $this->menuService->get($root, $category->slug);
        $posts = $this->postService->get($category->path);
        $years = $this->postService->getYears($category->path);
        $year = $request->year ?? get_first_array($years, true);
        $posts = $this->postService->queryByYear($year, $category->path);

        return view('web.document', compact('root', 'menu', 'category', 'posts', 'years', 'year'));
    }

    //report
    public function report($root, $category)
    {
        $category = $this->categoryService->get("report/{$category}")->first();
        $menu = $this->menuService->get($root, $category->slug);
        $parent = $menu->parent()->first();
        $sidebar = $this->menuService->get($root, $parent->slug);
        $title = $sidebar->hasTag('has-sidebar') ? $parent->present()->name : $menu->present()->name;
        $posts = $this->postService->get($category->path);

        return view('web.report.index', compact('root', 'menu', 'category', 'posts', 'title', 'sidebar'));
    }

    public function management($root, $category)
    {

        $category = $this->categoryService->get("management/{$category}")->first();
        $menu = $this->menuService->get($root, $category->slug);
        $parent = $menu->parent()->first();
        $sidebar = $this->menuService->get($root, $parent->slug);
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
        $title = $menu->present()->name;

        return view('web.management.detail', compact('root', 'menu', 'category', 'post', 'title'));

    }

    //news update
    public function update(Request $request, $root, $category)
    {

        $category = $this->categoryService->get("update/{$category}")->first();
        $menu = $this->menuService->get($root, $category->slug);
        $parent = $menu->parent()->first();
        $sidebar = $this->menuService->get($root, $parent->slug);
        $title = $sidebar->hasTag('has-sidebar') ? $parent->present()->name : $menu->present()->name;

        $years = $this->postService->getYears(null, $category->path);
        $year = $request->year ?? get_first_array($years, true);

        $posts = $this->postService->queryByYear(null, $year, $category->path);

        return view('web.update.index', compact('root', 'menu', 'title', 'sidebar', 'category', 'years', 'year', 'posts'));

    }

    public function showUpdate($root, $category, $id, $title = null)
    {
        $post = $this->postService->find($id);

        $action = action('Web\WebController@showUpdate', ['root'=> $root, 'category' => $category, 'id' => $id, 'title' => $post->present()->title(true)]);
        $back = action('Web\WebController@update', ['root'=> $root, 'category' => $category]);

        if ($post->present()->title(true) !== $title) {
            return redirect($action);
        }

        $category = $this->categoryService->get("update/{$category}")->first();
        $gallery = $post->galleries()->first();

        $menu = $this->menuService->get($root, $category->slug);
        $title = $menu->present()->name;

        return view('web.update.detail', compact('root', 'menu', 'title', 'sidebar', 'category', 'post', 'gallery', 'action', 'back'));
    }


    //download
    public function irDownload(Request $request, $page2, $slug)
    {

        $posts = $this->apiService->getDownloads($slug);
        $view = $this->apiService->getDownloadView($slug);

        $menu = $this->menuService->get('investor-relations', $slug);
        $parent = $menu->parent()->first();
        $sidebar = $this->menuService->get('investor-relations', $parent->slug);
        $title = $menu->present()->name;

        $years = $this->apiService->getYears($posts, 'en');
        $year = $request->year ?? $years->first();
        $years = locale_years_mapping($years);

        $latest = $posts->first();

        if($menu->slug != 'form-56-1')
            $posts =  $this->apiService->queryByYear($year, $posts);

        return view("web.download.{$view}", compact('menu', 'title', 'sidebar', 'posts', 'years', 'year', 'latest'));
    }

    //report
    public function irReport($page2, $slug)
    {

        $posts = $this->apiService->getDownloads($slug);

        $menu = $this->menuService->get('investor-relations', $slug);
        $parent = $menu->parent()->first();
        $sidebar = $this->menuService->get('investor-relations', $parent->slug);
        $title = $menu->present()->name;

        return view('web.report.index', compact('menu', 'sidebar', 'title', 'posts'));
    }

    //presentation
    public function presentation(Request $request)
    {

        $webcasts = $this->apiService->getDownloads('webcast');
        $presentations = $this->apiService->getDownloads('presentation');
        $posts = $this->apiService->getMatchingPosts($webcasts, $presentations);

        $menu = $this->menuService->get('investor-relations', 'webcasts-and-presentations');
        $title = $menu->present()->name;

        $years = $this->apiService->getYears($webcasts, 'en');
        $year = $request->year ?? $years->first();
        $years = locale_years_mapping($years);

        $posts =  $this->apiService->queryByYear($year, $posts);

        return view("web.download.presetation", compact('menu', 'title', 'posts', 'years', 'year'));
    }

    public function irUpdate(Request $request, $slug)
    {

        $search = $request->search;
        $menu = $this->menuService->get($slug);
        $parent = $menu->parent()->first();
        $sidebar = $this->menuService->get($parent->slug);
        $title = $sidebar->hasTag('has-sidebar') ? $parent->present()->name : $menu->present()->name;

        $posts = $search ? $this->irService->searchNews(utf8_to_html_entities($search)) : $this->apiService->getNews($slug);

        $years = $this->apiService->getYears($posts, 'en');
        $years = locale_years_mapping($years);

        $year = $request->year ?? null;

        $posts =  $this->apiService->queryByYear($year, $posts);

        $posts =  paginate($posts);

        return view('web.update.ir', compact('root', 'menu', 'slug', 'posts', 'year', 'years', 'search', 'title', 'sidebar'));
    }


    public function showIrUpdate($slug, $id, $title = null)
    {

        $post = $this->irService->getNewsDetail($id);

        $action = action('Web\WebController@showIrUpdate', ['slug' => $slug, 'id' => $id, 'title' => $post->present()->title(true)]);
        $back = action('Web\WebController@irUpdate', ['slug'=>$slug]);

        if ($post->present()->title(true) !== $title) {
            return redirect($action);
        }

        $root = 'investor-relations';
        $menu = $this->menuService->get($root, $slug);
        $title = $menu->present()->name;

        return view('web.update.detail', compact('root', 'menu', 'title', 'post', 'action', 'back'));
    }
}
