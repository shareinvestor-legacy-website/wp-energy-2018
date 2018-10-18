<div>
    <em>{{t('share')}}: </em>
    <a class="px-1" href="{{$post->present()->facebookUrl($action)}}" target="_blank">
        <i class="fab fa-facebook-f"></i>
    </a>
    <a class="px-1" href="{{$post->present()->twitterUrl($action)}}" target="_blank">
        <i class="fab fa-twitter"></i>
    </a>
    <a class="px-1" href="{{$post->present()->lineUrl($action)}}" target="_blank">
        <i class="fab fa-line"></i>
    </a>
</div>
