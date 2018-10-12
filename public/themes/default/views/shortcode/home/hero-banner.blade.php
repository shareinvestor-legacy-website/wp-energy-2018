<div class="owl-carousel owl-theme">

    @foreach ($posts as $post)

        <div class="item" style="background-image: url({{$post->present()->image}})"></div>

    @endforeach

</div>
