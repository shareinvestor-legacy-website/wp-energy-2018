@if (Auth::user()->canAny('manage-tool-audit','manage-tool-url', 'manage-tool-sitemap'))

    <p class="lead">Tool</p>

    <!-- START widgets box-->
    <div class="row">

        @can('manage-tool-audit')
            <div class="col-sm-3">
                <!-- START widget-->
                <a href="{{action('Admin\ToolController@audit')}}">
                    <div class="panel widget">
                        <div class="row row-table">
                            <div class="col-xs-4 text-center  pv-lg">
                                <em class="fa fa-database fa-3x"></em>
                            </div>
                            <div class="col-xs-8 pv-lg">
                                <div class="h4 mt0">Audit Activity
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endcan

        @can('manage-tool-url')
            <div class="col-sm-3">
                <!-- START widget-->
                <a href="{{action('Admin\ToolController@updateURL')}}">
                    <div class="panel widget">
                        <div class="row row-table">
                            <div class="col-xs-4 text-center  pv-lg">
                                <em class="fa fa-link fa-3x"></em>
                            </div>
                            <div class="col-xs-8 pv-lg">
                                <div class="h4 mt0">Update URLs
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endcan

        @can('manage-tool-sitemap')
            <div class="col-sm-3">
                <!-- START widget-->
                <a href="{{action('Admin\ToolController@sitemap')}}">
                    <div class="panel widget">
                        <div class="row row-table">
                            <div class="col-xs-4 text-center  pv-lg">
                                <em class="fa fa-google fa-3x"></em>
                            </div>
                            <div class="col-xs-8 pv-lg">
                                <div class="h4 mt0">Sitemap
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endcan

    </div>
    <!-- END widgets box-->
@endif