@if (Auth::user()->canAny('manage-web-page', 'manage-web-post', 'manage-web-media', 'manage-web-category', 'manage-web-tag', 'manage-web-text'))

    <p class="lead">Web</p>

    <div class="row">

        @can('manage-web-menu')

            <div class="col-sm-3">
                <!-- START widget-->
                <a href="{{action('Admin\MenuController@index')}}">
                    <div class="panel widget">
                        <div class="row row-table">
                            <div class="col-xs-4 text-center  pv-lg">
                                <em class="fa fa-navicon fa-3x"></em>
                            </div>
                            <div class="col-xs-8 pv-lg">
                                <div class="h4 mt0">Menu
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endcan

        @can('manage-web-page')

            <div class="col-sm-3">
                <!-- START widget-->
                <a href="{{action('Admin\PageController@index')}}">
                    <div class="panel widget">
                        <div class="row row-table">
                            <div class="col-xs-4 text-center  pv-lg">
                                <em class="fa fa-sitemap fa-3x"></em>
                            </div>
                            <div class="col-xs-8 pv-lg">
                                <div class="h4 mt0">Page
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endcan

        @can('manage-web-post')

            <div class="col-sm-3">
                <!-- START widget-->
                <a href="{{action('Admin\PostController@index')}}">
                    <div class="panel widget">
                        <div class="row row-table">
                            <div class="col-xs-4 text-center  pv-lg">
                                <em class="fa fa-newspaper-o fa-3x"></em>
                            </div>
                            <div class="col-xs-8 pv-lg">
                                <div class="h4 mt0">Post
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endcan

        @can('manage-web-media')

            <div class="col-sm-3">
                <!-- START widget-->
                <a class="elfinder-browse" href="javascript:;">
                    <div class="panel widget ">
                        <div class="row row-table">
                            <div class="col-xs-4 text-center  pv-lg">
                                <em class="fa fa-files-o fa-3x"></em>
                            </div>
                            <div class="col-xs-8 pv-lg">
                                <div class="h4 mt0">Media
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>

        @endcan


        @can('manage-web-category')

            <div class="col-sm-3">
                <!-- START widget-->
                <a href="{{action('Admin\CategoryController@index')}}">
                    <div class="panel widget">
                        <div class="row row-table">
                            <div class="col-xs-4 text-center  pv-lg">
                                <em class="fa fa-object-group fa-3x"></em>
                            </div>
                            <div class="col-xs-8 pv-lg">
                                <div class="h4 mt0">Category
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>

        @endcan



        @can('manage-web-gallery')



            <div class="col-sm-3">
                <!-- START widget-->
                <a href="{{action('Admin\GalleryController@index')}}">
                    <div class="panel widget">
                        <div class="row row-table">
                            <div class="col-xs-4 text-center  pv-lg">
                                <em class="fa fa-picture-o fa-3x"></em>
                            </div>
                            <div class="col-xs-8 pv-lg">
                                <div class="h4 mt0">Gallery
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>

        @endcan



        @can('manage-web-tag')


            <div class="col-sm-3">
                <!-- START widget-->
                <a href="{{action('Admin\TagController@index')}}">
                    <div class="panel widget">
                        <div class="row row-table">
                            <div class="col-xs-4 text-center  pv-lg">
                                <em class="fa fa-tags fa-3x"></em>
                            </div>
                            <div class="col-xs-8 pv-lg">
                                <div class="h4 mt0">Tag
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>

        @endcan


        @can('manage-web-text')

            <div class="col-sm-3">
                <!-- START widget-->
                <a href="{{action('Admin\TextController@index')}}">
                    <div class="panel widget">
                        <div class="row row-table">
                            <div class="col-xs-4 text-center  pv-lg">
                                <em class="fa fa-globe fa-3x"></em>
                            </div>
                            <div class="col-xs-8 pv-lg">
                                <div class="h4 mt0">Text
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