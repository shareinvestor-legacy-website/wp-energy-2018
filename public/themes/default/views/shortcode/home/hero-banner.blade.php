<div class="owl-carousel owl-theme">

    @foreach ($posts as $post)

        @if($post->present()->isMp4)

            <div class="item-video" style="background-image: url({{ $post->present()->image }})">
                <video muted loop height="121%" preload="none">
                    <source src="{{ $post->present()->file ?? $post->present()->url }}" type="video/mp4">
                </video>
            </div>

        @else
            <div class="item" style="background-image: url({{ $post->present()->image }})"></div>
        @endif

    @endforeach

</div>
