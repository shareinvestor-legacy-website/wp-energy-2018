<!-- sidebar-->
<aside class="aside">
    <!-- START Sidebar (left)-->
    <div class="aside-inner">
        <nav data-sidebar-anyclick-close="" class="sidebar">
            <!-- START sidebar nav-->
            <ul class="nav">


                @if (Auth::user()->canAny('manage-web-page', 'manage-web-post', 'manage-web-media', 'manage-web-category', 'manage-web-tag', 'manage-web-text'))
                    <li class="nav-heading ">
                        <span>Web</span>
                        @include('component.menu.web')
                    </li>
                @endif

                @if (Auth::user()->canAny('manage-jobboard-position', 'manage-jobboard-department', 'manage-jobboard-location'))
                    <li class="nav-heading ">
                        <span>Jobboard</span>
                        @include('component.menu.jobboard')
                    </li>
                @endif

                @if (Auth::user()->canAny('manage-auth-user', 'manage-auth-role'))

                    <li class="nav-heading ">
                        <span>Auth</span>
                        @include('component.menu.auth')
                    </li>
                @endif

                @if (Auth::user()->canAny('manage-tool-audit','manage-tool-url', 'manage-tool-sitemap'))

                    <li class="nav-heading ">
                        <span>Tool</span>
                        @include('component.menu.tool')
                    </li>
                @endif

                @if (Auth::user()->canAny('manage-setting-general', 'manage-setting-advance', 'manage-setting-contact'))

                    <li class="nav-heading ">
                        <span>Setting</span>
                        @include('component.menu.setting')
                    </li>
                @endif


            </ul>
            <!-- END sidebar nav-->
        </nav>
    </div>
    <!-- END Sidebar (left)-->
</aside>
