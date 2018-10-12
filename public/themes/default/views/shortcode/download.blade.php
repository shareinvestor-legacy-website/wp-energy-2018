@foreach ($posts as $post)
<div class="col-12 col-md-6 col-lg-4">
    <a href="{{$post->present()->file ?? $post->present()->url }}" target="_blank" class="card card--download mb-4">
        <div class="card__title ellipsis ellipsis-2">{{$post->present()->title}}</div>
        <div class="btn btn--download">{{t('download')}}</div>
    </a>
</div>
@endforeach
