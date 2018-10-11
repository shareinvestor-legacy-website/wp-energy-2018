

<li data-id="{{$category->id}}" class="dd-item dd3-item">
    <div class="dd-handle dd3-handle">Drag</div>
    <div class="dd3-content">{{$category->name}}</div>

    @if($category->hasChildren())
        <ol class="dd-list">
            @foreach($category->children()->get()->load('translations') as $category)
                @include('web.category.ordering-item',$category)
            @endforeach
        </ol>
    @endif
</li>
