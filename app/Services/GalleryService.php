<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 7/15/2016
 * Time: 10:01 AM
 */

namespace BlazeCMS\Services;


use BlazeCMS\Models\Gallery;
use BlazeCMS\Models\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;


class GalleryService implements ServiceInterface, TranslationServiceInterface
{


    private function setCommonFields(Gallery $gallery, Request $request)
    {
        $gallery->status = $request->input('status', 'private');
        $gallery->date = $request->filled('date') ? $request->date : Carbon::today(setting('general.timezone'));
    }


    private function setTranslatableFields(Gallery $gallery, Request $request, $locale)
    {
        $gallery->translateOrNew($locale)->name = $request->name;
        $gallery->translateOrNew($locale)->description = $request->description;
    }


    private function syncRelationship(Gallery $gallery, Request $request, $locale, $syncTag = true)
    {

        if ($syncTag) {
            if ($request->filled('tags'))
                $gallery->retag($request->tags);
            else
                $gallery->detag();
        }


        if ($request->filled('images')) {

            $images = $request->input('images');

            foreach ($images as $image) {

                if ($image['status'] === 'deleted') {
                    if ($image['id'] !== '') {
                        $object = Image::find($image['id']);
                        $object->delete();
                    }
                } else {
                    $object = $image['id'] !== '' ? Image::find($image['id']) : new Image();
                    $object->order = $image['order'];
                    $object->path = $image['path'];
                    $object->gallery_id = $gallery->id;
                    $object->translateOrNew($locale)->caption = $image['caption'];

                    $object->save();
                }
            }
        }
    }


    public function all()
    {
        return Gallery::all();
    }


    public function find($id)
    {

        return Gallery::findOrFail($id);

    }


    public function query(Request $request)
    {

        $galleries = Gallery::withTranslation(fallback_locale());


        if ($request->filled('name'))
            $galleries->where('name', 'like', "%{$request->name}%");


        if ($request->filled('tags')) {
            $galleries->withAnyTags($request->tags);
        }

        if ($request->filled('status')) {
            $galleries->where('status', $request->status);
        }

        $galleries->orderBy('date');


        return $galleries->paginate(setting('admin.paginate.gallery.perPage'));
    }


    public function store(Request $request)
    {

        $gallery = new Gallery();

        $this->setCommonFields($gallery, $request);
        $this->setTranslatableFields($gallery, $request, fallback_locale());

        $gallery->save();


        $this->syncRelationship($gallery, $request, fallback_locale());

    }

    public function storeTranslation(Request $request, $id, $locale)
    {
        $gallery = Gallery::findOrFail($id);

        $this->setTranslatableFields($gallery, $request, $locale);

        $gallery->save();


        $this->syncRelationship($gallery, $request, $locale, false);
    }


    public function update(Request $request, $id)
    {

        $gallery = Gallery::findOrFail($id);
        $this->setCommonFields($gallery, $request);
        $this->setTranslatableFields($gallery, $request, fallback_locale());

        $gallery->save();


        $this->syncRelationship($gallery, $request, fallback_locale());

    }

    public function updateTranslation(Request $request, $id, $locale)
    {
        $gallery = Gallery::findOrFail($id);

        $this->setTranslatableFields($gallery, $request, $locale);

        $gallery->save();

        $this->syncRelationship($gallery, $request, $locale, false);


    }


    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();
    }


    public function destroyTranslation($id, $locale)
    {
        $gallery = Gallery::findOrFail($id);
        foreach ($gallery->images as $image) {
            $image->translate($locale)->delete();
        }

        $gallery->translate($locale)->delete();
    }


}