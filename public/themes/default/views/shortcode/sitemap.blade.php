<div class="container mb-5">
    <div class="row">
        <div class="col-12">

            <ul class="nav nav--sitemap">

                @foreach($menus as $menu)

                    @if($menu->isLeaf())

                        <li class="nav-item">
                            <a class="nav-link{{$menu->present()->isActive ? ' active' : ''}}" href="{{$menu->present()->url}}" target="{{$menu->present()->external_url_target}}">
                                {{$menu->present()->name}}
                            </a>
                        </li>

                    @else

                        <li class="nav-item">

                            <a class="nav-link" href="javascript:;" data-toggle="dropdown" aria-expanded="false">
                                {{$menu->present()->name}}
                            </a>

                            <ul class="nav nav__lv-2">

                                @foreach($menu->getChildren(true) as $child)

                                    @if($child->isLeaf() || $child->hasTag('has-sidebar'))

                                        <li class="nav-item">
                                            <a class="nav-link{{$child->present()->isActive ? ' active' : ''}}" href="{{$child->present()->url}}" target="{{$child->present()->external_url_target}}">

                                                {{$child->present()->name}}

                                            </a>
                                        </li>

                                    @else

                                        <li class="nav-item">

                                            <a href="javascript:;" class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                                {{$child->present()->name}}
                                            </a>

                                            <ul class="nav nav__lv-3">

                                                @foreach($child->getChildren(true) as $grandChild)

                                                    <li class="nav-item">
                                                        <a class="nav-link {{$grandChild->present()->isActive ? ' active' : ''}}" href="{{$grandChild->present()->url}}" target="{{$grandChild->present()->external_url_target}}">
                                                            {{$grandChild->present()->name}}
                                                        </a>
                                                    </li>

                                                @endforeach

                                            </ul>

                                        </li>

                                    @endif

                                @endforeach

                            </ul>
                        </li>

                    @endif

                @endforeach

            </ul>
        </div>
    </div>
</div>
