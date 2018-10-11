@if (Auth::user()->canAny('manage-auth-user', 'manage-auth-role'))


    <p class="lead">Auth</p>



    <!-- START widgets box-->
    <div class="row">


        @can('manage-auth-user')

            <div class="col-sm-3">
                <!-- START widget-->
                <a href="{{action('Admin\UserController@index')}}">
                    <div class="panel widget">
                        <div class="row row-table">
                            <div class="col-xs-4 text-center  pv-lg">
                                <em class="fa fa-users fa-3x"></em>
                            </div>
                            <div class="col-xs-8 pv-lg">
                                <div class="h4 mt0">User
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endcan

        @can('manage-auth-role')
            <div class="col-sm-3">
                <!-- START widget-->
                <a href="{{action('Admin\RoleController@index')}}">
                    <div class="panel widget">
                        <div class="row row-table">
                            <div class="col-xs-4 text-center  pv-lg">
                                <em class="fa fa-lock fa-3x"></em>
                            </div>
                            <div class="col-xs-8 pv-lg">
                                <div class="h4 mt0">Role
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