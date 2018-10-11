@extends('layouts.app')


@section('content')

    <div class="content-heading">

        Category


        @include('template.breadcrumb', ['items' => ['Home', 'Category', 'List']])
    </div>

    @include('template.alert.success')

    <div class="row">
        <div class="col-lg-12">
            <!-- START panel-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-9">
                            @include('template.table-filter')
                        </div>
                        <div class="col-md-3">
                            @include('template.table-collapse')
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <!-- START table-responsive-->
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover tree">
                            <thead>
                            <tr>
                                <th><strong>Category</strong></th>
                                <th><strong>Status</strong></th>
                                <th><strong>Text</strong></th>
                                <th><strong>Actions</strong></th>
                            </tr>
                            </thead>
                            <tbody>

                            @for($i = 1; $i < 10; $i++)
                                <tr class="treegrid-{{$i}}">
                                    <td class="col-md-7">Category {{$i}}</td>
                                    <td class="col-md-1">
                                        <span class="label label-success ">Public</span>
                                    </td>
                                    <td class="col-md-2">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-sm">
                                                <span class="flag-icon flag-icon-th"></span></button>
                                            <button type="button" class="btn btn-default btn-sm">
                                                <span class="flag-icon flag-icon-us"></span></button>
                                            <button type="button" class="btn btn-default btn-sm">
                                                <span class="glyphicon glyphicon-plus"></span></button>
                                        </div>
                                    </td>
                                    <td class="col-md-2">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-sm " title="Rearrange"><span
                                                        class="icon-cursor-move"></span></button>
                                            <button type="button" class="btn btn-default btn-sm" title="Edit"><span
                                                        class="fa fa-edit"></span></button>
                                            <button type="button" class="btn btn-danger btn-sm btn-delete"
                                                    title="Delete"><span
                                                        class="icon-trash"></span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endfor
                            </tbody>
                        </table>
                    </div>
                    <!-- END table-responsive-->
                </div>

                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-4">
                            <span>1 - 15 of 100 record(s)</span>
                        </div>
                        <div class="col-xs-8">
                            @include('template.pagination')
                        </div>
                    </div>
                </div>
            </div>
            <!-- END panel-->
        </div>
    </div>

@stop


@include('template.sweetalert-delete', ['selector' => '.btn-delete'])










