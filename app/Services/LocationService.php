<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 7/15/2016
 * Time: 10:01 AM
 */

namespace BlazeCMS\Services;


use BlazeCMS\Models\Location;
use Illuminate\Http\Request;


class LocationService implements ServiceInterface, TranslationServiceInterface
{


    private function setCommonFields(Location $location, Request $request)
    {
        //$location->name = $request->name;
    }


    private function setTranslatableFields(Location $location, Request $request, $locale)
    {
        $location->translateOrNew($locale)->name = $request->name;
        $location->translateOrNew($locale)->address = $request->address;
        $location->translateOrNew($locale)->remark = $request->remark;
    }


    public function all()
    {
        $locations = Location::withTranslation(fallback_locale());
        $locations->orderBy('name');
        return $locations->get();
    }


    public function find($id)
    {

        return Location::findOrFail($id);

    }


    public function query(Request $request)
    {

        $locations = Location::withTranslation(fallback_locale());


        if ($request->filled('name'))
            $locations->whereTranslationLike('name', "%$request->name%", fallback_locale());


        $locations->orderBy('name');


        return $locations->paginate(setting('admin.paginate.jobboard.location.perPage'));
    }


    public function store(Request $request)
    {

        $location = new Location();

        $this->setCommonFields($location, $request);
        $this->setTranslatableFields($location, $request, fallback_locale());

        $location->save();

    }

    public function storeTranslation(Request $request, $id, $locale)
    {
        $location = Location::findOrFail($id);

        $this->setTranslatableFields($location, $request, $locale);

        $location->save();

    }


    public function update(Request $request, $id)
    {

        $location = Location::findOrFail($id);
        $this->setCommonFields($location, $request);
        $this->setTranslatableFields($location, $request, fallback_locale());

        $location->save();

    }

    public function updateTranslation(Request $request, $id, $locale)
    {
        $location = Location::findOrFail($id);

        $this->setTranslatableFields($location, $request, $locale);

        $location->save();

    }


    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();
    }


    public function destroyTranslation($id, $locale)
    {
        $location = Location::findOrFail($id);
        $location->translate($locale)->delete();
    }


}