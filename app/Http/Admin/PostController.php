<?php

namespace BlazeCMS\Http\Admin;


use BlazeCMS\Requests\PostRequest;
use BlazeCMS\Requests\Translations\PostTranslationRequest;
use BlazeCMS\Services\CategoryService;
use BlazeCMS\Services\GalleryService;
use BlazeCMS\Services\PostService;
use BlazeCMS\Services\TagService;
use Illuminate\Http\Request;


class PostController extends AdminController
{

    private $postService;
    private $tagService;
    private $categoryService;
    private $galleryService;


    public function __construct(PostService $postService,
                                TagService $tagService,
                                CategoryService $categoryService,
                                GalleryService $galleryService)
    {

        $this->postService = $postService;
        $this->tagService = $tagService;
        $this->categoryService = $categoryService;
        $this->galleryService = $galleryService;
    }


    public function index(Request $request)
    {
        $title = $request->title;
        $tags = $request->tags;
        $categories = $request->categories;
        $status = $request->status;
        $extra_attributes = $request->extra_attributes;

        $posts = $this->postService->query($request);
        $allTags = $this->tagService->all();
        $allCategories = $this->categoryService->all();


        return view('web.post.index', compact('posts', 'title', 'status', 'extra_attributes','tags', 'allTags', 'categories', 'allCategories'));

    }


    public function create()
    {


        $locales = locales();
        $locale = fallback_locale();
        $allTags = $this->tagService->all();
        $categories = $this->categoryService->all();
        $category_ids = [];

        $galleries = $this->galleryService->all();
        $gallery_ids = [];


        return view('web.post.create', compact('locales', 'locale', 'allTags', 'categories', 'category_ids', 'galleries','gallery_ids'));
    }


    public function store(PostRequest $request)
    {
        $post = $this->postService->store($request);
        flash_success('The items has been successfully created');

        return redirect()->action('Admin\PostController@index');

    }


    public function edit($id)
    {
        $post = $this->postService->find($id);

     //   dd($post->period_from);

        $locales = locales();
        $locale = fallback_locale();
        $allTags = $this->tagService->all();
        $categories = $this->categoryService->all();
        $category_ids = $post->categories->pluck('id')->all();


        $galleries = $this->galleryService->all();
        $gallery_ids =  $post->galleries->pluck('id')->all();


        return view('web.post.edit', compact('post', 'locales', 'locale', 'allTags', 'categories', 'category_ids', 'galleries','gallery_ids'));
    }


    public function update(PostRequest $request, $id)
    {
        $post = $this->postService->update($request, $id);
        flash_success('The items has been successfully updated');

        return back();
    }


    public function destroy($id)
    {

        $this->postService->destroy($id);

        flash_success('The item has been successfully deleted');

        return redirect()->action('Admin\PostController@index');
    }


    public function createTranslation($id)
    {

        $post = $this->postService->find($id);
        $locales = $post->untranslatedLocales();
        $locale = key($locales);
        $allTags = $this->tagService->getAllTags(Post::class);
        $categories = $this->categoryService->all();
        $category_ids = $post->categories->pluck('id')->all();

        $galleries = $this->galleryService->all();
        $gallery_ids =  $post->galleries->pluck('id')->all();

        return view('web.post.create', compact('post', 'locales', 'locale', 'allTags', 'categories', 'category_ids', 'galleries','gallery_ids'));
    }


    public function storeTranslation(PostTranslationRequest $request, $id)
    {

        $post = $this->postService->storeTranslation($request, $id, $request->input('locale'));
        flash_success('The items has been successfully created');
        return redirect()->action('Admin\PostController@index');
    }


    public function editTranslation($id, $locale)
    {
        $post = $this->postService->find($id);
        $locales = locales();
        $allTags = $this->tagService->getAllTags(Post::class);
        $categories = $this->categoryService->all();
        $category_ids = $post->categories->pluck('id')->all();

        $galleries = $this->galleryService->all();
        $gallery_ids =  $post->galleries->pluck('id')->all();


        return view('web.post.edit', compact('text', 'locales', 'locale', 'post', 'allTags', 'categories', 'category_ids', 'galleries','gallery_ids'));
    }


    public function updateTranslation(PostTranslationRequest $request, $id, $locale)
    {
        $post = $this->postService->updateTranslation($request, $id, $locale);
        flash_success('The items has been successfully updated');

        return back();
    }


    public function destroyTranslation($id, $locale)
    {

        $this->postService->destroyTranslation($id, $locale);

        flash_success('The item has been successfully deleted');

        return redirect()->action('Admin\PostController@index');
    }



    public function ordering(Request $request)
    {

        $category_id = $request->category_id;


        $posts = $this->postService->findByCategoryID($category_id);



        $count  = isset($posts) ? $posts->count() : 0;


        $allCategories = $this->categoryService->all();




        return view('web.post.ordering', compact('posts', 'count', 'allCategories', 'category_id'));

    }



    public function updateOrdering(Request $request)
    {

        $this->postService->ordering($request);

        flash_success('The post order has been successfully updated');

        return back();

    }


}
