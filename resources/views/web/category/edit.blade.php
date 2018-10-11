@extends('layouts.app')


@section('content')

    <div class="content-heading">

        Category

        @include('component.breadcrumb', ['items' => ['Web', 'Category', 'Edit']])

    </div>

    @include('component.flash')

    <div class="row">
        <div class="col-sm-12">
            <!-- START panel-->
            <form class="form" method="post"
                  action="{{current_route_matches('CategoryController@edit') ? action('Admin\CategoryController@update', $category->id) : action('Admin\CategoryController@updateTranslation', ['id'=> $category->id, 'locale' =>$locale])}}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}


                <div class="row">
                    @include('web.category.panel.general')

                    @include('web.category.panel.publish')


                    @include('web.category.panel.slug')


                    @include('web.category.panel.image')

                </div>

            </form>
            <!-- END panel-->
        </div>
    </div>


    @if (current_route_matches('CategoryController@editTranslation'))

        <form method="post" class="form-delete"
              action="{{action('Admin\CategoryController@destroyTranslation', ['id' => $category->id, 'locale' => $locale])}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}


            @include('component.sweetalert-delete', ['button' => '.btn-delete', 'form' => '.form-delete', 'text' => 'This item will be permanently deleted'])
        </form>


    @endif

@stop









