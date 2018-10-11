<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 7/15/2016
 * Time: 10:01 AM
 */

namespace BlazeCMS\Services;


use BlazeCMS\Models\Position;
use Carbon\Carbon;
use Illuminate\Http\Request;



class PositionService implements ServiceInterface, TranslationServiceInterface
{


    private function setCommonFields(Position $position, Request $request)
    {

        $position->department_id = $request->input('department_id', null);
        $position->location_id = $request->input('location_id', null);
        $position->status = $request->input('status', 'private');
        $position->date = $request->filled('date') ? $request->date : Carbon::today(setting('general.timezone'));
        $position->availability = $request->input('availability', 0);
    }


    private function setTranslatableFields(Position $position, Request $request, $locale)
    {
        $position->translateOrNew($locale)->title = $request->title;
        $position->translateOrNew($locale)->qualification = $request->qualification;
        $position->translateOrNew($locale)->description = $request->description;


        if ($request->filled('external_url')) {
            $position->translateOrNew($locale)->external_url = $request->external_url;
            $position->translateOrNew($locale)->external_url_target = $request->external_url_target;
        }

    }


    public function all()
    {
        return Position::all();
    }


    public function find($id)
    {

        return Position::findOrFail($id);

    }


    public function query(Request $request)
    {


        $positions = Position::query();


        if ($request->filled('title'))
            $positions->whereTranslationLike('title', "%$request->title%", fallback_locale());

        if ($request->filled('department_id')) {
            $positions->where('department_id', $request->department_id);
        }

        if ($request->filled('location_id')) {
            $positions->where('location_id', $request->location_id);
        }

        if ($request->filled('status')) {
            $positions->where('status', $request->status);
        }

        $positions->orderBy('date', 'desc');


        return $positions->paginate(setting('admin.paginate.jobboard.position.perPage'));
    }


    public function store(Request $request)
    {

        $position = new Position();

        $this->setCommonFields($position, $request);
        $this->setTranslatableFields($position, $request, fallback_locale());

        $position->save();

    }

    public function storeTranslation(Request $request, $id, $locale)
    {
        $position = Position::findOrFail($id);

        $this->setTranslatableFields($position, $request, $locale);

        $position->save();

    }


    public function update(Request $request, $id)
    {

        $position = Position::findOrFail($id);
        $this->setCommonFields($position, $request);
        $this->setTranslatableFields($position, $request, fallback_locale());

        $position->save();

    }

    public function updateTranslation(Request $request, $id, $locale)
    {
        $position = Position::findOrFail($id);

        $this->setTranslatableFields($position, $request, $locale);

        $position->save();

    }


    public function destroy($id)
    {
        $position = Position::findOrFail($id);
        $position->delete();
    }


    public function destroyTranslation($id, $locale)
    {
        $position = Position::findOrFail($id);
        $position->translate($locale)->delete();
    }


}