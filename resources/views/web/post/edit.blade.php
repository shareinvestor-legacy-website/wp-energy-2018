@extends('layouts.app')


@section('content')

    <div class="content-heading">

        Post

        @include('component.breadcrumb', ['items' => ['Web', 'Post', 'Edit']])

    </div>

    @include('component.flash')

    <div class="row">
        <div class="col-md-12">
            <!-- START panel-->
            <form method="post"
                  action="{{current_route_matches('PostController@edit') ? action('Admin\PostController@update', $post->id) : action('Admin\PostController@updateTranslation', ['id'=> $post->id, 'locale' =>$locale])}}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}


                <div class="row">


                    @include('web.post.panel.general')
                    @include('web.post.panel.publish')
                    @include('web.post.panel.sticky')
                    @include('web.post.panel.image')
                    @include('web.post.panel.period')
                    @include('web.post.panel.slug')
                    @include('web.post.panel.tag')
                    @include('web.post.panel.file')
                    @include('web.post.panel.url')
                    @include('web.post.panel.gallery')
                    @include('web.post.panel.style')
                </div>



            </form>
            <!-- END panel-->


            @if (current_route_matches('PostController@editTranslation'))

                <form method="post" class="form-delete"
                      action="{{action('Admin\PostController@destroyTranslation', ['id' => $post->id, 'locale' => $locale])}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}


                    @include('component.sweetalert-delete', ['button' => '.btn-delete', 'form' => '.form-delete', 'text' => 'This item will be permanently deleted'])
                </form>


            @endif



        </div>
    </div>



@stop









