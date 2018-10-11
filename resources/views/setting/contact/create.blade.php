@extends('layouts.app')


@section('content')

    <div class="content-heading">

        Contact

        @include('component.breadcrumb', ['items' => ['Setting', 'Contact', 'Create New']])

    </div>
    @include('component.flash')
    <div class="row">
        <div class="col-sm-12">
            <!-- START panel-->
            <form class="form" method="post" action="{{action('Admin\ContactController@store')}}">
                {!! csrf_field() !!}

                <div class="row">
                    <div class="col-sm-12">
                        @include('setting.contact.panel')
                    </div>

                </div>


            </form>
            <!-- END panel-->
        </div>
    </div>

@stop









