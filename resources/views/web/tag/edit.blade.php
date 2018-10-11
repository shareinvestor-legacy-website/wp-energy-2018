@extends('layouts.app')




@section('content')

    <div class="content-heading">

        Tag

        @include('component.breadcrumb', ['items' => ['Web', 'Tag', 'Edit']])

    </div>

    @include('component.flash')

    <div class="row">
        <div class="col-sm-12">
            <!-- START panel-->
            <form method="post"
                  action="{{action('Admin\TagController@update', $tag->tag_id)}}"
                  class="form">
                {!! csrf_field() !!}
                {{ method_field('PATCH') }}

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




