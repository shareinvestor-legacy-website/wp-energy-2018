<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 7/15/2016
 * Time: 10:01 AM
 */

namespace BlazeCMS\Services;


use BlazeCMS\Models\Department;
use Illuminate\Http\Request;



class DepartmentService implements ServiceInterface, TranslationServiceInterface
{


    private function setCommonFields(Department $department, Request $request)
    {
        //$department->name = $request->name;
    }


    private function setTranslatableFields(Department $department, Request $request, $locale)
    {
        $department->translateOrNew($locale)->name = $request->name;
        $department->translateOrNew($locale)->remark = $request->remark;
    }


    public function all()
    {
        $departments = Department::withTranslation(fallback_locale());
        $departments->orderBy('name');
        return $departments->get();
    }


    public function find($id)
    {

        return Department::findOrFail($id);

    }


    public function query(Request $request)
    {



       $departments = Department::withTranslation(fallback_locale());

        if ($request->filled('name'))
            $departments->whereTranslationLike('name', "%$request->name%", fallback_locale());


        $departments->orderBy('name');


        return $departments->paginate(setting('admin.paginate.jobboard.department.perPage'));
    }


    public function store(Request $request)
    {

        $department = new Department();

        $this->setCommonFields($department, $request);
        $this->setTranslatableFields($department, $request, fallback_locale());

        $department->save();

    }

    public function storeTranslation(Request $request, $id, $locale)
    {
        $department = Department::findOrFail($id);

        $this->setTranslatableFields($department, $request, $locale);

        $department->save();

    }


    public function update(Request $request, $id)
    {

        $department = Department::findOrFail($id);
        $this->setCommonFields($department, $request);
        $this->setTranslatableFields($department, $request, fallback_locale());

        $department->save();

    }

    public function updateTranslation(Request $request, $id, $locale)
    {
        $department = Department::findOrFail($id);

        $this->setTranslatableFields($department, $request, $locale);

        $department->save();

    }


    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();
    }


    public function destroyTranslation($id, $locale)
    {
        $department = Department::findOrFail($id);
        $department->translate($locale)->delete();
    }


}