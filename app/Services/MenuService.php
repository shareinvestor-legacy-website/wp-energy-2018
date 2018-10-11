<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 7/15/2016
 * Time: 10:01 AM
 */

namespace BlazeCMS\Services;

use BlazeCMS\Models\Menu;
use BlazeCMS\Models\Page;
use Illuminate\Http\Request;


class MenuService implements ServiceInterface, TranslationServiceInterface
{


    private function setCommonFields(Menu $menu, Request $request)
    {


        if ($request->filled('parent_id')) {
            $menu->parent_id = $request->parent_id;
        } else {
            $menu->parent_id = null;
        }

        if ($request->filled('page_id')) {
            $menu->page_id = $request->page_id;
        } else {
            $menu->page_id = null;
        }

        $menu->status = $request->input('status', 'private');

        if ($request->filled('slug')) {
            $menu->slug = $request->input('slug');
        }

    }


    private function setTranslatableFields(Menu $menu, Request $request, $locale)
    {
        
        $menu->translateOrNew($locale)->name = $request->name;
        $menu->translateOrNew($locale)->external_url = $request->external_url;
        $menu->translateOrNew($locale)->external_url_target = $request->external_url_target;
    }

    private function syncRelationship(Menu $menu, Request $request)
    {
        if ($request->filled('tags'))
            $menu->retag($request->tags);
        else
            $menu->detag();
    }

    public function getPages()
    {
        return Page::all();
    }


    public function all()
    {
        return Menu::with('translations')->orderBy('lft')->get();
    }


    public function find($id)
    {

        return Menu::findOrFail($id);
    }


    public function getSelectableMenus($id)
    {

        $menu = Menu::find($id);


        return $menu->allExceptDescendantsAndSelf();
    }


    public function query(Request $request)
    {
        return Menu::all();
    }


    public function getRoots()
    {
        return Menu::roots()->get()->load('translations');
    }

    public function store(Request $request)
    {

        $menu = new Menu();

        $this->setCommonFields($menu, $request);
        $this->setTranslatableFields($menu, $request, fallback_locale());
        $menu->save();

        $this->syncRelationship($menu, $request);
        $menu->populatePath();

    }

    public function storeTranslation(Request $request, $id, $locale)
    {
        $menu = Menu::findOrFail($id);

        $this->setTranslatableFields($menu, $request, $locale);
        $menu->save();

    }


    public function update(Request $request, $id)
    {

        $menu = Menu::findOrFail($id);
        $this->setCommonFields($menu, $request);
        $this->setTranslatableFields($menu, $request, fallback_locale());
        $menu->save();

        $this->syncRelationship($menu, $request);
        $menu->populatePath();


    }

    public function updateTranslation(Request $request, $id, $locale)
    {
        $menu = Menu::findOrFail($id);

        $this->setTranslatableFields($menu, $request, $locale);

        $menu->save();

    }


    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
    }


    public function destroyTranslation($id, $locale)
    {
        $menu = Menu::findOrFail($id);
        $menu->translate($locale)->delete();
    }


    public function ordering(Request $request)
    {

        $nestable = json_decode($request->input('nestable'));

        Menu::ordering($nestable);
        Menu::populatePaths();

    }


}