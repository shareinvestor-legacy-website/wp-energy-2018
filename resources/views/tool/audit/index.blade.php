@extends('layouts.app')


@section('content')

    <div class="content-heading">

        Audit Activity


        @include('component.breadcrumb', ['items' => ['Tool', 'Audit Activity']])
    </div>

    @include('component.flash')

    <div class="row">
        <div class="col-sm-12">
            <!-- START panel-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">

                            <form method="get" action="{{action('Admin\ToolController@audit')}}" class="form-inline">

                                <div class="form-group">

                                    <div class="input-group date">
                                        <input type="text" name="from" class="form-control datepicker"
                                               placeholder="DD/MM/YYYY"
                                               value="{{$from}}">
                                        <span class="input-group-addon"><em class="fa fa-calendar"></em></span>
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="input-group date">
                                        <input type="text" name="to" class="form-control datepicker"
                                               placeholder="DD/MM/YYYY"
                                               value="{{$to}}">
                                        <span class="input-group-addon"><em class="fa fa-calendar"></em></span>
                                    </div>
                                </div>
                                <div class="form-group m-sm">

                                    <select name="event" class="form-control">
                                        <option value="">Any Event</option>
                                        <option value="created" {{$event === 'created' ? 'selected':''}}>created
                                        </option>
                                        <option value="updated" {{$event === 'updated' ? 'selected':''}}>updated
                                        </option>
                                        <option value="deleted" {{$event === 'deleted' ? 'selected':''}}>deleted
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group m-sm">

                                    <input type="text" name="user" placeholder="User" class="form-control"
                                           value="{{ $user  }}">
                                </div>

                                {{--
                                                                <div class="form-group m-sm">

                                                                    <input type="text" name="ip" placeholder="IP" class="form-control"
                                                                           value="{{ $ip  }}">
                                                                </div>--}}


                                <div class="form-group m-sm">

                                    <input type="text" name="table" placeholder="Table" class="form-control"
                                           value="{{ $table  }}">
                                </div>

                                <div class="form-group m-sm">

                                    <input type="text" name="old_value" placeholder="Old Value" class="form-control"
                                           value="{{ $old_value  }}">
                                </div>
                                <div class="form-group m-sm">

                                    <input type="text" name="new_value" placeholder="New Value" class="form-control"
                                           value="{{ $new_value  }}">
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
                                <th><strong>Timestamp</strong></th>
                                <th><strong>User</strong></th>
                                {{--   <th><strong>IP</strong></th>--}}
                                <th><strong>Event</strong></th>
                                <th><strong>Table</strong></th>
                                <th><strong>ID</strong></th>
                                <th><strong>Route</strong></th>
                                <th><strong>Changes</strong></th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($logs as $log)

                                <tr class="">
                                    <td class="col-sm-1 col-xs-1">{{intl_datetime($log->created_at, 'dd/MM/yyyy HH:mm:ss')}}</td>
                                    <td class="col-sm-1 col-xs-1">{{$log->user->username}}</td>
                                    {{--<td class="col-sm-1 col-xs-1">{{$log->ip_address}}</td>--}}
                                    <td class="col-sm-1 col-xs-1">{{$log->event}}</td>


                                    <td class="col-sm-1 col-xs-1">{{class_basename($log->auditable_type)}}</td>
                                    <td class="col-sm-1 col-xs-1">{{$log->auditable_id}}</td>
                                    <td class="col-sm-1 col-xs-1">{{$log->url}}</td>
                                    <td class="col-sm-5 col-xs-5">

                                        @if ($log->event === 'created')
                                            @foreach($log->new_values as $field => $value)
                                                @include('tool.audit.change', ['field' => $field, 'value' => $value ])
                                            @endforeach

                                        @elseif ($log->event === 'deleted')
                                            @foreach($log->old_values as $field => $value)
                                                @include('tool.audit.change', ['field' => $field, 'value' => $value ])
                                            @endforeach
                                        @elseif ($log->event === 'updated')
                                            @if (isset($log->new_values))
                                                @foreach($log->new_values as $field => $value)

                                                    @include('tool.audit.change-diff', ['old' => $log->old_values, 'new' => $log->new_values, 'field' => $field])
                                                @endforeach
                                            @endif

                                        @endif
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
                            @if ($logs->total() > 0)
                                <span>{{ $logs->firstItem()}} - {{$logs->lastItem()}}
                                    of {{$logs->total()}} record(s)</span>
                            @else
                                <span>No record found.</span>
                            @endif

                        </div>
                        <div class="col-xs-8">
                            {{--   @include('template.pagination')--}}
                            <div class="pull-right">
                                {{$logs->appends(['ip'=> $ip, 'user' => $user, 'table' => $table, 'event' => $event, 'from' => $from, 'to' =>$to])->links()}}
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


@include('tool.audit.modal')



@push('script')
    <script>
        $(function () {


            $('.datepicker').datetimepicker({
                icons: {
                    time: 'fa fa-clock-o',
                    date: 'fa fa-calendar',
                    up: 'fa fa-chevron-up',
                    down: 'fa fa-chevron-down',
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-crosshairs',
                    clear: 'fa fa-trash'
                },
                format: 'DD/MM/YYYY'
            });


        });
    </script>
@endpush















