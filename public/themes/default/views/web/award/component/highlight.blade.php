<div class="item">
    <div class="row">
        <div class="col-12 col-md-7">

            <h3 class="h2 text-white mb-3">{{$post->present()->alternate_title}}</h3>

            <h4>{{$post->present()->title}}</h4>

            {!! $post->present()->body !!}

        </div>
        <div class="col-12 col-md-5">
            <img class="img-fluid" src="{{$post->present()->image}}" alt="">
        </div>
    </div>
</div>
