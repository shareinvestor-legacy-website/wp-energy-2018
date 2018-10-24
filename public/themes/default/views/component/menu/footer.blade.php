<ul class="nav">

    @foreach($menus as $menu)
    <li class="nav-item">
        <a class="nav-link{{$menu->present()->isActive ? ' active' : ''}}" href="{{$menu->present()->url}}" target="{{$menu->present()->external_url_target}}">
            {{$menu->present()->name}}
        </a>
    </li>
    @endforeach

</ul>
