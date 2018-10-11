@extends('layouts.app')




@section('content')

    <div class="content-heading">

        Contact

        @include('component.breadcrumb', ['items' => ['Setting', 'Contact', 'Edit']])

    </div>

    @include('component.flash')

    <div class="row">
        <div class="col-sm-12">
            <!-- START panel-->
            <form method="post"
                  action="{{action('Admin\ContactController@update', $contact->id)}}"
                  class="form">
                {!! csrf_field() !!}
                {{ method_field('PATCH') }}

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




