<?php

namespace BlazeCMS\Http\Admin;



use BlazeCMS\Requests\TagRequest;
use BlazeCMS\Services\TagService;
use Illuminate\Http\Request;


class TagController extends AdminController
{

    private $tagService;


    public function __construct(TagService $tagService)
    {

        $this->tagService = $tagService;
    }


    public function index(Request $request)
    {

        $name = $request->name;
        $tags = $this->tagService->query($request);


        return view('web.tag.index', compact('name', 'tags'));
    }


    public function create()
    {
        return view('web.tag.create');
    }


    public function store(TagRequest $request)
    {
        $text = $this->tagService->store($request);
        flash_success('The items has been successfully created');

        return redirect()->action('Admin\TagController@index');

    }


    public function edit($id)
    {
        $tag = $this->tagService->findByID($id);


        return view('web.tag.edit', compact('tag'));
    }


    public function update(TagRequest $request, $id)
    {
        $text = $this->tagService->update($request, $id);
        flash_success('The items has been successfully updated');

        return back();
    }


    public function destroy($id)
    {

        $this->tagService->destroy($id);

        flash_success('The item has successfully deleted');

        return redirect()->action('Admin\TagController@index');
    }


}
