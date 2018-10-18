<div id="accordion-{{$category->slug}}" class="accordion">
    @foreach ($posts as $post)
    <div class="card">
        <div class="card-header collapsed" data-toggle="collapse" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" data-parent="#accordion-{{$category->slug}}" href="#callapse-{{$post->id}}">
            <a class="card-title">
                {{$post->present()->title}}
            </a>
        </div>
        <div id="callapse-{{$post->id}}" class="card-block collapse{{ $loop->first ? ' show' : '' }}" data-parent="#accordion-{{$category->slug}}">
            <div class="card-body">
                {!! $post->present()->body !!}
            </div>
        </div>
    </div>
    @endforeach
</div>
