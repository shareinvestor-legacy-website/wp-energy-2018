@extends('layouts.app')


@section('content')

    <div class="content-heading">

        Location


        @include('component.breadcrumb', ['items' => ['Jobboard', 'Location', 'All Locations']])
    </div>

    @include('component.flash')

    <div class="row">
        <div class="col-sm-12">
            <!-- START panel-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">

                            <form method="get" action="{{action('Admin\LocationController@index')}}" class="form-inline">

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
                                <th><strong>Translations</strong></th>
                                <th><strong>Actions</strong></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($locations as $location)
                                <tr class="">

                                    <td class="col-md-8 col-xs-7">{{$location->{"name:".fallback_locale()} }}</td>

                                    <td class="col-md-1 col-xs-1">
                                        <div class="btn-group">

                                            @foreach(locales_except_fallback() as $code => $properties)
                                                @if ($location->hasTranslation($code))
                                                    <a href="{{action('Admin\LocationController@editTranslation', ['id'=>$location->id, 'locale' => $code])}}"
                                                       class="btn btn-default btn-xs btn-flag"
                                                       title="{{$properties['name']}}">
                                                        <span class="flag-icon flag-icon-{{$properties['flag']}}"></span></a>
                                                @endif
                                            @endforeach

                                            @if ($location->hasUntranslatedLocale())
                                                <a type="button" class="btn btn-default btn-xs btn-flag" href="{{action('Admin\LocationController@createTranslation',$location->id)}}">
                                                    <span class="glyphicon glyphicon-plus"></span></a>
                                            @endif

                                        </div>
                                    </td>
                                    <td class="col-md-1 col-xs-2">
                                        <div class="btn-group">
                                            <a href="{{action('Admin\LocationController@edit',$location->id)}}"
                                               class="btn btn-default btn-xs" title="Edit"><span
                                                        class="fa fa-edit"></span></a>
                                            <form action="{{action('Admin\LocationController@destroy',$location->id)}}"
                                                  class="inline form-delete-{{$location->id}}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit"
                                                        class="btn btn-danger btn-xs btn-delete-{{$location->id}}"
                                                        title="Delete"><span
                                                            class="icon-trash"></span>
                                                </button>

                                                @include('component.sweetalert-delete', ['button' => '.btn-delete-'.$location->id, 'form' => '.form-delete-'.$location->id, 'text' => 'This item <span style="color:red;">'.$location->name.'</span> will be permanently deleted'])
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
                            @if ($locations->total() > 0)
                                <span>{{ $locations->firstItem()}} - {{$locations->lastItem()}}
                                    of {{$locations->total()}} record(s)</span>
                            @else
                                <span>No record found.</span>
                            @endif

                        </div>
                        <div class="col-xs-8">
                            {{--   @include('template.pagination')--}}
                            <div class="pull-right">
                                {{$locations->appends(['name'=>$name])->links()}}
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
















