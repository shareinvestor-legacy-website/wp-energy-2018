<?php

namespace BlazeCMS\Http\Admin;


use BlazeCMS\Requests\TextRequest;
use BlazeCMS\Requests\Translations\TextTranslationRequest;
use BlazeCMS\Services\TextService;
use Illuminate\Http\Request;


class TextController extends AdminController
{

    private $textService;


    public function __construct(TextService $textService)
    {

        $this->textService = $textService;
    }



    public function index(Request $request)
    {

        $name = $request->name;
        $value = $request->value;

        $texts = $this->textService->query($request);


        return view('web.text.index', compact('name', 'value', 'texts'));
    }


    public function create()
    {
        $locales = locales();
        $locale = fallback_locale();

        return view('web.text.create', compact('locales', 'locale'));
    }


    public function store(TextRequest $request)
    {
        $text = $this->textService->store($request);
        flash_success('The items has been successfully created');

        return redirect()->action('Admin\TextController@index');

    }



    public function edit($id)
    {



        $text = $this->textService->find($id);
        $locales = locales();
        $locale = fallback_locale();

        return view('web.text.edit', compact('text', 'locales', 'locale'));
    }


    public function update(TextRequest $request, $id)
    {
        $text = $this->textService->update($request, $id);
        flash_success('The items has been successfully updated');

        return back();
    }



    public function destroy($id)
    {

        $this->textService->destroy($id);

        flash_success('The item has successfully deleted');

        return redirect()->action('Admin\TextController@index');
    }



    public function createTranslation($id) {

        $text = $this->textService->find($id);
        $locales = $text->untranslatedLocales();
        $locale = key($locales);

        return view('web.text.create', compact('text', 'locales', 'locale'));
    }



    public function storeTranslation(TextTranslationRequest $request, $id) {

        $text = $this->textService->storeTranslation($request, $id, $request->input('locale'));
        flash_success('The items has been successfully created');
        return redirect()->action('Admin\TextController@index');
    }


    public function editTranslation($id, $locale) {
        $text = $this->textService->find($id);
        $locales = locales();

        return view('web.text.edit', compact('text', 'locales', 'locale'));
    }


    public function updateTranslation(TextTranslationRequest $request, $id,  $locale) {
        $text = $this->textService->updateTranslation($request, $id, $locale);
        flash_success('The items has been successfully updated');

        return back();
    }


    public function destroyTranslation($id, $locale) {

        $this->textService->destroyTranslation($id, $locale);

        flash_success('The item has been successfully deleted');

        return redirect()->action('Admin\TextController@index');
    }
}
