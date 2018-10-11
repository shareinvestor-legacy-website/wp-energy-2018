<!--global -->

@can('manage-setting-general')

    <li class="{{Request::is('admin/setting/general') ? 'active': ''}}">
        <a href="{{action("Admin\SettingController@general")}}" title="General Setting">

            <em class="fa fa-cog"></em>
            <span>General</span>
        </a>
    </li>
@endcan

<!--contact -->

@can('manage-setting-contact')
    <li class="">
        <a href="#menu-setting-contact" title="Contact" data-toggle="collapse">

            <em class="fa fa-envelope"></em>
            <span>Contact</span>
        </a>
        <ul id="menu-setting-contact" class="nav sidebar-subnav collapse">
            <li class="sidebar-subnav-header">Contact</li>
            <li class="{{ Request::is('admin/setting/contacts')  ||  Request::is('admin/setting/contacts/*edit') ? 'active': ''}}">
                <a href="{{action('Admin\ContactController@index')}}" title="All Contacts">
                    <span>All Contacts</span>
                </a>
            </li>
            <li class="{{Request::is('admin/setting/contacts/*create') ? 'active': ''}}">
                <a href="{{action('Admin\ContactController@create')}}" title="Create New">
                    <span>Create New</span>
                </a>
            </li>
        </ul>
    </li>
@endcan


@can('manage-setting-advance')

    <li class="{{Request::is('admin/setting/advance') ? 'active': ''}}">
        <a href="{{action("Admin\SettingController@advance")}}" title="Advance Setting">

            <em class="fa fa-wrench"></em>
            <span>Advance</span>
        </a>
    </li>
@endcan


<li class="">
    <a href="{{url(fallback_locale())}}" title="Visit Site" target="_blank">

        <em class="fa fa-sign-out"></em>
        <span>Visit Site</span>
    </a>
</li>