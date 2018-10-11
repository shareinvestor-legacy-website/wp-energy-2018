@extends('layouts.app')


@section('content')

    <div class="content-heading">

        Page

        @include('component.breadcrumb', ['items' => ['Web', 'Page', 'Create New']])

    </div>
    @include('component.flash')
    <div class="row">
        <div class="col-md-12">
            <!-- START panel-->
            <form class="form" method="post"
                  action="{{current_route_matches('PageController@create') ? action('Admin\PageController@store') : action('Admin\PageController@storeTranslation', $page->id)}}">
                {!! csrf_field() !!}

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
        </div>
    </div>

@stop






