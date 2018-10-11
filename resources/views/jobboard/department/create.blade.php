@extends('layouts.app')


@section('content')

    <div class="content-heading">

        Department

        @include('component.breadcrumb', ['items' => ['Jobboard', 'Department', 'Create New']])

    </div>
    @include('component.flash')

    <div class="row">
        <div class="col-sm-12">
            <!-- START panel-->
            <form  class="form" method="post" action="{{current_route_matches('DepartmentController@create') ? action('Admin\DepartmentController@store') : action('Admin\DepartmentController@storeTranslation', $department->id)}}">
                {!! csrf_field() !!}


                <div class="row">
                    <div class="col-sm-12">
                        @include('jobboard.department.panel')

                    </div>

                </div>

            </form>
            <!-- END panel-->
        </div>
    </div>

@stop









