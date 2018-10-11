@extends('layouts.app')


@section('content')

    <div class="content-heading">

        Tag


        @include('component.breadcrumb', ['items' => ['Web', 'Tag', 'All Tags']])
    </div>

    @include('component.flash')

    <div class="row">
        <div class="col-lg-12">
            <!-- START panel-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">

                            <form method="get" action="{{action('Admin\TagController@index')}}" class="form-inline">

                                <div class="form-group m-sm">

                                    <input type="text" name="name" placeholder="Name" class="form-control"
                                           value="{{ $name  }}">
                                </div>

                                <button type="submit" class="btn btn-default btn-expand m-sm">Filter</button>

                            </form>
                        </div>

                    </div>
                </div>
                <div class="panel-body">
                    <!-- START table-responsive-->
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover tree">
                            <thead>
                            <tr>
                                <th><strong>Name</strong></th>
                                <th><strong>Actions</strong></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($tags as $tag)
                                <tr class="">
                                    <td class="col-md-11 col-xs-10">{{$tag->name}}</td>

                                    <td class="col-md-1 col-xs-2">
                                        <div class="btn-group">
                                            <a href="{{action('Admin\TagController@edit',$tag->tag_id)}}"
                                               class="btn btn-default btn-xs" title="Edit"><span
                                                        class="fa fa-edit"></span></a>
                                            <form action="{{action('Admin\TagController@destroy',$tag->tag_id)}}"
                                                  class="inline form-delete-{{$tag->tag_id}}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit"
                                                        class="btn btn-danger btn-xs btn-delete-{{$tag->tag_id}}"
                                                        title="Delete"><span
                                                            class="icon-trash"></span>
                                                </button>

                                                @include('component.sweetalert-delete', ['button' => '.btn-delete-'.$tag->tag_id, 'form' => '.form-delete-'.$tag->tag_id, 'text' => 'This item <span style="color:red;">'.$tag->name.'</span> will be permanently deleted'])
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END table-responsive-->
                </div>

                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-4">
                            @if ($tags->total() > 0)
                                <span>{{ $tags->firstItem()}} - {{$tags->lastItem()}}
                                    of {{$tags->total()}} record(s)</span>
                            @else
                                <span>No record found.</span>
                            @endif

                        </div>
                        <div class="col-xs-8">
                            {{--   @include('template.pagination')--}}
                            <div class="pull-right">
                                {{$tags->appends(['name'=>$name])->links()}}
                                <div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END panel-->
                </div>
            </div>
        </div>
    </div>
@stop
















