@extends('layouts.app')


@section('content')

    <div class="content-heading">

        Advance Setting


        @include('component.breadcrumb', ['items' => ['Setting', 'Advance']])
    </div>

    @include('component.flash')

    <div class="row">
        <div class="col-lg-12">
            <!-- START panel-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-8">

                            <form method="get" action="{{action('Admin\SettingController@advance')}}"
                                  class="form-inline">

                                <div class="form-group m-sm">

                                    <input type="text" name="key" placeholder="Key" class="form-control"
                                           value="{{ $key  }}">
                                </div>


                                <button type="submit" class="btn btn-default btn-expand m-sm">Filter</button>

                            </form>

                        </div>
                        <div class="col-md-4">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary btn-save">
                                    <em class="fa fa-check fa-fw"></em>Save
                                </button>
                            </div>

                        </div>

                    </div>
                </div>
                <form id="settings" method="post" action="{{action('Admin\SettingController@updateAdvance')}}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="panel-body">
                        <!-- START table-responsive-->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover tree">
                                <thead>
                                <tr>
                                    <th><strong>Key</strong></th>
                                    <th><strong>Value</strong></th>

                                </tr>
                                </thead>
                                <tbody>


                                @foreach($settings as $setting)
                                    <tr class="">
                                        <td class="col-md-2 col-xs-2">{{$setting->key}}</td>
                                        <td class="col-md-2 col-xs-2"><input type="text" name="{{$setting->key}}"
                                                                             value="{{$setting->value}}"/></td>

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
                                @if ($settings->total() > 0)
                                    <span>{{ $settings->firstItem()}} - {{$settings->lastItem()}}
                                        of {{$settings->total()}} record(s)</span>
                                @else
                                    <span>No record found.</span>
                                @endif

                            </div>
                            <div class="col-xs-8">
                                {{--   @include('template.pagination')--}}
                                <div class="pull-right">
                                    {{$settings->appends(['key'=>$key])->links()}}
                                    <div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END panel-->
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop







@push('script')
<script>
    $(function() {
        $('.btn-save').click(function() {
            $('#settings').submit();
        });
    });
</script>
@endpush








