<div class="owl-carousel owl-theme owl--news">

    @foreach ($posts as $post)

    <div class="item">
        <a class="card card--overlap" href="{{$post->present()->file ?? $post->present()->url ?? action('Web\WebController@showUpdate', ['root'=>$post->category()->slug == 'csr-activities' ? 'who-we-are' : $root, 'category'=>$post->category()->slug, 'id'=>$post->id, 'title'=>$post->present()->title(true)])}}" target="{{$post->present()->file || $post->present()->url ? '_blank': '_self'}}">

            <div class="card__image">
                <img src="{{$post->present()->image('assets/static/images/default/news.jpg')}}" alt="" class="img-fluid">
            </div>

            <div class="card__body">
                <p class="card__category">{{$post->category()->present()->name}}</p>
                <h4 class="card__title">
                    {{$post->present()->title}}
                </h4>
                <time class="datetime">{{$post->present()->date}}</time>

            </div>

            <div class="card__footer">
                <span class="btn btn-primary">{{t('read.more')}}</span>
            </div>

        </a>
    </div>

    @endforeach

</div>
