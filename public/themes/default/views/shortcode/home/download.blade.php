<div class="list-group list-group--download">

    @foreach($posts as $post)
    <a class="list-group-item list-group-item-action" href="{{$post->present()->file}}" target="_blank">
        <i class="icon-file fa-2x text-blue"></i> {{$post->present()->title}}
    </a>
    @endforeach

</div>
