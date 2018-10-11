@extends('layouts.app')


@section('content')

    <div class="content-heading">

        Position


        @include('component.breadcrumb', ['items' => ['Jobboard', 'Position', 'All Positions']])
    </div>

    @include('component.flash')

    <div class="row">
        <div class="col-sm-12">
            <!-- START panel-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">

                            <form method="get" action="{{action('Admin\PositionController@index')}}" class="form-inline">

                                <div class="form-group m-sm">

                                    <select name="department_id" class="form-control">
                                        <option value="">Any Departments</option>
                                        <option value="0" {{'0' == $department_id  ? 'selected':''}}>None</option>
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}" {{$department->id == $department_id  ? 'selected':''}}>{{$department->{'name:'.fallback_locale()} }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group m-sm">

                                    <select name="location_id" class="form-control">
                                        <option value="">Any Locations</option>
                                        <option value="0" {{'0' == $location_id  ? 'selected':''}}>None</option>
                                        @foreach($locations as $location)
                                            <option value="{{$location->id}}" {{$location->id == $location_id  ? 'selected':''}}>{{$location->{'name:'.fallback_locale()} }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group m-sm">

                                    <select id="status" name="status" class="form-control">
                                        <option value="">Any Status</option>
                                        <option value="public" {{$status === 'public' ? 'selected':''}}>Public</option>
                                        <option value="private" {{$status === 'private' ? 'selected':''}}>Private
                                        </option>
                                    </select>
                                </div>


                                <div class="form-group m-sm">

                                    <input type="text" name="title" placeholder="Title" class="form-control"
                                           value="{{ $title  }}">
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
                                <th><strong>Title</strong></th>
                                <th><strong>Department</strong></th>
                                <th><strong>Location</strong></th>
                                <th><strong>Date</strong></th>
                                <th><strong>Status</strong></th>
                                <th><strong>Translations</strong></th>
                                <th><strong>Actions</strong></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($positions as $position)
                                <tr class="">

                                    <td class="col-md-6 col-xs-5">{{$position->{"title:".fallback_locale()} }}</td>

                                    <td class="col-md-1 col-xs-1">{{$position->department->{'name:'.fallback_locale()} or 'None' }}</td>
                                    <td class="col-md-1 col-xs-1">{{$position->location->{'name:'.fallback_locale()} or 'None' }}</td>
                                    <td class="col-md-1 col-xs-1">{{$position->date->format('d/m/Y')}}</td>


                                    <td class="col-md-1 col-xs-1">


                                        @if ($position->status === 'public')
                                            <span class="label label-success">public</span>
                                        @else
                                            <span class="label label-default bg-gray-light">private</span>
                                        @endif

                                    </td>

                                    <td class="col-md-1 col-xs-1">
                                        <div class="btn-group">

                                            @foreach(locales_except_fallback() as $code => $properties)
                                                @if ($position->hasTranslation($code))
                                                    <a href="{{action('Admin\PositionController@editTranslation', ['id'=>$position->id, 'locale' => $code])}}"
                                                       class="btn btn-default btn-xs btn-flag"
                                                       title="{{$properties['name']}}">
                                                        <span class="flag-icon flag-icon-{{$properties['flag']}}"></span></a>
                                                @endif
                                            @endforeach

                                            @if ($position->hasUntranslatedLocale())
                                                <a type="button" class="btn btn-default btn-xs btn-flag"
                                                   href="{{action('Admin\PositionController@createTranslation',$position->id)}}">
                                                    <span class="glyphicon glyphicon-plus"></span></a>
                                            @endif

                                        </div>
                                    </td>
                                    <td class="col-sm-1 col-xs-2">
                                        <div class="btn-group">
                                            <a href="{{action('Admin\PositionController@edit',$position->id)}}"
                                               class="btn btn-default btn-xs" title="Edit"><span
                                                        class="fa fa-edit"></span></a>
                                            <form action="{{action('Admin\PositionController@destroy',$position->id)}}"
                                                  class="inline form-delete-{{$position->id}}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit"
                                                        class="btn btn-danger btn-xs btn-delete-{{$position->id}}"
                                                        title="Delete"><span
                                                            class="icon-trash"></span>
                                                </button>

                                                @include('component.sweetalert-delete', ['button' => '.btn-delete-'.$position->id, 'form' => '.form-delete-'.$position->id, 'text' => 'This item <span style="color:red;">'.$position->name.'</span> will be permanently deleted'])
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
                            @if ($positions->total() > 0)
                                <span>{{ $positions->firstItem()}} - {{$positions->lastItem()}}
                                    of {{$positions->total()}} record(s)</span>
                            @else
                                <span>No record found.</span>
                            @endif

                        </div>
                        <div class="col-xs-8">
                            {{--   @include('template.pagination')--}}
                            <div class="pull-right">
                                {{$positions->appends(['title'=>$title])->links()}}
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
















