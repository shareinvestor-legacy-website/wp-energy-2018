<?php

namespace BlazeCMS\Http\Admin;


use BlazeCMS\Requests\GalleryRequest;
use BlazeCMS\Requests\Translations\GalleryTranslationRequest;
use BlazeCMS\Services\GalleryService;
use BlazeCMS\Services\TagService;
use Illuminate\Http\Request;


class GalleryController extends AdminController
{

    private $galleryService;
    private $tagService;


    public function __construct(GalleryService $galleryService, TagService $tagService)
    {

        $this->galleryService = $galleryService;
        $this->tagService = $tagService;
    }



    public function index(Request $request)
    {

        $name = $request->name;
        $tags = $request->tags;
        $status = $request->status;

        $galleries  = $this->galleryService->query($request);
        $allTags = $this->tagService->all();


        return view('web.gallery.index', compact('name', 'galleries', 'tags','allTags', 'status'));
    }


    public function create()
    {
        $locales = locales();
        $locale = fallback_locale();

        $allTags = $this->tagService->all();

        $images = [];

        return view('web.gallery.create', compact('locales', 'locale', 'allTags', 'images'));
    }


    public function store(GalleryRequest $request)
    {
        $gallery = $this->galleryService->store($request);
        flash_success('The items has been successfully created');

        return redirect()->action('Admin\GalleryController@index');

    }

    public function edit($id)
    {

        $gallery = $this->galleryService->find($id);
        $locales = locales();
        $locale = fallback_locale();

        $allTags = $this->tagService->all();

        $images = $gallery->images()->orderBy('order')->get();

        return view('web.gallery.edit', compact('gallery', 'locales', 'locale', 'allTags', 'images'));
    }


    public function update(GalleryRequest $request, $id)
    {
        $gallery = $this->galleryService->update($request, $id);
        flash_success('The items has been successfully updated');

        return back();
    }



    public function destroy($id)
    {

        $this->galleryService->destroy($id);

        flash_success('The item has successfully deleted');

        return redirect()->action('Admin\GalleryController@index');
    }



    public function createTranslation($id) {

        $gallery = $this->galleryService->find($id);
        $locales = $gallery->untranslatedLocales();
        $locale = key($locales);
        $allTags = $this->tagService->all();

        $images = $gallery->images()->orderBy('order')->get();

        return view('web.gallery.create', compact('gallery', 'locales', 'locale', 'allTags', 'images'));
    }



    public function storeTranslation(GalleryTranslationRequest $request, $id) {

        $gallery = $this->galleryService->storeTranslation($request, $id, $request->input('locale'));
        flash_success('The items has been successfully created');
        return redirect()->action('Admin\GalleryController@index');
    }


    public function editTranslation($id, $locale) {
        $gallery = $this->galleryService->find($id);
        $locales = locales();

        $allTags = $this->tagService->all();

        $images = $gallery->images()->orderBy('order')->get();


        return view('web.gallery.edit', compact('gallery', 'locales', 'locale', 'allTags', 'images'));
    }


    public function updateTranslation(GalleryTranslationRequest $request, $id,  $locale) {
        $gallery = $this->galleryService->updateTranslation($request, $id, $locale);
        flash_success('The items has been successfully updated');

        return back();
    }


    public function destroyTranslation($id, $locale) {

        $this->galleryService->destroyTranslation($id, $locale);

        flash_success('The item has been successfully deleted');

        return redirect()->action('Admin\GalleryController@index');
    }
}
