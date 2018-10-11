@extends('layouts.app')


@section('content')

    <div class="content-heading">

        Location

        @include('component.breadcrumb', ['items' => ['Jobboard', 'Location', 'Create New']])

    </div>
    @include('component.flash')

    <div class="row">
        <div class="col-sm-12">
            <!-- START panel-->
            <form  class="form" method="post" action="{{current_route_matches('LocationController@create') ? action('Admin\LocationController@store') : action('Admin\LocationController@storeTranslation', $location->id)}}">
                {!! csrf_field() !!}


                <div class="row">
                    <div class="col-sm-12">
                        @include('jobboard.location.panel')

                    </div>

                </div>

            </form>
            <!-- END panel-->
        </div>
    </div>

@stop









