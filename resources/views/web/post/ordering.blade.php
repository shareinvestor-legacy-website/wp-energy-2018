@extends('layouts.app')


@section('content')

    <div class="content-heading">

        Post

        @include('component.breadcrumb', ['items' => ['Web', 'Post', 'Ordering']])
    </div>


    @include('component.flash')


    <div class="row">
        <div class="col-sm-12">
            <!-- START panel-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="get" action="{{action('Admin\PostController@ordering')}}" class="form-inline">

                                <div class="form-group">
                                    <select id="category" name="category_id" class="form-control " multiple>
                                        @foreach($allCategories as $category)
                                            <option value="{{$category->id}}" {{$category_id == $category->id ? 'selected':''}}>{{$category->path('name', ' -> ') }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-default btn-expand m-sm">Filter</button>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-md-12">


                        <div id="nestable" class="dd">
                            <ol class="dd-list">

                                @if (isset($posts) )
                                    @foreach ($posts as $post)

                                        <li data-id="{{$post->id}}" class="dd-item dd3-item">
                                            <div class="dd-handle dd3-handle">Drag</div>
                                            <div class="dd3-content">{{$post->{'title:'.fallback_locale()} }}</div>

                                        </li>
                                    @endforeach
                                @endif

                            </ol>
                        </div>


                        <form id="ordering" method="post" action="{{action('Admin\PostController@updateOrdering')}}">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <input type="hidden"  name="category_id" value="{{$category_id}}"/>
                            <input type="hidden" id="nestable-output" class="form-control" name="posts"/>
                        </form>

                    </div>
                </div>

                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-4">
                            <span>{{$count}} record(s)</span>
                        </div>
                        <div class="col-xs-8">
                            <div class="pull-right">

                                <button type="submit" class="btn btn-primary  btn-submit">
                                    <em class="fa fa-check fa-fw"></em>Save
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- END panel-->
        </div>
    </div>

@stop




@push('script')
<script>
    $(function () {


        var updateOutput = function (e) {
            var list = e.length ? e : $(e.target),
                    output = list.data('output');
            if (window.JSON) {
                output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
            } else {
                output.val('JSON browser support required for this demo.');
            }
        };

        // activate Nestable for list 1
        $('#nestable').nestable({
            group: 1,
            maxDepth: 1
        }).on('change', updateOutput);


        updateOutput($('#nestable').data('output', $('#nestable-output')));





        $('.btn-submit').click(function () {
            $('#ordering').submit();
        });


        function options(placeholder) {
            return {
                theme: 'bootstrap',
                placeholder: placeholder,
                width: '100%',
                maximumSelectionLength: 1

            }
        }


        $('#category')
                .select2(options('Category'))
                .change(function () {
                    $('#category').select2(options('Category'));

                });

    });
</script>

@endpush






