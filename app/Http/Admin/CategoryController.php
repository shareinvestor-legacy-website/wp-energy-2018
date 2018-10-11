<?php

namespace BlazeCMS\Http\Admin;



use BlazeCMS\Requests\CategoryRequest;
use BlazeCMS\Requests\Translations\CategoryTranslationRequest;
use BlazeCMS\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends AdminController
{


    private $categoryService;


    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }


    public function index(Request $request)
    {


        $categories = $this->categoryService->query($request);


        return view('web.category.index', compact('categories'));

    }




    public function create(Request $request)
    {

        $locales = locales();
        $locale = fallback_locale();
        $selectableCategories = $this->categoryService->all();

        return view('web.category.create', compact('locales', 'locale', 'selectableCategories'));
    }


    public function store(CategoryRequest $request)
    {
        $category = $this->categoryService->store($request);
        flash_success('The items has been successfully created');

        return redirect()->action('Admin\CategoryController@index');

    }



    public function edit($id)
    {
        $category = $this->categoryService->find($id);

        $locales = locales();
        $locale = fallback_locale();
        $selectableCategories = $this->categoryService->getSelectableCategories($id);

        return view('web.category.edit', compact('category', 'locales', 'locale', 'selectableCategories'));
    }


    public function update(CategoryRequest $request, $id)
    {
        $category = $this->categoryService->update($request, $id);
        flash_success('The items has been successfully updated');

        return back();
    }



    public function destroy($id)
    {

        $this->categoryService->destroy($id);

        flash_success('The item has been successfully deleted');

        return redirect()->action('Admin\CategoryController@index');
    }



    public function createTranslation($id) {

        $category = $this->categoryService->find($id);
        $locales = $category->untranslatedLocales();
        $locale = key($locales);
        $selectableCategories = $this->categoryService->all();

        return view('web.category.create', compact('category', 'locales', 'locale', 'selectableCategories'));
    }



    public function storeTranslation(CategoryTranslationRequest $request, $id) {

        $category = $this->categoryService->storeTranslation($request, $id, $request->input('locale'));
        flash_success('The items has been successfully created');
        return redirect()->action('Admin\CategoryController@index');
    }


    public function editTranslation($id, $locale) {
        $category = $this->categoryService->find($id);
        $locales = locales();
        $selectableCategories = $this->categoryService->getSelectableCategories($id);

        return view('web.category.edit', compact('text', 'locales', 'locale', 'category','selectableCategories'));
    }


    public function updateTranslation(CategoryTranslationRequest $request, $id,  $locale) {
        $category = $this->categoryService->updateTranslation($request, $id, $locale);
        flash_success('The items has been successfully updated');

        return back();
    }


    public function destroyTranslation($id, $locale) {

        $this->categoryService->destroyTranslation($id, $locale);

        flash_success('The item has been successfully deleted');

        return redirect()->action('Admin\CategoryController@index');
    }


    public function ordering()
    {

        $categories = $this->categoryService->getRoots();
        $count  = $this->categoryService->all()->count();

        return view('web.category.ordering', compact('categories', 'count'));

    }



    public function updateOrdering(Request $request)
    {

        $this->categoryService->ordering($request);

        flash_success('The category structure has been successfully updated');

        return back();

    }
}
