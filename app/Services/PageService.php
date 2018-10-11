<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 7/15/2016
 * Time: 10:01 AM
 */

namespace BlazeCMS\Services;


use BlazeCMS\Models\Page;
use Carbon\Carbon;
use Illuminate\Http\Request;


class PageService implements ServiceInterface, TranslationServiceInterface
{


    private function setCommonFields(Page $page, Request $request)
    {
        if ($request->filled('parent_id')) {
            $page->parent_id = $request->parent_id;
        } else {
            $page->parent_id = null;
        }

        $page->status = $request->input('status', 'private');

        if ($request->filled('slug')) {
            $page->slug = $request->input('slug');
        }

        $page->date = $request->filled('date') ? $request->date : Carbon::today(setting('general.timezone'));


        if ($request->filled('date')) {
            $page->date = $request->date;
        } else {
            $page->date = Carbon::today(setting('general.timezone'));
        }


    }

    private function setTranslatableFields(Page $page, Request $request, $locale)
    {

        $page->translateOrNew($locale)->title = $request->title;
        $page->translateOrNew($locale)->alternate_title = $request->alternate_title;
        $page->translateOrNew($locale)->image = $request->image;
        $page->translateOrNew($locale)->excerpt = $request->excerpt;
        $page->translateOrNew($locale)->body = $request->body;

        $page->translateOrNew($locale)->external_url = $request->external_url;
        $page->translateOrNew($locale)->external_url_target = $request->external_url_target;

        $page->translateOrNew($locale)->file = $request->file;
        $page->translateOrNew($locale)->custom_css = $request->custom_css;
        $page->translateOrNew($locale)->custom_js = $request->custom_js;
    }

    private function syncRelationship(Page $page, Request $request)
    {
        $page->galleries()->sync(($request->filled('gallery_ids') ? $request->gallery_ids : []));


        if ($request->filled('tags'))
            $page->retag($request->tags);
        else
            $page->detag();
    }


    public function all()
    {
        return Page::all();
    }


    public function find($id)
    {

        return Page::findOrFail($id);
    }


    public function getSelectablePages($id)
    {

        $page = Page::find($id);


        return $page->allExceptDescendantsAndSelf();
    }


    public function query(Request $request)
    {
        return Page::all();
    }


    public function getRoots()
    {
        return Page::roots()->get()->load('translations');
    }

    public function store(Request $request)
    {

        $page = new Page();

        $this->setCommonFields($page, $request);
        $this->setTranslatableFields($page, $request, fallback_locale());

        $page->save();

        $this->syncRelationship($page, $request);

        $page->populatePath();

    }

    public function storeTranslation(Request $request, $id, $locale)
    {
        $page = Page::findOrFail($id);

        $this->setTranslatableFields($page, $request, $locale);
        $page->save();

    }


    public function update(Request $request, $id)
    {

        $page = Page::findOrFail($id);
        $this->setCommonFields($page, $request);
        $this->setTranslatableFields($page, $request, fallback_locale());
        $page->save();


        $this->syncRelationship($page, $request);

        $page->populatePath();


    }

    public function updateTranslation(Request $request, $id, $locale)
    {
        $page = Page::findOrFail($id);

        $this->setTranslatableFields($page, $request, $locale);

        $page->save();

    }


    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->galleries()->detach();
        $page->delete();

    }


    public function destroyTranslation($id, $locale)
    {
        $page = Page::findOrFail($id);
        $page->translate($locale)->delete();
    }


    public function ordering(Request $request)
    {

        $nestable = json_decode($request->input('nestable'));

        Page::ordering($nestable);
        Page::populatePaths();

    }


}