@if (Auth::user()->canAny('manage-setting-general', 'manage-setting-advance', 'manage-setting-contact'))

    <p class="lead">Setting</p>

    <!-- START widgets box-->
    <div class="row">

        @can('manage-setting-general')

            <div class="col-sm-3">
                <!-- START widget-->
                <a href="{{action('Admin\SettingController@general')}}">
                    <div class="panel widget">
                        <div class="row row-table">
                            <div class="col-xs-4 text-center  pv-lg">
                                <em class="fa fa-cog fa-3x"></em>
                            </div>
                            <div class="col-xs-8 pv-lg">
                                <div class="h4 mt0">General
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>

        @endcan


        @can('manage-setting-contact')

            <div class="col-sm-3">
                <!-- START widget-->
                <a href="{{action('Admin\ContactController@index')}}">
                    <div class="panel widget">
                        <div class="row row-table">
                            <div class="col-xs-4 text-center  pv-lg">
                                <em class="fa fa-envelope fa-3x"></em>
                            </div>
                            <div class="col-xs-8 pv-lg">
                                <div class="h4 mt0">Contact
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>

        @endcan


        @can('manage-setting-advance')
            <div class="col-sm-3">
                <!-- START widget-->
                <a href="{{action('Admin\SettingController@advance')}}">
                    <div class="panel widget ">
                        <div class="row row-table">
                            <div class="col-xs-4 text-center  pv-lg">
                                <em class="fa fa-wrench fa-3x"></em>
                            </div>
                            <div class="col-xs-8 pv-lg">
                                <div class="h4 mt0">Advance
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