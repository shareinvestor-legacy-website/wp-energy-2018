<?php


namespace BlazeCMS\Services;

use Illuminate\Http\Request;


interface TranslationServiceInterface
{


    public function storeTranslation(Request $request, $id,  $locale);

    public function updateTranslation(Request $request, $id, $locale);

    public function destroyTranslation($id, $locale);

}
