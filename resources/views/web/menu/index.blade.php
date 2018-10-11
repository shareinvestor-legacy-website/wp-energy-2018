@extends('layouts.app')


@section('content')

    <div class="content-heading">

        Menu

        @include('component.breadcrumb', ['items' => ['Web', 'Menu', 'All Menus']])
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
                                <th><strong>Tag</strong></th>
                                <th><strong>Status</strong></th>
                                <th><strong>Translations</strong></th>
                                <th><strong>Actions</strong></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach( $menus as $menu)
                                <tr class="treegrid-{{$menu->id}} {{$menu->isRoot()? '':' treegrid-parent-'.$menu->parent_id}}">
                                    <td class="col-md-8 col-xs-7" title="{{$menu->url()}}">{{ $menu->{'name:'.fallback_locale()} }}</td>
                                    <td class="col-md-1 col-xs-1">

                                        @foreach($menu->tagArray as $tag)
                                            <span class="label bg-purple-light">{{$tag}}</span>
                                        @endforeach

                                    </td>

                                    <td class="col-md-1 col-xs-1">


                                        @if ($menu->status == 'public')
                                            <span class="label label-success ">public</span>
                                        @else
                                            <span class="label label-default bg-gray-light">private</span>
                                        @endif

                                    </td>
                                    <td class="col-md-1 col-xs-1">
                                        <div class="btn-group">

                                            @foreach(locales_except_fallback() as $code => $properties)
                                                @if ($menu->hasTranslation($code))
                                                    <a href="{{action('Admin\MenuController@editTranslation', ['id'=>$menu->id, 'locale' => $code])}}"
                                                       class="btn btn-default btn-xs btn-flag"
                                                       title="{{$properties['name']}}">
                                                        <span class="flag-icon flag-icon-{{$properties['flag']}}"></span></a>
                                                @endif
                                            @endforeach

                                            @if ($menu->hasUntranslatedLocale())
                                                <a type="button" class="btn btn-default btn-xs btn-flag"
                                                   href="{{action('Admin\MenuController@createTranslation',$menu->id)}}">
                                                    <span class="glyphicon glyphicon-plus"></span></a>
                                            @endif

                                        </div>
                                    </td>
                                    <td class="col-md-1 col-xs-2">
                                        <div class="btn-group">
                                            <a href="{{action('Admin\MenuController@edit',$menu->id)}}"
                                               class="btn btn-default btn-xs" title="Edit"><span
                                                        class="fa fa-edit"></span></a>
                                            <form action="{{action('Admin\MenuController@destroy',$menu->id)}}"
                                                  class="inline form-delete-{{$menu->id}}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit"
                                                        class="btn btn-danger btn-xs btn-delete-{{$menu->id}}"
                                                        title="Delete"><span
                                                            class="icon-trash"></span>
                                                </button>

                                                @include('component.sweetalert-delete', ['button' => '.btn-delete-'.$menu->id, 'form' => '.form-delete-'.$menu->id, 'text' => 'This item <span style="color:red;">'.$menu->name.'</span> will be permanently deleted'])
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
                            <span>{{$menus->count()}} record(s)</span>
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
            initialState: 'collapsed'
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








