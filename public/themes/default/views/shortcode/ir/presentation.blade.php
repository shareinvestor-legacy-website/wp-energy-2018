@isset($post)
<div class="slide__image">
    <a href="{{$post->present()->file}}" target="_blank">
        <img src="{{$post->present()->image}}" alt="" class="img-fluid">
    </a>
</div>
@endisset
