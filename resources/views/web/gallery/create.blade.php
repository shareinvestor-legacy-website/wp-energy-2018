@extends('layouts.app')


@section('content')

    <div class="content-heading">

        Gallery

        @include('component.breadcrumb', ['items' => ['Web', 'Gallery', 'Create New']])

    </div>
    @include('component.flash')

    <div class="row">
        <div class="col-sm-12">
            <!-- START panel-->
            <form  class="form" method="post" action="{{current_route_matches('GalleryController@create') ? action('Admin\GalleryController@store') : action('Admin\GalleryController@storeTranslation', $gallery->id)}}">
                {!! csrf_field() !!}

                <div class="row">

                    @include('web.gallery.panel.general')
                    @include('web.gallery.panel.publish')
                    @include('web.gallery.panel.tag')
                    @include('web.gallery.panel.image')


                </div>

            </form>
            <!-- END panel-->
        </div>
    </div>

@stop









