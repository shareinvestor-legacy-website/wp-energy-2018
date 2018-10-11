@extends('layouts.app')


@section('content')

    <div class="content-heading">

        Tag

        @include('component.breadcrumb', ['items' => ['Web', 'Tag', 'Create New']])

    </div>
    @include('component.flash')
    <div class="row">
        <div class="col-sm-12">
            <!-- START panel-->
            <form class="form" method="post" action="{{action('Admin\TagController@store')}}">
                {!! csrf_field() !!}

                <div class="row">
                    <div class="col-sm-12">
                        @include('web.tag.panel')
                    </div>

                </div>


            </form>
            <!-- END panel-->
        </div>
    </div>

@stop









