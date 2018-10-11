<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 7/15/2016
 * Time: 10:01 AM
 */

namespace BlazeCMS\Services;

use BlazeCMS\Models\Category;
use Illuminate\Http\Request;


class CategoryService implements ServiceInterface, TranslationServiceInterface
{


    private function setCommonFields(Category $category, Request $request)
    {
        if ($request->filled('parent_id')) {
            $category->parent_id = $request->parent_id;
        } else {
            $category->parent_id = null;
        }

        $category->status = $request->input('status', 'private');

        if ($request->filled('slug')) {
            $category->slug = $request->input('slug');
        }


    }


    private function setTranslatableFields(Category $category, Request $request, $locale)
    {

        $category->translateOrNew($locale)->name = $request->name;
        $category->translateOrNew($locale)->image = $request->image;
        $category->translateOrNew($locale)->excerpt = $request->excerpt;
        $category->translateOrNew($locale)->body = $request->body;
    }


    public function all()
    {
        return Category::with('translations')->orderBy('lft')->get();
    }


    public function find($id)
    {

        return Category::findOrFail($id);
    }


    public function getSelectableCategories($id) {

        $category = Category::find($id);


        return  $category->allExceptDescendantsAndSelf();
    }


    public function query(Request $request)
    {
        return Category::all();
    }


    public function getRoots()
    {
        return Category::roots()->get()->load('translations');
    }

    public function store(Request $request)
    {

        $category = new Category();

        $this->setCommonFields($category, $request);
        $this->setTranslatableFields($category, $request, fallback_locale());
        $category->save();
        $category->populatePath();

    }

    public function storeTranslation(Request $request, $id, $locale)
    {
        $category = Category::findOrFail($id);

        $this->setTranslatableFields($category, $request, $locale);
        $category->save();

    }


    public function update(Request $request, $id)
    {

        $category = Category::findOrFail($id);
        $this->setCommonFields($category, $request);
        $this->setTranslatableFields($category, $request, fallback_locale());
        $category->save();
        $category->populatePath();


    }

    public function updateTranslation(Request $request, $id, $locale)
    {
        $category = Category::findOrFail($id);

        $this->setTranslatableFields($category, $request, $locale);

        $category->save();

    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
    }


    public function destroyTranslation($id, $locale)
    {
        $category = Category::findOrFail($id);
        $category->translate($locale)->delete();
    }


    public function ordering(Request $request) {

        $nestable = json_decode($request->input('nestable'));

        Category::ordering($nestable);
        Category::populatePaths();

    }


}