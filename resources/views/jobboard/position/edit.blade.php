@extends('layouts.app')




@section('content')

    <div class="content-heading">

        Position

        @include('component.breadcrumb', ['items' => ['Jobboard', 'Position', 'Edit']])

    </div>

    @include('component.flash')

    <div class="row">
        <div class="col-sm-12">
            <!-- START panel-->
            <form method="post"
                  action="{{current_route_matches('PositionController@edit') ? action('Admin\PositionController@update', $position->id) : action('Admin\PositionController@updateTranslation', ['id'=> $position->id, 'locale' =>$locale])}}"
                  class="form">
                {!! csrf_field() !!}
                {{ method_field('PATCH') }}
                <div class="row">

                    @include('jobboard.position.panel.general')
                    @include('jobboard.position.panel.publish')
                    @include('jobboard.position.panel.url')


                </div>

            </form>
            <!-- END panel-->
        </div>
    </div>


    @if (current_route_matches('PositionController@editTranslation'))

        <form method="post" class="form-delete"
              action="{{action('Admin\PositionController@destroyTranslation', ['id' => $position->id, 'locale' => $locale])}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}


            @include('component.sweetalert-delete', ['button' => '.btn-delete', 'form' => '.form-delete', 'text' => 'This item will be permanently deleted'])
        </form>


    @endif


@stop




