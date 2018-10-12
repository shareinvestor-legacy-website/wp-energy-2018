<div class="list-group-item">
    <dl class="row">

        <dt class="col-12 col-sm-3">
            <p class="h5 text-blue">{{$post->present()->alternate_title}}</p>
        </dt>

        <dd class="col-12 col-sm-9 mb-1">

            <h5>{{$post->present()->title}}</h5>

            {!! $post->present()->body !!}

        </dd>

    </dl>
</div>
