<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 7/15/2016
 * Time: 10:01 AM
 */

namespace BlazeCMS\Services;


use BlazeCMS\Models\Category;
use BlazeCMS\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;


class PostService implements ServiceInterface, TranslationServiceInterface
{


    private function setCommonFields(Post $post, Request $request)
    {


        $post->status = $request->input('status', 'private');

        if ($request->filled('date')) {
            $post->date = $request->date;
        } else {
            $post->date = Carbon::today(setting('general.timezone'));
        }

        $post->sticky = $request->filled('sticky') ? true : false;

        if ($request->filled('period_from') && $request->filled('period_to')) {
            $post->period_from = $request->period_from;
            $post->period_to = $request->period_to;
        } else {
            $post->period_from = null;
            $post->period_to = null;
        }

        if ($request->filled('slug')) {
            $post->slug = $request->input('slug');
        }


    }

    private function setTranslatableFields(Post $post, Request $request, $locale)
    {

        $post->translateOrNew($locale)->title = $request->title;
        $post->translateOrNew($locale)->alternate_title = $request->alternate_title;
        $post->translateOrNew($locale)->image = $request->image;
        $post->translateOrNew($locale)->excerpt = $request->excerpt;
        $post->translateOrNew($locale)->body = $request->body;

        $post->translateOrNew($locale)->external_url = $request->external_url;
        $post->translateOrNew($locale)->external_url_target = $request->external_url_target;

        $post->translateOrNew($locale)->file = $request->file;
        $post->translateOrNew($locale)->custom_css = $request->custom_css;
        $post->translateOrNew($locale)->custom_js = $request->custom_js;
    }

    private function syncRelationship(Post $post, Request $request)
    {


        $post->categories()->sync($request->category_ids);


        $post->galleries()->sync(($request->filled('gallery_ids') ? $request->gallery_ids : []));


        if ($request->filled('tags'))
            $post->retag($request->tags);
        else
            $post->detag();
    }


    public function all()
    {
        return Post::with('translations')->get();
    }


    public function find($id)
    {

        return Post::findOrFail($id);
    }


    public function findByCategoryID($id)
    {


        if (isset($id)) {
            return Category::find($id)->posts()->with('translations')->orderBy('pivot_order')->get();
        }


        return null;
    }


    public function query(Request $request)
    {


        $posts = Post::with('translations');


        if ($request->filled('title')) {
            $posts->whereTranslationLike('title', "%$request->title%", fallback_locale());
        }
        if ($request->filled('tags')) {
            $posts->withAnyTags($request->tags);
        }
        if ($request->filled('categories')) {
            $posts->whereHas('categories', function ($query) use ($request) {
                $query->whereIn('id', $request->categories);
            });
        }
        if ($request->filled('status')) {
            $posts->where('status', $request->status);
        }

        if ($request->filled('extra_attributes')) {
            if (in_array('sticky', $request->extra_attributes)) {
                $posts->where('sticky', true);
            }
        }


        $posts->orderBy('date', 'desc');


        return $posts->paginate(setting('admin.paginate.post.perPage'));
    }


    public function store(Request $request)
    {

        $post = new Post();


        $this->setCommonFields($post, $request);
        $this->setTranslatableFields($post, $request, fallback_locale());

        $post->save();

        $this->syncRelationship($post, $request);

    }

    public function storeTranslation(Request $request, $id, $locale)
    {
        $post = Post::findOrFail($id);

        $this->setTranslatableFields($post, $request, $locale);
        $post->save();

    }


    public function update(Request $request, $id)
    {

        $post = Post::findOrFail($id);

        $this->setCommonFields($post, $request);
        $this->setTranslatableFields($post, $request, fallback_locale());

        $post->save();


        $this->syncRelationship($post, $request);


    }

    public function updateTranslation(Request $request, $id, $locale)
    {
        $post = Post::findOrFail($id);

        $this->setTranslatableFields($post, $request, $locale);

        $post->save();

    }


    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->galleries()->detach();
        $post->delete();
    }


    public function destroyTranslation($id, $locale)
    {
        $post = Post::findOrFail($id);
        $post->translate($locale)->delete();
    }


    public function ordering(Request $request)
    {
        $category = Category::find($request->category_id);
        $posts = json_decode($request->input('posts'));

        for ($i = 0; $i < count($posts); $i++) {
            $category->posts()->updateExistingPivot($posts[$i]->id, ['order' => $i]);
        }

    }


}