<!-- top navbar-->
<header class="topnavbar-wrapper">
    <!-- START Top Navbar-->
    <nav role="navigation" class="navbar topnavbar">
        <!-- START navbar header-->
        <div class="navbar-header">
            <a href="{{action('Admin\AdminController@dashboard')}}" class="navbar-brand">
                <div class="brand-logo">
                <!-- <img src="{{asset('img/logo.png')}}" alt="App Logo" class="img-responsive">-->
                    <h3>Blaze CMS</h3>
                </div>
                <div class="brand-logo-collapsed">
                    <!--<img src="{{asset('img/logo-single.png')}}" alt="App Logo" class="img-responsive"> -->
                    <h4>Blaze CMS</h4>
                </div>
            </a>
        </div>
        <!-- END navbar header-->
        <!-- START Nav wrapper-->
        <div class="nav-wrapper">
            <!-- START Left navbar-->
            <ul class="nav navbar-nav">

                <li>
                    <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                    <a href="#" data-toggle-state="aside-collapsed" class="hidden-xs">
                        <em class="fa fa-navicon"></em>
                    </a>
                    <!-- Button to show/hide the sidebar on mobile. Visible on mobile only.-->
                    <a href="#" data-toggle-state="aside-toggled" data-no-persist="true"
                       class="visible-xs sidebar-toggle">
                        <em class="fa fa-navicon"></em>
                    </a>
                </li>
                <!-- START Offsidebar button-->
                <li>
                    <a href="{{url(fallback_locale())}}" data-no-persist="true" target="_blank">
                        <em class="fa fa-sign-out fa-fw"></em>Vist Site
                    </a>
                </li>
                <!-- END Offsidebar menu-->

            </ul>
            <!-- END Left navbar-->
            <!-- START Right Navbar-->
            <ul class="nav navbar-nav navbar-right">

                <li>
                    <form id="form-clearcache" action="{{action('Admin\ToolController@clearCache')}}" method="post">
                        {{ csrf_field() }}
                    </form>
                    <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                    <a id="clearcache" href="javascript:;" title="Clear Cache" >
                        <em class="fa fa-refresh"></em>
                    </a>
                </li>


                <!-- START User avatar toggle-->
                <li>
                    <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                    <a href="{{action('Admin\UserController@profile')}}" title="Update user profile" >
                        <em class="icon-user"></em>
                    </a>
                </li>
                <!-- END User avatar toggle-->

                <!-- START Offsidebar button-->
                <li>
                    <form id="form-logout" action="{{action('Auth\LoginController@logout')}}" method="post">
                        {{ csrf_field() }}
                    </form>
                    <a id="logout" href="javascript:;" data-toggle-state="offsidebar-open" data-no-persist="true" title="Log out">
                        <em class="fa fa-sign-out"></em>
                    </a>
                </li>
                <!-- END Offsidebar menu-->
            </ul>
            <!-- END Right Navbar-->
        </div>
        <!-- END Nav wrapper-->
        <!-- START Search form-->
        <form role="search" action="javascript:;" class="navbar-form">
            <div class="form-group has-feedback">
                <input type="text" placeholder="Type and hit enter ..." class="form-control">
                <div data-search-dismiss="" class="fa fa-times form-control-feedback"></div>
            </div>
            <button type="submit" class="hidden btn btn-default">Submit</button>
        </form>
        <!-- END Search form-->
    </nav>
    <!-- END Top Navbar-->
</header>

@push('script')
<script>
    $(function() {


        $('#clearcache').click(function (e) {

            e.preventDefault();
            $('#form-clearcache').submit();

        });


        $('#logout').click(function (e) {

            e.preventDefault();

            swal({
                        title: "Are you sure?",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes, of course!",
                        closeOnConfirm: false,
                        html: true
                    },
                    function (isConfirm) {

                        if (isConfirm) {
                            $('#form-logout').submit();
                        }

                    });
        });
    });

</script>
@endpush