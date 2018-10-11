<?php

namespace BlazeCMS\Http\Admin;



use BlazeCMS\Requests\LocationRequest;
use BlazeCMS\Requests\Translations\LocationTranslationRequest;
use BlazeCMS\Services\LocationService;
use Illuminate\Http\Request;


class LocationController extends AdminController
{

    private $locationService;


    public function __construct(LocationService $locationService)
    {

        $this->locationService = $locationService;
    }


    public function index(Request $request)
    {

        $name = $request->name;

        $locations = $this->locationService->query($request);
       // dd($locations);

        return view('jobboard.location.index', compact('name', 'locations'));
    }


    public function create()
    {
        $locales = locales();
        $locale = fallback_locale();

        return view('jobboard.location.create', compact('locales', 'locale'));
    }


    public function store(LocationRequest $request)
    {
        $location = $this->locationService->store($request);
        flash_success('The items has been successfully created');

        return redirect()->action('Admin\LocationController@index');

    }


    public function edit($id)
    {


        $location = $this->locationService->find($id);
        $locales = locales();
        $locale = fallback_locale();

        return view('jobboard.location.edit', compact('location', 'locales', 'locale'));
    }


    public function update(LocationRequest $request, $id)
    {
        $location = $this->locationService->update($request, $id);
        flash_success('The items has been successfully updated');

        return back();
    }


    public function destroy($id)
    {

        $this->locationService->destroy($id);

        flash_success('The item has successfully deleted');

        return redirect()->action('Admin\LocationController@index');
    }


    public function createTranslation($id)
    {

        $location = $this->locationService->find($id);
        $locales = $location->untranslatedLocales();
        $locale = key($locales);

        return view('jobboard.location.create', compact('location', 'locales', 'locale'));
    }


    public function storeTranslation(LocationTranslationRequest $request, $id)
    {

        $location = $this->locationService->storeTranslation($request, $id, $request->input('locale'));
        flash_success('The items has been successfully created');
        return redirect()->action('Admin\LocationController@index');
    }


    public function editTranslation($id, $locale)
    {
        $location = $this->locationService->find($id);
        $locales = locales();

        return view('jobboard.location.edit', compact('location', 'locales', 'locale'));
    }


    public function updateTranslation(LocationTranslationRequest $request, $id, $locale)
    {
        $location = $this->locationService->updateTranslation($request, $id, $locale);
        flash_success('The items has been successfully updated');

        return back();
    }


    public function destroyTranslation($id, $locale)
    {

        $this->locationService->destroyTranslation($id, $locale);

        flash_success('The item has been successfully deleted');

        return redirect()->action('Admin\LocationController@index');
    }
}
