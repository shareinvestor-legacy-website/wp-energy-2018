<?php

namespace BlazeCMS\Http\Admin;


use BlazeCMS\Requests\PageRequest;
use BlazeCMS\Requests\Translations\PageTranslationRequest;
use BlazeCMS\Services\GalleryService;
use BlazeCMS\Services\PageService;
use BlazeCMS\Services\TagService;
use BlazeCMS\Models\Page;

use Illuminate\Http\Request;


class PageController extends AdminController
{


    private $pageService;
    private $tagService;
    private $galleryService;


    public function __construct(PageService $pageService, TagService $tagService,
                                    GalleryService $galleryService)
    {

        $this->pageService = $pageService;
        $this->tagService = $tagService;
        $this->galleryService = $galleryService;
    }


    public function index(Request $request)
    {

        $pages = $this->pageService->query($request);


        return view('web.page.index', compact('pages'));

    }




    public function create(Request $request)
    {


        $locales = locales();
        $locale = fallback_locale();
        $selectablePages = $this->pageService->all();
        $allTags = $this->tagService->all();

        $galleries = $this->galleryService->all();
        $gallery_ids = [];


        return view('web.page.create', compact('locales', 'locale', 'selectablePages', 'allTags', 'galleries','gallery_ids'));
    }


    public function store(PageRequest $request)
    {
        $page = $this->pageService->store($request);
        flash_success('The items has been successfully created');

        return redirect()->action('Admin\PageController@index');

    }



    public function edit($id)
    {
        $page = $this->pageService->find($id);

        $locales = locales();
        $locale = fallback_locale();
        $selectablePages = $this->pageService->getSelectablePages($id);

        $allTags = $this->tagService->all();

        $galleries = $this->galleryService->all();
        $gallery_ids =  $page->galleries->pluck('id')->all();

        return view('web.page.edit', compact('page', 'locales', 'locale', 'selectablePages', 'allTags', 'galleries','gallery_ids'));
    }


    public function update(PageRequest $request, $id)
    {
        $page = $this->pageService->update($request, $id);
        flash_success('The items has been successfully updated');

        return back();
    }



    public function destroy($id)
    {

        $this->pageService->destroy($id);

        flash_success('The item has been successfully deleted');

        return redirect()->action('Admin\PageController@index');
    }



    public function createTranslation($id) {

        $page = $this->pageService->find($id);
        $locales = $page->untranslatedLocales();
        $locale = key($locales);
        $selectablePages = $this->pageService->all();
        $allTags = $this->tagService->getAllTags(Page::class);


        $galleries = $this->galleryService->all();
        $gallery_ids =  $page->galleries->pluck('id')->all();


        return view('web.page.create', compact('page', 'locales', 'locale', 'selectablePages', 'allTags', 'galleries','gallery_ids'));
    }



    public function storeTranslation(PageTranslationRequest $request, $id) {

        $page = $this->pageService->storeTranslation($request, $id, $request->input('locale'));
        flash_success('The items has been successfully created');
        return redirect()->action('Admin\PageController@index');
    }


    public function editTranslation($id, $locale) {
        $page = $this->pageService->find($id);
        $locales = locales();
        $selectablePages = $this->pageService->getSelectablePages($id);
        $allTags = $this->tagService->getAllTags(Page::class);

        $galleries = $this->galleryService->all();
        $gallery_ids =  $page->galleries->pluck('id')->all();

        return view('web.page.edit', compact('text', 'locales', 'locale', 'page','selectablePages', 'allTags', 'galleries','gallery_ids'));
    }


    public function updateTranslation(PageTranslationRequest $request, $id,  $locale) {
        $page = $this->pageService->updateTranslation($request, $id, $locale);
        flash_success('The items has been successfully updated');

        return back();
    }


    public function destroyTranslation($id, $locale) {

        $this->pageService->destroyTranslation($id, $locale);

        flash_success('The item has been successfully deleted');

        return redirect()->action('Admin\PageController@index');
    }


    public function ordering()
    {

        $pages = $this->pageService->getRoots();
        $count  = $this->pageService->all()->count();

        return view('web.page.ordering', compact('pages', 'count'));

    }



    public function updateOrdering(Request $request)
    {

        $this->pageService->ordering($request);

        flash_success('The page structure has been successfully updated');

        return back();

    }
}
