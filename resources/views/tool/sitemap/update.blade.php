@extends('layouts.app')




@section('content')

    <div class="content-heading">

        Sitemap

        @include('component.breadcrumb', ['items' => ['Tool', 'Sitemap']])

    </div>

    @include('component.flash')

    <div class="row">
        <div class="col-sm-12">
            <!-- START panel-->
            <form method="post"
                  action="{{action('Admin\ToolController@sitemap')}}"
                  class="form">
                {!! csrf_field() !!}
                {{ method_field('PATCH') }}

                <div class="row">
                    <div class="col-sm-12">
                        @include('tool.sitemap.panel')
                    </div>
                </div>


            </form>
            <!-- END panel-->
        </div>
    </div>



@stop




