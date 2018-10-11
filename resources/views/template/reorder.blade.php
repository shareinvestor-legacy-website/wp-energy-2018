@extends('layouts.app')


@section('content')

    <div class="content-heading">

        Category


        @include('template.breadcrumb', ['items' => ['Home', 'Category', 'Reorder']])
    </div>



    <div class="row">
        <div class="col-lg-12">
            <!-- START panel-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-inline">
                                <div class="form-group m-sm">
                                    <select name="account" class="form-control m-b select2">
                                        <option>Option 1 Option 1 Option 1 Option 1 Option 1</option>
                                        <option>Option 2</option>
                                        <option>Option 3</option>
                                        <option>Option 4</option>
                                    </select>
                                </div>

                                <button type="button" class="btn btn-default btn-expand m-sm">Select</button>

                            </div>
                        </div>
                        <div class="col-md-3">
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
                                <li data-id="1" class="dd-item">
                                    <div class="dd-handle">Item
                                        1</div>
                                </li>
                                <li data-id="2" class="dd-item">
                                    <div class="dd-handle">Item
                                        2</div>
                                    <ol class="dd-list">
                                        <li data-id="3" class="dd-item">
                                            <div class="dd-handle">Item
                                                3</div>
                                        </li>
                                        <li data-id="4" class="dd-item">
                                            <div class="dd-handle">Item
                                                4</div>
                                        </li>
                                        <li data-id="5" class="dd-item">
                                            <div class="dd-handle">Item
                                                5</div>
                                            <ol class="dd-list">
                                                <li data-id="6" class="dd-item">
                                                    <div class="dd-handle">Item
                                                        6</div>
                                                </li>
                                                <li data-id="7" class="dd-item">
                                                    <div class="dd-handle">Item
                                                        7</div>
                                                </li>
                                                <li data-id="8" class="dd-item">
                                                    <div class="dd-handle">Item
                                                        8</div>
                                                </li>
                                            </ol>
                                        </li>
                                        <li data-id="9" class="dd-item">
                                            <div class="dd-handle">Item
                                                9</div>
                                        </li>
                                        <li data-id="10" class="dd-item">
                                            <div class="dd-handle">Item
                                                10</div>
                                        </li>
                                    </ol>
                                </li>
                                <li data-id="11" class="dd-item">
                                    <div class="dd-handle">Item
                                        11</div>
                                </li>
                                <li data-id="12" class="dd-item">
                                    <div class="dd-handle">Item
                                        12</div>
                                </li>
                            </ol>
                        </div>

                        <textarea id="nestable-output" class="form-control"></textarea>
                    </div>
                </div>

                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-4">
                            <span>100 records</span>
                        </div>
                        <div class="col-xs-8">
                            <div class="pull-right">


                                <button type="button" class="btn btn-default ">
                                    <em class="fa fa-undo fa-fw"></em>Back
                                </button>
                                <button type="button" class="btn btn-primary ">
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

        //select2 - select
        $('.select2').select2({
            theme: 'bootstrap',
            width: '100%'
        });


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
                    maxDepth: 5
                })
                .on('change', updateOutput);


        updateOutput($('#nestable').data('output', $('#nestable-output')));

        $('.btn-collapse').on('click', function (e) {
            $('.dd').nestable('collapseAll');
        });

        $('.btn-expand').on('click', function (e) {
            $('.dd').nestable('expandAll');
        });
    });
</script>

@endpush








