@extends('layouts.app')


@section('content')

    <div class="content-heading">

        Text

        @include('component.breadcrumb', ['items' => ['Web', 'Text', 'Create New']])

    </div>
    @include('component.flash')

    <div class="row">
        <div class="col-sm-12">
            <!-- START panel-->
            <form  class="form" method="post" action="{{current_route_matches('TextController@create') ? action('Admin\TextController@store') : action('Admin\TextController@storeTranslation', $text->id)}}">
                {!! csrf_field() !!}


                <div class="row">

                    <div class="col-sm-12">
                        @include('web.text.panel')

                    </div>
                </div>

            </form>
            <!-- END panel-->
        </div>
    </div>

@stop









