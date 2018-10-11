<!--category -->
@can('manage-web-menu')
    <li class="">
        <a href="#menu-web-menu" title="Menu" data-toggle="collapse">

            <em class="fa fa-navicon"></em>
            <span>Menu</span>
        </a>
        <ul id="menu-web-menu" class="nav sidebar-subnav collapse">
            <li class="sidebar-subnav-header">Menu</li>
            <li class="{{ Request::is('admin/menus')  ||  Request::is('admin/menus/*edit') ? 'active': ''}}">
                <a href="{{action('Admin\MenuController@index')}}" title="All Menus">
                    <span>All Menus</span>
                </a>
            </li>
            <li class="{{Request::is('admin/menus/*create') ? 'active': ''}}">
                <a href="{{action('Admin\MenuController@create')}}" title="Create New">
                    <span>Create New</span>
                </a>
            </li>
            <li class="{{Request::is('admin/menus/ordering') ? 'active': ''}}">
                <a href="{{action('Admin\MenuController@ordering')}}" title="Ordering">
                    <span>Ordering</span>
                </a>
            </li>
        </ul>
    </li>
@endcan


<!--page -->
@can('manage-web-page')

    <li class="">
        <a href="#menu-web-page" title="Page" data-toggle="collapse">

            <em class="fa fa-sitemap"></em>
            <span>Page</span>
        </a>
        <ul id="menu-web-page" class="nav sidebar-subnav collapse">
            <li class="sidebar-subnav-header">Page</li>
            <li class="{{ Request::is('admin/pages')  ||  Request::is('admin/pages/*edit') ? 'active': ''}}">
                <a href="{{action('Admin\PageController@index')}}" title="All Pages">
                    <span>All Pages</span>
                </a>
            </li>
            <li class="{{Request::is('admin/pages/*create') ? 'active': ''}}">
                <a href="{{action('Admin\PageController@create')}}" title="Create New">
                    <span>Create New</span>
                </a>
            </li>
            <li class="{{Request::is('admin/pages/ordering') ? 'active': ''}}">
                <a href="{{action('Admin\PageController@ordering')}}" title="Ordering">
                    <span>Ordering</span>
                </a>
            </li>
        </ul>
    </li>

@endcan

<!--post -->
@can('manage-web-post')
    <li class="">
        <a href="#menu-web-post" title="Post" data-toggle="collapse">

            <em class="fa fa-newspaper-o"></em>
            <span>Post</span>
        </a>
        <ul id="menu-web-post" class="nav sidebar-subnav collapse">
            <li class="sidebar-subnav-header">Post</li>

            <li class="{{ Request::is('admin/posts')  ||  Request::is('admin/posts/*edit') ? 'active': ''}}">
                <a href="{{action('Admin\PostController@index')}}" title="All Posts">
                    <span>All Posts</span>
                </a>
            </li>
            <li class="{{Request::is('admin/posts/*create') ? 'active': ''}}">
                <a href="{{action('Admin\PostController@create')}}" title="Create New">
                    <span>Create New</span>
                </a>
            </li>
            <li class="{{Request::is('admin/posts/ordering') ? 'active': ''}}">
                <a href="{{action('Admin\PostController@ordering')}}" title="Ordering">
                    <span>Ordering</span>
                </a>
            </li>
        </ul>
    </li>
@endcan

<!--media -->
@can('manage-web-media')
    <li class="">
        <a href="" class="elfinder-browse" title="Media" data-toggle="collapse">

            <em class="fa fa-files-o"></em>
            <span>Media</span>
        </a>
    </li>


@endcan


<!--category -->
@can('manage-web-category')
    <li class="">
        <a href="#menu-web-category" title="Category" data-toggle="collapse">

            <em class="fa fa-object-group"></em>
            <span>Category</span>
        </a>
        <ul id="menu-web-category" class="nav sidebar-subnav collapse">
            <li class="sidebar-subnav-header">Category</li>
            <li class="{{ Request::is('admin/categories')  ||  Request::is('admin/categories/*edit') ? 'active': ''}}">
                <a href="{{action('Admin\CategoryController@index')}}" title="All Categories">
                    <span>All Categories</span>
                </a>
            </li>
            <li class="{{Request::is('admin/categories/*create') ? 'active': ''}}">
                <a href="{{action('Admin\CategoryController@create')}}" title="Create New">
                    <span>Create New</span>
                </a>
            </li>
            <li class="{{Request::is('admin/categories/ordering') ? 'active': ''}}">
                <a href="{{action('Admin\CategoryController@ordering')}}" title="Ordering">
                    <span>Ordering</span>
                </a>
            </li>
        </ul>
    </li>
@endcan

@can('manage-web-gallery')
    <li class="">
        <a href="#menu-web-gallery" title="Gallery" data-toggle="collapse">

            <em class="fa fa-picture-o"></em>
            <span>Gallery</span>
        </a>
        <ul id="menu-web-gallery" class="nav sidebar-subnav collapse">
            <li class="sidebar-subnav-header">Gallery</li>
            <li class="{{ Request::is('admin/galleries')  ||  Request::is('admin/galleries/*edit') ? 'active': ''}}">
                <a href="{{action('Admin\GalleryController@index')}}" title="All Gallery">
                    <span>All Galleries</span>
                </a>
            </li>
            <li class="{{Request::is('admin/galleries/*create') ? 'active': ''}}">
                <a href="{{action('Admin\GalleryController@create')}}" title="Create Gallery">
                    <span>Create New</span>
                </a>
            </li>
        </ul>
    </li>
@endcan

<!--tags -->

@can('manage-web-tag')
    <li class="">
        <a href="#menu-web-tag" title="Tag" data-toggle="collapse">

            <em class="fa fa-tags"></em>
            <span>Tag</span>
        </a>
        <ul id="menu-web-tag" class="nav sidebar-subnav collapse">
            <li class="sidebar-subnav-header">Tag</li>
            <li class="{{ Request::is('admin/tags')  ||  Request::is('admin/tags/*edit') ? 'active': ''}}">
                <a href="{{action('Admin\TagController@index')}}" title="All Tags">
                    <span>All Tags</span>
                </a>
            </li>
            <li class="{{Request::is('admin/tags/*create') ? 'active': ''}}">
                <a href="{{action('Admin\TagController@create')}}" title="Create New">
                    <span>Create New</span>
                </a>
            </li>
        </ul>
    </li>

@endcan

<!--trans -->

@can('manage-web-text')
    <li class="">
        <a href="#menu-web-text" title="Text" data-toggle="collapse">

            <em class="fa fa-globe"></em>
            <span>Text</span>
        </a>
        <ul id="menu-web-text" class="nav sidebar-subnav collapse">
            <li class="sidebar-subnav-header">Text</li>
            <li class="{{ Request::is('admin/texts')  ||  Request::is('admin/texts/*edit') ? 'active': ''}}">
                <a href="{{action('Admin\TextController@index')}}" title="All Text">
                    <span>All Texts</span>
                </a>
            </li>
            <li class="{{Request::is('admin/texts/*create') ? 'active': ''}}">
                <a href="{{action('Admin\TextController@create')}}" title="Create New">
                    <span>Create New</span>
                </a>
            </li>
        </ul>
    </li>
@endcan