@extends('layouts.app')


@section('content')

    <div class="content-heading">

        Gallery


        @include('component.breadcrumb', ['items' => ['Web', 'Gallery', 'All Galleries']])
    </div>

    @include('component.flash')

    <div class="row">
        <div class="col-sm-12">
            <!-- START panel-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">

                            <form method="get" action="{{action('Admin\GalleryController@index')}}" class="form-inline">

                                <div class="form-group m-sm">

                                    <input type="text" name="name" placeholder="Name" class="form-control"
                                           value="{{ $name  }}">
                                </div>

                                <div class="form-group m-sm">

                                    <select id="status" name="status" class="form-control">
                                        <option value="">Any Status</option>
                                        <option value="public" {{$status === 'public' ? 'selected':''}}>Public</option>
                                        <option value="private" {{$status === 'private' ? 'selected':''}}>Private</option>
                                    </select>
                                </div>

                                <div class="form-group m-sm">

                                    <select id="tag" name="tags[]" class="form-control" multiple="multiple">
                                        @foreach($allTags as $tag)
                                            <option value="{{$tag}}" {{isset($tags) && in_array($tag, $tags) ? 'selected':''}}>{{$tag}}</option>
                                        @endforeach
                                    </select>
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
                                <th><strong>Date</strong></th>
                                <th><strong>Tags</strong></th>
                                <th><strong>Status</strong></th>
                                <th><strong>Translations</strong></th>
                                <th><strong>Actions</strong></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($galleries as $gallery)
                                <tr class="">
                                    <td class="col-md-6 col-xs-5">{{$gallery->{"name:".fallback_locale()} }}</td>
                                    <td class="col-md-1 col-xs-1">{{$gallery->date->format('d/m/Y')}}</td>
                                    <td class="col-md-2 col-xs-2">
                                        @foreach($gallery->tagArray as $tag)
                                            <span class="label bg-purple-light">{{$tag}}</span>
                                        @endforeach
                                    </td>
                                    <td class="col-md-1 col-xs-1">
                                        @if ($gallery->status == 'public')
                                            <span class="label label-success">public</span>
                                        @else
                                            <span class="label label-default bg-gray-light">private</span>
                                        @endif
                                    </td>
                                    <td class="col-md-1 col-xs-1">
                                        <div class="btn-group">

                                            @foreach(locales_except_fallback() as $code => $properties)
                                                @if ($gallery->hasTranslation($code))
                                                    <a href="{{action('Admin\GalleryController@editTranslation', ['id'=>$gallery->id, 'locale' => $code])}}"
                                                       class="btn btn-default btn-xs btn-flag"
                                                       title="{{$properties['name']}}">
                                                        <span class="flag-icon flag-icon-{{$properties['flag']}}"></span></a>
                                                @endif
                                            @endforeach

                                            @if ($gallery->hasUntranslatedLocale())
                                                <a type="button" class="btn btn-default btn-xs btn-flag" href="{{action('Admin\GalleryController@createTranslation',$gallery->id)}}">
                                                    <span class="glyphicon glyphicon-plus"></span></a>
                                            @endif

                                        </div>
                                    </td>
                                    <td class="col-md-1 col-xs-2">
                                        <div class="btn-group">
                                            <a href="{{action('Admin\GalleryController@edit',$gallery->id)}}"
                                               class="btn btn-default btn-xs" title="Edit"><span
                                                        class="fa fa-edit"></span></a>
                                            <form action="{{action('Admin\GalleryController@destroy',$gallery->id)}}"
                                                  class="inline form-delete-{{$gallery->id}}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit"
                                                        class="btn btn-danger btn-xs btn-delete-{{$gallery->id}}"
                                                        title="Delete"><span
                                                            class="icon-trash"></span>
                                                </button>

                                                @include('component.sweetalert-delete', ['button' => '.btn-delete-'.$gallery->id, 'form' => '.form-delete-'.$gallery->id, 'text' => 'This item <span style="color:red;">'.$gallery->name.'</span> will be permanently deleted'])
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
                            @if ($galleries->total() > 0)
                                <span>{{ $galleries->firstItem()}} - {{$galleries->lastItem()}}
                                    of {{$galleries->total()}} record(s)</span>
                            @else
                                <span>No record found.</span>
                            @endif

                        </div>
                        <div class="col-xs-8">
                            {{--   @include('template.pagination')--}}
                            <div class="pull-right">
                                {{$galleries->appends(['name'=>$name, 'tags' => $tags, 'status' => $status])->links()}}
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






@push('script')
<script>
    $(function () {


        function options(placeholder) {
            return {
                theme: 'bootstrap',
                placeholder: placeholder,
                width: '100%'
            }
        }


        //select2 - tag
        $('#tag')
                .select2(options('Tag'))
                .change(function () {
                    $('#tag').select2(options('Tag'));
                });


    });
</script>
@endpush











