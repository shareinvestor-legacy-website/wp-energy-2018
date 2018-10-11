@extends('layouts.app')


@section('content')

    <div class="content-heading">

        User

        @include('component.breadcrumb', ['items' => ['Auth', 'User', 'Create New']])

    </div>
    @include('component.flash')
    <div class="row">
        <div class="col-sm-12">
            <!-- START panel-->
            <form class="form" method="post" action="{{action('Admin\UserController@store')}}">
                {!! csrf_field() !!}


                <div class="row">

                    @include('auth.user.panel.general')
                    @include('auth.user.panel.status')



                </div>


            </form>
            <!-- END panel-->
        </div>
    </div>

@stop









