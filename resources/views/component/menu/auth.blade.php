

<!--user -->

@can('manage-auth-user')

<li class="">
    <a href="#menu-auth-user" title="User" data-toggle="collapse">

        <em class="fa fa-users"></em>
        <span>User</span>
    </a>
    <ul id="menu-auth-user" class="nav sidebar-subnav collapse">
        <li class="sidebar-subnav-header">User</li>
        <li class="{{ Request::is('admin/auth/users')  ||  Request::is('admin/auth/users/*edit') ? 'active': ''}}">
            <a href="{{action('Admin\UserController@index')}}" title="All Users">
                <span>All Users</span>
            </a>
        </li>
        <li class="{{Request::is('admin/auth/users/*create') ? 'active': ''}}">
            <a href="{{action('Admin\UserController@create')}}" title="Create New">
                <span>Create New</span>
            </a>
        </li>
    </ul>
</li>

@endcan


<!--role -->
@can('manage-auth-role')

<li class="">
    <a href="#menu-auth-role" title="Role" data-toggle="collapse">

        <em class="fa fa-lock"></em>
        <span>Role</span>
    </a>
    <ul id="menu-auth-role" class="nav sidebar-subnav collapse">
        <li class="sidebar-subnav-header">Role</li>
        <li class="{{ Request::is('admin/auth/roles')  ||  Request::is('admin/auth/roles/*edit') ? 'active': ''}}">
            <a href="{{action('Admin\RoleController@index')}}" title="All Roles">
                <span>All Roles</span>
            </a>
        </li>
        <li class="{{Request::is('admin/auth/roles/*create') ? 'active': ''}}">
            <a href="{{action('Admin\RoleController@create')}}" title="Create New">
                <span>Create New</span>
            </a>
        </li>
    </ul>
</li>
@endcan
