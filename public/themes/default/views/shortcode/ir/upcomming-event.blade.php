@isset($post)
<p class="datetime">{{$post->present()->date}}</p>
<h5>{{$post->present()->title}}</h5>

{!! $post->present()->excerpt !!}
@endisset
