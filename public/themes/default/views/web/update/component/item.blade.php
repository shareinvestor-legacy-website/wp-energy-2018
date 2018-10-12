<div class="col-12 col-md-6 col-lg-4 mb-4">
    <a class="card card--news" href="{{$post->present()->file ?? $post->present()->url ?? action('Web\WebController@showUpdate', ['root'=>$root->slug, 'category'=>$category->slug, 'id'=>$post->id, 'title'=>$post->present()->title(true)])}}" target="{{$post->present()->file || $post->present()->url ? '_blank': '_self'}}">
        <div class="card__image">
            <img src="{{$post->present()->image('assets/static/images/default/news.jpg')}}" alt="" class="img-fluid">
        </div>
        <div class="card__body">
            <h4 class="card__title ellipsis">{{$post->present()->title}}</h4>
            <time class="datetime">{{$post->present()->date}}</time>
            <div class="card__footer">
                <span class="btn btn-primary">{{t('read.more')}}</span>
            </div>
        </div>
    </a>
</div>
