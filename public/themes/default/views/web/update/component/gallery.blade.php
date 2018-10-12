@isset($gallery)
<div class="row justify-content-center mb-3">
    <div class="col-8 col-lg-9">
        <div class="owl-carousel owl--garelly">

            @foreach($gallery->images as $image)

            <div class="item">
                <a href="{{$image->present()->path}}" class="image-popup-no-margins">
                    <img src="{{$image->present()->path}}" alt="">
                </a>
            </div>

            @endforeach

        </div>
    </div>
</div>
@endif
