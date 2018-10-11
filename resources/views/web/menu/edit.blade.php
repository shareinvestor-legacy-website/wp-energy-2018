@extends('layouts.app')


@section('content')

    <div class="content-heading">

        Menu

        @include('component.breadcrumb', ['items' => ['Web', 'Menu', 'Edit']])

    </div>

    @include('component.flash')

    <div class="row">
        <div class="col-sm-12">
            <!-- START panel-->
            <form class="form" method="post"
                  action="{{current_route_matches('MenuController@edit') ? action('Admin\MenuController@update', $menu->id) : action('Admin\MenuController@updateTranslation', ['id'=> $menu->id, 'locale' =>$locale])}}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}


                <div class="row">
                    @include('web.menu.panel.general')

                    @include('web.menu.panel.publish')





                </div>

            </form>
            <!-- END panel-->
        </div>
    </div>


    @if (current_route_matches('MenuController@editTranslation'))

        <form method="post" class="form-delete"
              action="{{action('Admin\MenuController@destroyTranslation', ['id' => $menu->id, 'locale' => $locale])}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}


            @include('component.sweetalert-delete', ['button' => '.btn-delete', 'form' => '.form-delete', 'text' => 'This item will be permanently deleted'])
        </form>


    @endif

@stop









