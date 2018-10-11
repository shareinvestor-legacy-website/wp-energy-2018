<?php

namespace BlazeCMS\Http\Admin;


use BlazeCMS\Models\Menu;
use BlazeCMS\Requests\MenuRequest;
use BlazeCMS\Requests\Translations\MenuTranslationRequest;
use BlazeCMS\Services\MenuService;
use BlazeCMS\Services\TagService;
use Illuminate\Http\Request;

class MenuController extends AdminController
{


    private $menuService;
    private $tagService;


    public function __construct(MenuService $menuService, TagService $tagService)
    {
        $this->menuService = $menuService;
        $this->tagService = $tagService;
    }


    public function index(Request $request)
    {


        $menus = $this->menuService->query($request);


        return view('web.menu.index', compact('menus'));

    }




    public function create(Request $request)
    {

        $locales = locales();
        $locale = fallback_locale();
        $selectableMenus = $this->menuService->all();
        $allTags = $this->tagService->all();
        $pages = $this->menuService->getPages();

        return view('web.menu.create', compact('locales', 'locale', 'selectableMenus', 'pages', 'allTags'));
    }


    public function store(MenuRequest $request)
    {
        $menu = $this->menuService->store($request);
        flash_success('The items has been successfully created');

        return redirect()->action('Admin\MenuController@index');

    }



    public function edit($id)
    {
        $menu = $this->menuService->find($id);

        $locales = locales();
        $locale = fallback_locale();
        $selectableMenus = $this->menuService->getSelectableMenus($id);
        $allTags = $this->tagService->all();
        $pages = $this->menuService->getPages();


        return view('web.menu.edit', compact('menu', 'locales', 'locale', 'selectableMenus', 'pages', 'allTags'));
    }


    public function update(MenuRequest $request, $id)
    {
        $menu = $this->menuService->update($request, $id);
        flash_success('The items has been successfully updated');

        return back();
    }



    public function destroy($id)
    {

        $this->menuService->destroy($id);

        flash_success('The item has been successfully deleted');

        return redirect()->action('Admin\MenuController@index');
    }



    public function createTranslation($id) {

        $menu = $this->menuService->find($id);
        $locales = $menu->untranslatedLocales();
        $locale = key($locales);
        $selectableMenus =  $menu->getAncestorsAndSelf();
        $allTags = $this->tagService->getAllTags(Menu::class);
        $pages = $this->menuService->getPages();

        return view('web.menu.create', compact('menu', 'locales', 'locale', 'selectableMenus', 'pages', 'allTags'));
    }



    public function storeTranslation(MenuTranslationRequest $request, $id) {

        $menu = $this->menuService->storeTranslation($request, $id, $request->input('locale'));
        flash_success('The items has been successfully created');
        return redirect()->action('Admin\MenuController@index');
    }


    public function editTranslation($id, $locale) {
        $menu = $this->menuService->find($id);
        $locales = locales();
        $selectableMenus =  $menu->getAncestorsAndSelf();
        $allTags = $this->tagService->getAllTags(Menu::class);
        $pages = $this->menuService->getPages();

        return view('web.menu.edit', compact('text', 'locales', 'locale', 'menu','selectableMenus', 'pages', 'allTags'));
    }


    public function updateTranslation(MenuTranslationRequest $request, $id,  $locale) {
        $menu = $this->menuService->updateTranslation($request, $id, $locale);
        flash_success('The items has been successfully updated');

        return back();
    }


    public function destroyTranslation($id, $locale) {

        $this->menuService->destroyTranslation($id, $locale);

        flash_success('The item has been successfully deleted');

        return redirect()->action('Admin\MenuController@index');
    }


    public function ordering()
    {

        $menus = $this->menuService->getRoots();
        $count  = $this->menuService->all()->count();

        return view('web.menu.ordering', compact('menus', 'count'));

    }



    public function updateOrdering(Request $request)
    {

        $this->menuService->ordering($request);

        flash_success('The menu structure has been successfully updated');

        return back();

    }
}
