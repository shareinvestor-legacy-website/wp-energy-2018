@section('breadcrumb')

<nav class="page__breadcrumb" aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{localized_url('home')}}">{{t('home')}}</a></li>
            @foreach ($breadcrumbs as $breadcrumb)
            <li class="breadcrumb-item{{$loop->last ? ' active' : ''}}"{{$loop->last ? ' aria-current="page"' : ''}} ><a href="javascript:;">{{$breadcrumb->present()->getTitle()}}</a></li>
            @endforeach
        </ol>
    </div>
</nav>


@stop
