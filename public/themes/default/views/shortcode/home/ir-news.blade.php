@foreach ($posts as $post)
<div class="col-12 col-lg-6 mb-4">
    <a class="card" href="{{$post->present()->is_html ? action('Web\WebController@showIrUpdate', ['slug'=> 'set-announcements', 'id'=>$post->id, 'title'=>$post->present()->title(true)]) : $post->present()->url}}" target="{{$post->present()->is_html ? '_self' : '_blank'}}">
        <div class="card__body">
            <time class="datetime">
                {{$post->present()->date}}
            </time>
            <h5 class="card__title">
                {{$post->present()->title}}
            </h5>
        </div>
        <div class="card__footer">
            <span class="btn btn-primary">{{t('read.more')}}</span>
        </div>
    </a>
</div>
@endforeach
