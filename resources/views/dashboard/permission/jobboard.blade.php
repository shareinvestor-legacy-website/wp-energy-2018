@if (Auth::user()->canAny('manage-jobboard-position', 'manage-jobboard-department', 'manage-jobboard-location'))



    <p class="lead">Jobboard</p>

    <!-- START widgets box-->
    <div class="row">

        @can('manage-jobboard-position')


            <div class="col-sm-3">
                <!-- START widget-->
                <a href="{{action('Admin\PositionController@index')}}">
                    <div class="panel widget">
                        <div class="row row-table">
                            <div class="col-xs-4 text-center  pv-lg">
                                <em class="fa fa-user-plus fa-3x"></em>
                            </div>
                            <div class="col-xs-8 pv-lg">
                                <div class="h4 mt0">Position
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>

        @endcan


        @can('manage-jobboard-department')


            <div class="col-sm-3">
                <!-- START widget-->
                <a href="{{action('Admin\DepartmentController@index')}}">
                    <div class="panel widget">
                        <div class="row row-table">
                            <div class="col-xs-4 text-center  pv-lg">
                                <em class="fa fa-building fa-3x"></em>
                            </div>
                            <div class="col-xs-8 pv-lg">
                                <div class="h4 mt0">Department
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>

        @endcan

        @can('manage-jobboard-location')

            <div class="col-sm-3">
                <!-- START widget-->
                <a href="{{action('Admin\LocationController@index')}}">
                    <div class="panel widget ">
                        <div class="row row-table">
                            <div class="col-xs-4 text-center  pv-lg">
                                <em class="fa fa-map-marker fa-3x"></em>
                            </div>
                            <div class="col-xs-8 pv-lg">
                                <div class="h4 mt0">Location
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
