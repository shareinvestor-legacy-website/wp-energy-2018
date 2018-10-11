@extends('layouts.app')


@section('content')

    <div class="content-heading">

        Page

        @include('component.breadcrumb', ['items' => ['Web', 'Page', 'Ordering']])
    </div>


    @include('component.flash')


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
                    <div class="col-md-12">

                        <div id="nestable" class="dd">
                            <ol class="dd-list">
                                @each('web.page.ordering-item', $pages, 'page')
                            </ol>
                        </div>


                        <form id="ordering" method="post" action="{{action('Admin\PageController@updateOrdering')}}">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <input type="hidden" id="nestable-output" class="form-control" name="nestable"/>
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
            maxDepth: 10
        }).on('change', updateOutput);



        updateOutput($('#nestable').data('output', $('#nestable-output')));

        $('.btn-collapse').on('click', function (e) {
            $('.dd').nestable('collapseAll');
        });

        $('.btn-expand').on('click', function (e) {
            $('.dd').nestable('expandAll');
        });

        $('.btn-submit').click(function() {
            $('#ordering').submit();
        });

        //$('.dd').nestable('collapseAll');
    });
</script>

@endpush








