@extends('layouts.app')


@section('content')

    <div class="content-heading">

        Category

        @include('component.breadcrumb', ['items' => ['Web', 'Category', 'Create New']])

    </div>
    @include('component.flash')
    <div class="row">
        <div class="col-sm-12">
            <!-- START panel-->
            <form class="form" method="post"
                  action="{{current_route_matches('CategoryController@create') ? action('Admin\CategoryController@store') : action('Admin\CategoryController@storeTranslation', $category->id)}}">
                {!! csrf_field() !!}

                <div class="row">

                    @include('web.category.panel.general')

                    @include('web.category.panel.publish')

                    @include('web.category.panel.image')

                </div>
            </form>
            <!-- END panel-->
        </div>
    </div>

@stop









