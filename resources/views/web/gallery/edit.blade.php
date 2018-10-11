@extends('layouts.app')




@section('content')

    <div class="content-heading">

        Gallery

        @include('component.breadcrumb', ['items' => ['Web', 'Gallery', 'Edit']])

    </div>

    @include('component.flash')

    <div class="row">
        <div class="col-sm-12">
            <!-- START panel-->
            <form method="post"
                  action="{{current_route_matches('GalleryController@edit') ? action('Admin\GalleryController@update', $gallery->id) : action('Admin\GalleryController@updateTranslation', ['id'=> $gallery->id, 'locale' =>$locale])}}"
                  class="form">
                {!! csrf_field() !!}
                {{ method_field('PATCH') }}

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


    @if (current_route_matches('GalleryController@editTranslation'))

        <form method="post" class="form-delete"
              action="{{action('Admin\GalleryController@destroyTranslation', ['id' => $gallery->id, 'locale' => $locale])}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}


            @include('component.sweetalert-delete', ['button' => '.btn-delete', 'form' => '.form-delete', 'text' => 'This item will be permanently deleted'])
        </form>


    @endif


@stop




