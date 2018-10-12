<ul class="navbar-nav menu__lv1">

    @foreach($menus->getChildren(true) as $menu)

        @if($menu->isLeaf())

        <li class="nav-item">
            <a class="nav-link{{$menu->present()->isActive ? ' active' : ''}}" href="{{$menu->present()->url}}" target="{{$menu->present()->external_url_target}}">
                {{$menu->present()->name}}
            </a>
        </li>

        @else

        <li class="nav-item dropdown">

            <a class="nav-link dropdown-toggle" href="javascript:;" data-toggle="dropdown" aria-expanded="false">
                {{$menu->present()->name}}
            </a>

            <div class="dropdown-menu">
                <div class="container">
                    <div class="row">

                        <div class="col-12 col-xl-4 d-xl-block d-none">
                            <div class="menu__content">

                                <p class="menu__title">
                                    {{$menu->present()->name}}
                                </p>

                                <img src="{{theme_url("assets/static/images/default/menu/{$menu->present()->slug}.jpg")}}" alt="" class="img-fluid">

                                <p class="menu__text">
                                    {!! t("menu.description.{$menu->present()->getSlugWithDot}") !!}
                                </p>

                            </div>
                        </div>

                        <div class="col-12 col-xl-4">
                            <ul class="navbar-nav menu__lv2">

                                @foreach($menu->getChildren(true) as $child)

                                    @if($child->isLeaf())

                                    <li class="nav-item">
                                        <a class="nav-link{{$child->present()->isActive ? ' active' : ''}}" href="{{$child->present()->url}}" target="{{$child->present()->external_url_target}}">

                                            {{$child->present()->name}}

                                        </a>
                                    </li>

                                    @else

                                    <li class="nav-item dropdown">

                                        <a href="javascript:;" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >

                                            {{$child->present()->name}}

                                        </a>

                                        <div class="dropdown-menu menu__lv3">

                                            @foreach($child->getChildren(true) as $grandChild)

                                                <a class="dropdown-item{{$grandChild->present()->isActive ? ' active' : ''}}" href="{{$grandChild->present()->url}}" target="{{$grandChild->present()->external_url_target}}">
                                                    {{$grandChild->present()->name}}
                                                </a>

                                            @endforeach

                                        </div>

                                    </li>

                                    @endif

                                @endforeach

                            </ul>
                        </div>

                    </div>
                </div>
            </div>

        </li>

        @endif

    @endforeach


    <li class="nav-item">

        @if(locale() == 'en')
        <a class="nav-link" href="{{localized_url(null,null,null,'th')}}"><span class="circle">TH</span></a>
        @else
        <a class="nav-link" href="{{localized_url(null,null,null,'en')}}"><span class="circle">EN</span></a>
        @endif
    </li>



</ul>
