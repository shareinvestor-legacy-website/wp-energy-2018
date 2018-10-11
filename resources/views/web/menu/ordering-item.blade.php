

<li data-id="{{$menu->id}}" class="dd-item dd3-item">
    <div class="dd-handle dd3-handle">Drag</div>
    <div class="dd3-content">{{$menu->name}}</div>

    @if($menu->hasChildren())
        <ol class="dd-list">
            @foreach($menu->children()->get()->load('translations') as $menu)
                @include('web.menu.ordering-item',$menu)
            @endforeach
        </ol>
    @endif
</li>
