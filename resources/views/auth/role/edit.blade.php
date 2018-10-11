@extends('layouts.app')




@section('content')

    <div class="content-heading">

        Role

        @include('component.breadcrumb', ['items' => ['Auth', 'Role', 'Edit']])

    </div>

    @include('component.flash')

    <div class="row">
        <div class="col-sm-12">
            <!-- START panel-->
            <form method="post"
                  action="{{action('Admin\RoleController@update', $role->id)}}"
                  class="form">
                {!! csrf_field() !!}
                {{ method_field('PATCH') }}

                <div class="row">
                    <div class="col-sm-12">
                        @include('auth.role.panel')
                    </div>
                </div>


            </form>
            <!-- END panel-->
        </div>
    </div>



@stop




