<div class="col-xs-12 col-lg-4 mb-4">
    <div class="card card--publication">
        <div class="row no-gutters">
            <div class="col-md-6">
                <div class="card-cover" style="background-image: url('{{$post->present()->image('assets/static/images/default/report.jpg')}}'); "></div>
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <h4 class="card__title">
                        {{$post->present()->title}}
                    </h4>
                    @if($post->present()->file != null)
                    <a href="{{$post->present()->file}}" target="_blank" class="btn btn-secondary">
                        {{t('download')}} <i class="icon-download"></i>
                    </a>
                    @endif

                    @if($post->present()->url != null)
                    <hr>
                    <a href="{{$post->present()->url}}" target="_blank" class="btn btn-secondary">
                        {{t('view.online')}} <i class="icon-book"></i>
                    </a>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
