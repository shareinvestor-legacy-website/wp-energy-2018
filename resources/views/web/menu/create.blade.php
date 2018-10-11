@extends('layouts.app')


@section('content')

    <div class="content-heading">

        Menu

        @include('component.breadcrumb', ['items' => ['Web', 'Menu', 'Create New']])

    </div>
    @include('component.flash')
    <div class="row">
        <div class="col-sm-12">
            <!-- START panel-->
            <form class="form" method="post"
                  action="{{current_route_matches('MenuController@create') ? action('Admin\MenuController@store') : action('Admin\MenuController@storeTranslation', $menu->id)}}">
                {!! csrf_field() !!}

                <div class="row">

                    @include('web.menu.panel.general')

                    @include('web.menu.panel.publish')


                </div>
            </form>
            <!-- END panel-->
        </div>
    </div>

@stop









