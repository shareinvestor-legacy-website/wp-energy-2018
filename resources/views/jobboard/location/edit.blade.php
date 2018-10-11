@extends('layouts.app')




@section('content')

    <div class="content-heading">

        Location

        @include('component.breadcrumb', ['items' => ['Jobboard', 'Location', 'Edit']])

    </div>

    @include('component.flash')

    <div class="row">
        <div class="col-sm-12">
            <!-- START panel-->
            <form method="post"
                  action="{{current_route_matches('LocationController@edit') ? action('Admin\LocationController@update', $location->id) : action('Admin\LocationController@updateTranslation', ['id'=> $location->id, 'locale' =>$locale])}}"
                  class="form">
                {!! csrf_field() !!}
                {{ method_field('PATCH') }}

                <div class="row">
                    <div class="col-sm-12">
                        @include('jobboard.location.panel')

                    </div>

                </div>

            </form>
            <!-- END panel-->
        </div>
    </div>


    @if (current_route_matches('LocationController@editTranslation'))

        <form method="post" class="form-delete"
              action="{{action('Admin\LocationController@destroyTranslation', ['id' => $location->id, 'locale' => $locale])}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}


            @include('component.sweetalert-delete', ['button' => '.btn-delete', 'form' => '.form-delete', 'text' => 'This item will be permanently deleted'])
        </form>


    @endif


@stop




