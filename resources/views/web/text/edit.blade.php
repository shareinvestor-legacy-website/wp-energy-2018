@extends('layouts.app')




@section('content')

    <div class="content-heading">

        Text

        @include('component.breadcrumb', ['items' => ['Web', 'Text', 'Edit']])

    </div>

    @include('component.flash')

    <div class="row">
        <div class="col-sm-12">
            <!-- START panel-->
            <form method="post"
                  action="{{current_route_matches('TextController@edit') ? action('Admin\TextController@update', $text->id) : action('Admin\TextController@updateTranslation', ['id'=> $text->id, 'locale' =>$locale])}}"
                  class="form">
                {!! csrf_field() !!}
                {{ method_field('PATCH') }}

                <div class="row">
                    <div class="col-sm-12">
                        @include('web.text.panel')

                    </div>
                </div>

            </form>
            <!-- END panel-->
        </div>
    </div>


    @if (current_route_matches('TextController@editTranslation'))

        <form method="post" class="form-delete"
              action="{{action('Admin\TextController@destroyTranslation', ['id' => $text->id, 'locale' => $locale])}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}


            @include('component.sweetalert-delete', ['button' => '.btn-delete', 'form' => '.form-delete', 'text' => 'This item will be permanently deleted'])
        </form>


    @endif


@stop




