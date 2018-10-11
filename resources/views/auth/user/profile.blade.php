@extends('layouts.app')




@section('content')

    <div class="content-heading">

        Profile

        @include('component.breadcrumb', ['items' => ['User', 'Profile', 'Edit']])

    </div>

    @include('component.flash')

    <div class="row">
        <div class="col-sm-12">
            <!-- START panel-->
            <form method="post"
                  action="{{action('Admin\UserController@updateProfile')}}"
                  class="form">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <input name="id" type="hidden" value="{{Auth::user()->id}}">
                <div class="row">

                    @include('auth.user.panel.general')
                    @include('auth.user.panel.status')


                </div>


            </form>
            <!-- END panel-->
        </div>
    </div>



@stop




