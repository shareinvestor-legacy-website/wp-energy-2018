@foreach($posts as $post)
<div class="col-12 col-md-12 col-lg-4">
    <div class="card card--overlap">
        <div class="card__image">
            <img src="{{theme_url("assets/static/images/default/ir/home-{$post->present()->category}.jpg")}}" alt="" class="img-fluid">
        </div>
        <div class="card__body justify-content-center">
            <a class="list-group-item" href="{{$post->present()->file}}" target="_blank">
                <i class="icon-{{$post->present()->category}} fa-2x text-blue"></i>
                {{$post->present()->title}}
            </a>
        </div>
    </div>
</div>
@endforeach
