@extends('layouts.app')


@section('content')

    <div class="content-heading">

        Role

        @include('component.breadcrumb', ['items' => ['Auth', 'Role', 'Create New']])

    </div>
    @include('component.flash')
    <div class="row">
        <div class="col-sm-12">
            <!-- START panel-->
            <form class="form" method="post" action="{{action('Admin\RoleController@store')}}">
                {!! csrf_field() !!}

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









