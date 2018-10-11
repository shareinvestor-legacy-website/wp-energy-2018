<!--media -->

@can('manage-tool-audit')

    <li class="{{Request::is('admin/tool/audits') ? 'active': ''}}">
        <a href="{{action('Admin\ToolController@audit')}}" title=" Audit Activity">

            <em class="fa fa-database"></em>
            <span>Audit Activity</span>
        </a>
    </li>
@endcan


@can('manage-tool-url')

    <li class="{{Request::is('admin/tool/update-urls') ? 'active': ''}}">
        <a href="{{action('Admin\ToolController@updateURL')}}" title="Update URLs">

            <em class="fa fa-link"></em>
            <span>Update URLs</span>
        </a>
    </li>


@endcan

@can('manage-tool-sitemap')

    <li class="{{Request::is('admin/tool/sitemap') ? 'active': ''}}">
        <a href="{{action('Admin\ToolController@sitemap')}}" title="Sitemap">

            <em class="fa fa-google"></em>
            <span>Sitemap</span>
        </a>
    </li>


@endcan





