<?php

namespace BlazeCMS\Http\Admin;



use BlazeCMS\Requests\PositionRequest;
use BlazeCMS\Requests\Translations\PositionTranslationRequest;
use BlazeCMS\Services\DepartmentService;
use BlazeCMS\Services\LocationService;
use BlazeCMS\Services\PositionService;
use Illuminate\Http\Request;


class PositionController extends AdminController
{

    private $positionService;
    private $departmentService;
    private $locationService;


    public function __construct(PositionService $positionService,
                                DepartmentService $departmentService,
                                LocationService $locationService)
    {

        $this->positionService = $positionService;
        $this->departmentService = $departmentService;
        $this->locationService = $locationService;
    }


    public function index(Request $request)
    {

        $title = $request->title;
        $status = $request->status;
        $department_id = $request->department_id;
        $location_id = $request->location_id;
        $departments = $this->departmentService->all();
        $locations = $this->locationService->all();
        $positions = $this->positionService->query($request);
        // dd($positions);

        return view('jobboard.position.index',
            compact(
                'title',
                'positions',
                'department_id',
                'location_id',
                'status',
                'departments',
                'locations'));
    }


    public function create()
    {
        $locales = locales();
        $locale = fallback_locale();
        $departments = $this->departmentService->all();
        $locations = $this->locationService->all();

        return view('jobboard.position.create', compact('locales', 'locale', 'departments', 'locations'));
    }


    public function store(PositionRequest $request)
    {
        $this->positionService->store($request);
        flash_success('The items has been successfully created');

        return redirect()->action('Admin\PositionController@index');

    }


    public function edit($id)
    {


        $position = $this->positionService->find($id);
        $locales = locales();
        $locale = fallback_locale();
        $departments = $this->departmentService->all();
        $locations = $this->locationService->all();

        return view('jobboard.position.edit', compact('position', 'locales', 'locale', 'departments', 'locations'));
    }


    public function update(PositionRequest $request, $id)
    {
        $position = $this->positionService->update($request, $id);
        flash_success('The items has been successfully updated');

        return back();
    }


    public function destroy($id)
    {

        $this->positionService->destroy($id);

        flash_success('The item has successfully deleted');

        return redirect()->action('Admin\PositionController@index');
    }


    public function createTranslation($id)
    {

        $position = $this->positionService->find($id);
        $locales = $position->untranslatedLocales();
        $locale = key($locales);
        $departments = $this->departmentService->all();
        $locations = $this->locationService->all();


        return view('jobboard.position.create', compact('position', 'locales', 'locale', 'departments', 'locations'));
    }


    public function storeTranslation(PositionTranslationRequest $request, $id)
    {

        $position = $this->positionService->storeTranslation($request, $id, $request->input('locale'));
        flash_success('The items has been successfully created');
        return redirect()->action('Admin\PositionController@index');
    }


    public function editTranslation($id, $locale)
    {
        $position = $this->positionService->find($id);
        $locales = locales();

        $departments = $this->departmentService->all();
        $locations = $this->locationService->all();

        return view('jobboard.position.edit', compact('position', 'locales', 'locale', 'departments', 'locations'));
    }


    public function updateTranslation(PositionTranslationRequest $request, $id, $locale)
    {
        $position = $this->positionService->updateTranslation($request, $id, $locale);
        flash_success('The items has been successfully updated');

        return back();
    }


    public function destroyTranslation($id, $locale)
    {

        $this->positionService->destroyTranslation($id, $locale);

        flash_success('The item has been successfully deleted');

        return redirect()->action('Admin\PositionController@index');
    }
}
