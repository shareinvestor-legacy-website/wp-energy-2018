@extends('layouts.app')


@section('content')

    <div class="content-heading">

        Post


        @include('component.breadcrumb', ['items' => ['Web', 'Post', 'All Posts']])
    </div>

    @include('component.flash')

    <div class="row">
        <div class="col-sm-12">
            <!-- START panel-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">


                            <form method="get" action="{{action('Admin\PostController@index')}}" class="form-inline">

                                <div class="form-group m-sm">

                                    <select id="category" name="categories[]" class="form-control" multiple="multiple">
                                        @foreach($allCategories as $category)
                                            <option value="{{$category->id}}" {{isset($categories) && in_array($category->id, $categories) ? 'selected':''}}>{{$category->display_path }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group m-sm">

                                    <select id="tag" name="tags[]" class="form-control" multiple="multiple">
                                        @foreach($allTags as $tag)
                                            <option value="{{$tag}}" {{isset($tags) && in_array($tag, $tags) ? 'selected':''}}>{{$tag}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group m-sm">

                                    <select id="attribute" name="extra_attributes[]" class="form-control" multiple="multiple">
                                        <option value="sticky" {{isset($extra_attributes) && in_array('sticky', $extra_attributes) ? 'selected':''}}>Sticky</option>
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
                                <th><strong>Category</strong></th>
                                <th><strong>Date</strong></th>
                                <th><strong>Tags</strong></th>
                                <th><strong>Attributes</strong></th>
                                <th><strong>Status</strong></th>
                                <th><strong>Translations</strong></th>
                                <th><strong>Actions</strong></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($posts as $post)
                                <tr class="">
                                    <td class="col-md-4 col-xs-4">{{$post->{"title:".fallback_locale()} }}</td>
                                    <td class="col-md-1 col-xs-1">
                                        @foreach($post->categories as $category)
                                            <span class="label bg-primary-light"
                                                  title="{{$category->path('name', ' -> ')}}">{{$category->{"name:".fallback_locale()} }}</span>
                                        @endforeach
                                    </td>
                                    <td class="col-md-1 col-xs-1">{{$post->present()->date('dd/MM/yyyy HH:mm')}}</td>
                                    <td class="col-md-2 col-xs-2">
                                        @foreach($post->tagArray as $tag)
                                            <span class="label bg-purple-light">{{$tag}}</span>
                                        @endforeach
                                    </td>
                                    <td class="col-md-1 col-xs-1">
                                        @if ($post->sticky)
                                            <span class="label label-default bg-warning-light">Sticky</span>
                                        @endif
                                    </td>
                                    <td class="col-md-1 col-xs-1">
                                        @if ($post->status == 'public')
                                            <span class="label label-success">public</span>
                                        @else
                                            <span class="label label-default bg-gray-light">private</span>
                                        @endif
                                    </td>

                                    <td class="col-md-1 col-xs-1">
                                        <div class="btn-group">

                                            @foreach(locales_except_fallback() as $code => $properties)
                                                @if ($post->hasTranslation($code))
                                                    <a href="{{action('Admin\PostController@editTranslation', ['id'=>$post->id, 'locale' => $code])}}"
                                                       class="btn btn-default btn-xs btn-flag"
                                                       title="{{$properties['name']}}">
                                                        <span class="flag-icon flag-icon-{{$properties['flag']}}"></span></a>
                                                @endif
                                            @endforeach

                                            @if ($post->hasUntranslatedLocale())
                                                <a type="button" class="btn btn-default btn-xs btn-flag"
                                                   href="{{action('Admin\PostController@createTranslation',$post->id)}}">
                                                    <span class="glyphicon glyphicon-plus"></span></a>
                                            @endif

                                        </div>
                                    </td>
                                    <td class="col-md-1 col-xs-1">
                                        <div class="btn-group">
                                            <a href="{{action('Admin\PostController@edit',$post->id)}}"
                                               class="btn btn-default btn-xs" title="Edit"><span
                                                        class="fa fa-edit"></span></a>
                                            <form action="{{action('Admin\PostController@destroy',$post->id)}}"
                                                  class="inline form-delete-{{$post->id}}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit"
                                                        class="btn btn-danger btn-xs btn-delete-{{$post->id}}"
                                                        title="Delete"><span
                                                            class="icon-trash"></span>
                                                </button>

                                                @include('component.sweetalert-delete', ['button' => '.btn-delete-'.$post->id, 'form' => '.form-delete-'.$post->id, 'text' => 'This item <span style="color:red;">'.$post->title.'</span> will be permanently deleted'])
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
                            @if ($posts->total() > 0)
                                <span>{{ $posts->firstItem()}} - {{$posts->lastItem()}}
                                    of {{$posts->total()}} record(s)</span>
                            @else
                                <span>No record found.</span>
                            @endif

                        </div>
                        <div class="col-xs-8">
                            {{--   @include('template.pagination')--}}
                            <div class="pull-right">
                                {{$posts->appends(['title'=>$title, 'tags' => $tags, 'categories' => $categories, 'status' => $status])->links()}}
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


        $('#category')
                .select2(options('Category'))
                .change(function () {
                    $('#category').select2(options('Category'));

                });


        $('#attribute')
                .select2(options('Attribute'))
                .change(function () {
                    $('#attribute').select2(options('Attribute'));

                });


        //select2 - tag
        $('#tag')
                .select2(options('Tag'))
                .change(function () {
                    $('#tag').select2(options('Tag'));
                });


    });
</script>
@endpush
