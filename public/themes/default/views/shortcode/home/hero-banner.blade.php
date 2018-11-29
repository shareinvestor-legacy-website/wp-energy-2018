<div class="owl-carousel owl-theme">

    @foreach ($posts as $post)

        @if($post->present()->isMp4)

            <div class="item-video">
                <video autoplay muted loop height="100%" preload="none" poster="{{ $post->present()->image }}">
                    <source src="{{ $post->present()->file ?? $post->present()->url }}" type="video/mp4">
                </video>
            </div>

        @else
            <div class="item" style="background-image: url({{ $post->present()->image }})"></div>
        @endif

    @endforeach

</div>
