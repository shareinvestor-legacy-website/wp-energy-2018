

<li data-id="{{$page->id}}" class="dd-item dd3-item">
    <div class="dd-handle dd3-handle">Drag</div>
    <div class="dd3-content">{{$page->title}}</div>

    @if($page->hasChildren())
        <ol class="dd-list">
            @foreach($page->children()->get() as $page)
                @include('web.page.ordering-item',$page)
            @endforeach
        </ol>
    @endif
</li>
