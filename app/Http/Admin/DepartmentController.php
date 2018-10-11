<?php

namespace BlazeCMS\Http\Admin;


use BlazeCMS\Requests\DepartmentRequest;
use BlazeCMS\Requests\Translations\DepartmentTranslationRequest;
use BlazeCMS\Services\DepartmentService;
use Illuminate\Http\Request;


class DepartmentController extends AdminController
{

    private $departmentService;


    public function __construct(DepartmentService $departmentService)
    {

        $this->departmentService = $departmentService;
    }


    public function index(Request $request)
    {

        $name = $request->name;

        $departments = $this->departmentService->query($request);
       // dd($departments);

        return view('jobboard.department.index', compact('name', 'departments'));
    }


    public function create()
    {
        $locales = locales();
        $locale = fallback_locale();

        return view('jobboard.department.create', compact('locales', 'locale'));
    }


    public function store(DepartmentRequest $request)
    {
        $department = $this->departmentService->store($request);
        flash_success('The items has been successfully created');

        return redirect()->action('Admin\DepartmentController@index');

    }


    public function edit($id)
    {


        $department = $this->departmentService->find($id);
        $locales = locales();
        $locale = fallback_locale();

        return view('jobboard.department.edit', compact('department', 'locales', 'locale'));
    }


    public function update(DepartmentRequest $request, $id)
    {
        $department = $this->departmentService->update($request, $id);
        flash_success('The items has been successfully updated');

        return back();
    }


    public function destroy($id)
    {

        $this->departmentService->destroy($id);

        flash_success('The item has successfully deleted');

        return redirect()->action('Admin\DepartmentController@index');
    }


    public function createTranslation($id)
    {

        $department = $this->departmentService->find($id);
        $locales = $department->untranslatedLocales();
        $locale = key($locales);

        return view('jobboard.department.create', compact('department', 'locales', 'locale'));
    }


    public function storeTranslation(DepartmentTranslationRequest $request, $id)
    {

        $department = $this->departmentService->storeTranslation($request, $id, $request->input('locale'));
        flash_success('The items has been successfully created');
        return redirect()->action('Admin\DepartmentController@index');
    }


    public function editTranslation($id, $locale)
    {
        $department = $this->departmentService->find($id);
        $locales = locales();

        return view('jobboard.department.edit', compact('department', 'locales', 'locale'));
    }


    public function updateTranslation(DepartmentTranslationRequest $request, $id, $locale)
    {
        $department = $this->departmentService->updateTranslation($request, $id, $locale);
        flash_success('The items has been successfully updated');

        return back();
    }


    public function destroyTranslation($id, $locale)
    {

        $this->departmentService->destroyTranslation($id, $locale);

        flash_success('The item has been successfully deleted');

        return redirect()->action('Admin\DepartmentController@index');
    }
}
