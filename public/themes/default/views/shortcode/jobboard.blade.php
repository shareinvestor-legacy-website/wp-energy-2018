<div id="accordion-available-position" class="accordion">
    @foreach ($positions as $position)
    <div class="card">
        <div class="card-header collapsed" data-toggle="collapse" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" data-parent="#accordion-available-position" href="#callapse-{{$position->id}}">
            <a class="card-title">
                {{$position->present()->title}}
            </a>
        </div>
        <div id="callapse-{{$position->id}}" class="card-block collapse{{ $loop->first ? ' show' : '' }}" data-parent="#accordion-available-position">
            <div class="card-body">

                <h5 class="text-blue font-weight-medium">{{$position->present()->title}}</h5>

                @if($position->present()->description != null)

                <h5 class="font-weight-medium">{{t('responsibility')}}:</h5>

                {!! $position->present()->description !!}

                @endif

                @if($position->present()->qualification != null)

                <h5 class="font-weight-medium">{{t('qualification')}}:</h5>

                {!! $position->present()->qualification !!}

                @endif

                <p class="h5 mb-0">
                    <small class="font-weight-medium">
                        {{t('apply.yourself')}}
                    </small>
                </p>

                <p class="h5 mb-0">
                    <small class="font-weight-medium">
                        {!! t('email.jobboard') !!}
                    </small>
                </p>

            </div>
        </div>
    </div>
    @endforeach
</div>
