@section('sidebar')

    @if($sidebar != null && $sidebar->hasTag('has-sidebar'))

    <aside class="container">

        <nav class="navbar navbar-expand-xl navbar--blue mb-4">

            <a class="navbar-toggler" data-toggle="collapse" data-target="#submenu" aria-controls="submenu" aria-expanded="false" aria-label="Toggle submenu">
                {{$subTitle}}
                <i class="fas fa-angle-down"></i>
            </a>

            <div class="collapse navbar-collapse" id="submenu">
                <ul class="navbar-nav">
                    @foreach ($sidebar->getChildren(true) as $menu)
                    <li class="nav-item">
                        <a class="nav-link{{$menu->present()->isActive ? ' active' : ''}}" href="{{$menu->present()->url}}" target="{{$menu->present()->external_url_target}}">
                            {{$menu->present()->name}}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </nav>

        <h3 class="h2 text-black mb-4">{{$subTitle}}</h3>

    </aside>

    @endif

@stop
