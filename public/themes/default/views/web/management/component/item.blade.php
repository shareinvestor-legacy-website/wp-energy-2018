<div class="col-12 col-md-4 col-lg-3">
    <a class="card card--overlap card--people" href="{{action('Web\WebController@showManagement', ['root'=>$root,'category'=>$category->slug,'id'=>$post->id])}}">
        <div class="card__image">
            <img src="{{$post->present()->image('assets/static/images/default/board.png')}}" alt="" class="img-fluid">
        </div>
        <div class="card__body">

            <p class="card__title">{{$post->present()->title}}</p>

            <div class="card__detail">

                {!! $post->present()->excerpt !!}

            </div>

        </div>
    </a>
</div>
