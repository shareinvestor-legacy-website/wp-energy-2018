@extends('layouts.app')


@section('content')

    <div class="content-heading">

        Tool

        @include('component.breadcrumb', ['items' => ['Tool', 'Update URLs']])

    </div>
    @include('component.flash')
    <div class="row">
        <div class="col-sm-12">
            <!-- START panel-->
            <form id="update-url" class="form" method="post" action="{{action('Admin\ToolController@updateURL')}}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="row">
                    <div class="col-sm-12">
                        @include('tool.url.panel')
                    </div>

                </div>


            </form>
            <!-- END panel-->
        </div>
    </div>

@stop









