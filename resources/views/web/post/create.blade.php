@extends('layouts.app')


@section('content')

    <div class="content-heading">

        Post

        @include('component.breadcrumb', ['items' => ['Web', 'Post', 'Create New']])

    </div>
    @include('component.flash')
    <div class="row">
        <div class="col-md-12">
            <!-- START panel-->
            <form class="form" method="post"
                  action="{{current_route_matches('PostController@create') ? action('Admin\PostController@store') : action('Admin\PostController@storeTranslation', $post->id)}}">
                {!! csrf_field() !!}

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
        </div>
    </div>

@stop






