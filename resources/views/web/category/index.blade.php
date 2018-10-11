@extends('layouts.app')


@section('content')

    <div class="content-heading">

        Category

        @include('component.breadcrumb', ['items' => ['Web', 'Category', 'All Categories']])
    </div>

    {{--@include('template.alert.success')--}}

    <div class="row">
        <div class="col-lg-12">
            <!-- START panel-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">

                        <div class="col-md-3 col-md-offset-9">
                            <div class="btn-group m-sm pull-right">
                                <button type="button" class="btn btn-sm btn-default btn-collapse">Collapse All</button>
                                <button type="button" class="btn btn-sm btn-default btn-expand">Expand All</button>
                            </div>

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
                                <th><strong>Status</strong></th>
                                <th><strong>Translations</strong></th>
                                <th><strong>Actions</strong></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach( $categories as $category)
                                <tr class="treegrid-{{$category->id}} {{$category->isRoot()? '':' treegrid-parent-'.$category->parent_id}}">
                                    <td class="col-md-9 col-xs-8" title="{{$category->path('slug')}}">{{ $category->{'name:'.fallback_locale()} }}</td>
                                    <td class="col-md-1 col-xs-1">


                                        @if ($category->status == 'public')
                                            <span class="label label-success ">public</span>
                                        @else
                                            <span class="label label-default bg-gray-light">private</span>
                                        @endif

                                    </td>
                                    <td class="col-md-1 col-xs-1">
                                        <div class="btn-group">

                                            @foreach(locales_except_fallback() as $code => $properties)
                                                @if ($category->hasTranslation($code))
                                                    <a href="{{action('Admin\CategoryController@editTranslation', ['id'=>$category->id, 'locale' => $code])}}"
                                                       class="btn btn-default btn-xs btn-flag"
                                                       title="{{$properties['name']}}">
                                                        <span class="flag-icon flag-icon-{{$properties['flag']}}"></span></a>
                                                @endif
                                            @endforeach

                                            @if ($category->hasUntranslatedLocale())
                                                <a type="button" class="btn btn-default btn-xs btn-flag"
                                                   href="{{action('Admin\CategoryController@createTranslation',$category->id)}}">
                                                    <span class="glyphicon glyphicon-plus"></span></a>
                                            @endif

                                        </div>
                                    </td>
                                    <td class="col-md-1 col-xs-2">
                                        <div class="btn-group">
                                            <a href="{{action('Admin\CategoryController@edit',$category->id)}}"
                                               class="btn btn-default btn-xs" title="Edit"><span
                                                        class="fa fa-edit"></span></a>
                                            <form action="{{action('Admin\CategoryController@destroy',$category->id)}}"
                                                  class="inline form-delete-{{$category->id}}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit"
                                                        class="btn btn-danger btn-xs btn-delete-{{$category->id}}"
                                                        title="Delete"><span
                                                            class="icon-trash"></span>
                                                </button>

                                                @include('component.sweetalert-delete', ['button' => '.btn-delete-'.$category->id, 'form' => '.form-delete-'.$category->id, 'text' => 'This item <span style="color:red;">'.$category->name.'</span> will be permanently deleted'])
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
                            <span>{{$categories->count()}} record(s)</span>
                        </div>

                    </div>
                </div>
            </div>
            <!-- END panel-->
        </div>
    </div>

@stop


@include('component.sweetalert-delete', ['selector' => '.btn-delete'])


@push('script')
<script>
    $(function () {
        //index
        $('.tree').treegrid({
            //expanded or collapsed
            initialState: 'expanded'
        });

        $('.btn-collapse').click(function () {
            $('.tree').treegrid('collapseAll');
            return false;
        });
        $('.btn-expand').click(function () {
            $('.tree').treegrid('expandAll');
            return false;
        });

    });
</script>
@endpush








