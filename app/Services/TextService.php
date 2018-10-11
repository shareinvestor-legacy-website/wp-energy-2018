<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 7/15/2016
 * Time: 10:01 AM
 */

namespace BlazeCMS\Services;


use BlazeCMS\Models\Text;
use Illuminate\Http\Request;



class TextService implements ServiceInterface, TranslationServiceInterface
{


    private function setCommonFields(Text $text, Request $request)
    {
        $text->name = $request->name;
    }


    private function setTranslatableFields(Text $text, Request $request, $locale)
    {
        $text->translateOrNew($locale)->value = $request->value;
    }


    public function all()
    {
        return Text::all();
    }


    public function find($id)
    {

        return Text::findOrFail($id);

    }


    public function query(Request $request)
    {

        $texts = Text::with('translations');


        if ($request->filled('name'))
            $texts->where('name', 'like', "%{$request->name}%");

        if ($request->filled('value'))
            $texts->whereTranslationLike('value', "%$request->value%", fallback_locale());


        $texts->orderBy('name');


        return $texts->paginate(setting('admin.paginate.text.perPage'));
    }


    public function store(Request $request)
    {

        $text = new Text();

        $this->setCommonFields($text, $request);
        $this->setTranslatableFields($text, $request, fallback_locale());

        $text->save();

    }

    public function storeTranslation(Request $request, $id, $locale)
    {
        $text = Text::findOrFail($id);

        $this->setTranslatableFields($text, $request, $locale);

        $text->save();

    }


    public function update(Request $request, $id)
    {

        $text = Text::findOrFail($id);
        $this->setCommonFields($text, $request);
        $this->setTranslatableFields($text, $request, fallback_locale());

        $text->save();

    }

    public function updateTranslation(Request $request, $id, $locale)
    {
        $text = Text::findOrFail($id);

        $this->setTranslatableFields($text, $request, $locale);

        $text->save();

    }


    public function destroy($id)
    {
        $text = Text::findOrFail($id);
        $text->delete();
    }


    public function destroyTranslation($id, $locale)
    {
        $text = Text::findOrFail($id);
        $text->translate($locale)->delete();
    }


}