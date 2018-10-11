@extends('layouts.app')


@section('content')

    <div class="content-heading">

        Position

        @include('component.breadcrumb', ['items' => ['Jobboard', 'Position', 'Create New']])

    </div>
    @include('component.flash')

    <div class="row">
        <div class="col-sm-12">
            <!-- START panel-->
            <form  class="form" method="post" action="{{current_route_matches('PositionController@create') ? action('Admin\PositionController@store') : action('Admin\PositionController@storeTranslation', $position->id)}}">
                {!! csrf_field() !!}


                <div class="row">

                    @include('jobboard.position.panel.general')
                    @include('jobboard.position.panel.publish')
                    @include('jobboard.position.panel.url')



                </div>

            </form>
            <!-- END panel-->
        </div>
    </div>

@stop









