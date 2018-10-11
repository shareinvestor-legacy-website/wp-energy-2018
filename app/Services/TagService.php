<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 7/28/2016
 * Time: 21:35
 */

namespace BlazeCMS\Services;



use Cviebrock\EloquentTaggable\Models\Tag;
use Illuminate\Http\Request;


class TagService extends  \Cviebrock\EloquentTaggable\Services\TagService
{


    public function all()
    {
        return Tag::all()->sortBy('normalized');
    }

    public function findByID($id) {
        return Tag::findOrFail($id);
    }




    public function query(Request $request)
    {
        $tags = Tag::query();


        if ($request->filled('name'))
            $tags->where('name', 'like', "%{$request->name}%");


        $tags->orderBy('name');


        return $tags->paginate(setting('admin.paginate.tax.perPage'));
    }

    public function store(Request $request)
    {
        if ($request->filled('name'))
            $this->findOrCreate($request->name);
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->name = $request->name;
        $tag->save();
    }

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);

        $tag->delete();
    }


}