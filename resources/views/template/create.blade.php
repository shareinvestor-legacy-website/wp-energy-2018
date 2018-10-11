@extends('layouts.app')


@section('content')

    <div class="content-heading">

        Template


        @include('template.breadcrumb', ['items' => ['Home', 'Template', 'Create']])

    </div>

    <div class="row">
        <div class="col-lg-12">
            <!-- START panel-->
            <form method="get" action="/" class="form-horizontal">

                <div class="panel panel-default">
                    <div class="panel-heading">

                    </div>
                    <div class="panel-body">

                        <div role="tabpanel">
                            <!-- Nav tabs-->
                            <ul role="tablist" class="nav nav-tabs">
                                <li role="presentation" class="">
                                    <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">General
                                        <span class="fa fa-warning fa-fw fa-inverse text-danger"></span>
                                    </a>

                                </li>
                                <li role="presentation" class="">
                                    <a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Url</a>
                                </li>
                                <li role="presentation" class="">
                                    <a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Content</a>
                                </li>
                                <li role="presentation" class="">
                                    <a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab">Style</a>
                                </li>
                                <li role="presentation" class="">
                                    <a href="#tab5" aria-controls="tab5" role="tab" data-toggle="tab">Media</a>
                                </li>
                                <li role="presentation" class="active">
                                    <a href="#tab6" aria-controls="tab6" role="tab" data-toggle="tab">Role</a>
                                </li>
                            </ul>
                            <!-- Tab panes-->
                            <div class="tab-content pt-xl">
                                <div id="tab1" role="tabpanel" class="tab-pane">
                                    @include('template.tab.general')
                                </div>
                                <div id="tab2" role="tabpanel" class="tab-pane ">
                                    @include('template.tab.url')
                                </div>

                                <div id="tab3" role="tabpanel" class="tab-pane">
                                    @include('template.tab.content')
                                </div>
                                <div id="tab4" role="tabpanel" class="tab-pane ">
                                    @include('template.tab.style')
                                </div>
                                <div id="tab5" role="tabpanel" class="tab-pane ">
                                    @include('template.tab.media')
                                </div>
                                <div id="tab6" role="tabpanel" class="tab-pane active ">
                                    @include('template.tab.role')
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="panel-footer">
                        <div class="clearfix">
                            <div class="pull-left">
                                <button type="button" class="btn btn-danger ">
                                    <em class="fa fa-trash fa-fw"></em>Delete
                                </button>
                            </div>
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
            </form>
            <!-- END panel-->
        </div>
    </div>

@stop




@push('script')
<script>
    $(function () {


    });
</script>
@endpush








