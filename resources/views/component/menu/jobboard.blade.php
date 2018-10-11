<!--position -->
@can('manage-jobboard-position')


    <li class="">
        <a href="#menu-jobboard-position" title="Position" data-toggle="collapse">

            <em class="fa fa-user-plus"></em>
            <span>Position</span>
        </a>
        <ul id="menu-jobboard-position" class="nav sidebar-subnav collapse">
            <li class="sidebar-subnav-header">Position</li>
            <li class="{{ Request::is('admin/jobboard/positions')  ||  Request::is('admin/jobboard/positions/*edit') ? 'active': ''}}">
                <a href="{{action('Admin\PositionController@index')}}" title="All Positions">
                    <span>All Positions</span>
                </a>
            </li>
            <li class="{{Request::is('admin/jobboard/positions/*create') ? 'active': ''}}">
                <a href="{{action('Admin\PositionController@create')}}" title="Create New">
                    <span>Create New</span>
                </a>
            </li>

        </ul>
    </li>

@endcan



<!--departments -->
@can('manage-jobboard-department')

    <li class="">
        <a href="#menu-jobboard-department" title="Department" data-toggle="collapse">

            <em class="fa fa-building"></em>
            <span>Department</span>
        </a>
        <ul id="menu-jobboard-department" class="nav sidebar-subnav collapse">
            <li class="sidebar-subnav-header">Department</li>
            <li class="{{ Request::is('admin/jobboard/departments')  ||  Request::is('admin/jobboard/departments/*edit') ? 'active': ''}}">
                <a href="{{action('Admin\DepartmentController@index')}}" title="All Departments">
                    <span>All Departments</span>
                </a>
            </li>
            <li class="{{Request::is('admin/jobboard/departments/*create') ? 'active': ''}}">
                <a href="{{action('Admin\DepartmentController@create')}}" title="Create New">
                    <span>Create New</span>
                </a>
            </li>
        </ul>
    </li>

@endcan


<!--locations -->

@can('manage-jobboard-location')

    <li class="">
        <a href="#menu-jobboard-location" title="Location" data-toggle="collapse">

            <em class="fa fa-map-marker"></em>
            <span>Location</span>
        </a>
        <ul id="menu-jobboard-location" class="nav sidebar-subnav collapse">
            <li class="sidebar-subnav-header">Location</li>
            <li class="{{ Request::is('admin/jobboard/locations')  ||  Request::is('admin/jobboard/locations/*edit') ? 'active': ''}}">
                <a href="{{action('Admin\LocationController@index')}}" title="All Locations">
                    <span>All Locations</span>
                </a>
            </li>
            <li class="{{Request::is('admin/jobboard/locations/*create') ? 'active': ''}}">
                <a href="{{action('Admin\LocationController@create')}}" title="Create New">
                    <span>Create New</span>
                </a>
            </li>
        </ul>
    </li>

@endcan
