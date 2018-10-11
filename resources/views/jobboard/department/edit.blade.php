@extends('layouts.app')




@section('content')

    <div class="content-heading">

        Department

        @include('component.breadcrumb', ['items' => ['Jobboard', 'Department', 'Edit']])

    </div>

    @include('component.flash')

    <div class="row">
        <div class="col-sm-12">
            <!-- START panel-->
            <form method="post"
                  action="{{current_route_matches('DepartmentController@edit') ? action('Admin\DepartmentController@update', $department->id) : action('Admin\DepartmentController@updateTranslation', ['id'=> $department->id, 'locale' =>$locale])}}"
                  class="form">
                {!! csrf_field() !!}
                {{ method_field('PATCH') }}

                <div class="row">
                    <div class="col-sm-12">
                        @include('jobboard.department.panel')

                    </div>

                </div>

            </form>
            <!-- END panel-->
        </div>
    </div>


    @if (current_route_matches('DepartmentController@editTranslation'))

        <form method="post" class="form-delete"
              action="{{action('Admin\DepartmentController@destroyTranslation', ['id' => $department->id, 'locale' => $locale])}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}


            @include('component.sweetalert-delete', ['button' => '.btn-delete', 'form' => '.form-delete', 'text' => 'This item will be permanently deleted'])
        </form>


    @endif


@stop




