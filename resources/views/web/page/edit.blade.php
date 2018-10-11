@extends('layouts.app')


@section('content')

    <div class="content-heading">

        Page

        @include('component.breadcrumb', ['items' => ['Web', 'Page', 'Edit']])

    </div>

    @include('component.flash')

    <div class="row">
        <div class="col-md-12">
            <!-- START panel-->
            <form method="post"
                  action="{{current_route_matches('PageController@edit') ? action('Admin\PageController@update', $page->id) : action('Admin\PageController@updateTranslation', ['id'=> $page->id, 'locale' =>$locale])}}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}


                <div class="row">
                    @include('web.page.panel.general')
                    @include('web.page.panel.publish')
                    @include('web.page.panel.image')
                    @include('web.page.panel.tag')
                    @include('web.page.panel.file')
                    @include('web.page.panel.url')
                    @include('web.page.panel.gallery')
                    @include('web.page.panel.style')
                </div>



            </form>
            <!-- END panel-->


            @if (current_route_matches('PageController@editTranslation'))

                <form method="post" class="form-delete"
                      action="{{action('Admin\PageController@destroyTranslation', ['id' => $page->id, 'locale' => $locale])}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}


                    @include('component.sweetalert-delete', ['button' => '.btn-delete', 'form' => '.form-delete', 'text' => 'This item will be permanently deleted'])
                </form>


            @endif



        </div>
    </div>



@stop









