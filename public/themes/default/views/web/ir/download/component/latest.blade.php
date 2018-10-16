@if(isset($post))
<div class="card card--gradient">
    <div class="card__image">
        <img src="{{theme_url("assets/static/images/default/download/{$post->present()->category}.jpg")}}" alt="" class="img-fluid">
    </div>
    <div class="card__body justify-content-center">
        <h3>{{$post->present()->title}}</h3>
        <a href="{{$post->present()->file}}" target="_blank">
            {{t('download')}} <i class="icon-download"></i>
        </a>
{{$post->present()->category}}
    </div>
</div>
@endif
