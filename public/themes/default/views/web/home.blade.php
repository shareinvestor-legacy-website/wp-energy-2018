@extends('layouts.default')


@section('title', t('company.name'))



@section('body')

    @component('component.dialog',['dialog' => $dialog])@endcomponent

    {!! $page->present()->body !!}

    @foreach($pages as $child)
        {!! $child->present()->body !!}
    @endforeach


<section class="home__ir">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h2 class="h1 text-blue mb-4">IR CORNER</h2>
                <div class="stock">
                    <div class="stock__date">
                        <h3>Stock Price</h3>
                        <p class="stock--datetime">Last updated <time class="d-inline-block">28 Aug 14:11</time></p>
                    </div>
                    <div class="stock__symbol">
                        <p>SET Symbol</p>
                        <p>WP</p>
                    </div>
                    <div class="stock__value">
                        <p><span class="stock__text stock__text--bold">7.70</span> <span class="stock__text stock__text--semibold">THB</span></p>
                    </div>
                    <div class="stock__change">
                        <p class="mb-2">Change (%Change)</p>
                        <p>0.20 (2.67%)</p>
                    </div>
                </div>
                <div class="announcements">
                    <div class="row">
                        <div class="col mr-auto">
                            <h3 class="mb-3">SET Announcements</h3>
                        </div>
                        <div class="col-auto"><a href="javascript:;" class="btn btn-secondary">Read More</a></div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6 mb-4">
                            <a class="card" href="javascript:;">
                                <div class="card__body">
                                    <time class="datetime">01/07/2018</time>
                                    <p class="card__title">completes sale of stake in Thailand's bongkot field to PTTEP</p>
                                </div>
                                <div class="card__footer">
                                    <div class="btn btn-primary">Read More</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-lg-6 mb-4">
                            <a class="card" href="javascript:;">
                                <div class="card__body">
                                    <time class="datetime">01/07/2018</time>
                                    <p class="card__title">completes sale of stake in Thailand's bongkot field to PTTEP</p>
                                </div>
                                <div class="card__footer">
                                    <div class="btn btn-primary">Read More</div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 col-md-8 col-lg-4">
                <div class="card card--overlap">
                    <div class="card__image">
                        <img src="/storage/home/quick-download.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="card__body">
                        <h3 class="card__title">Quick Download</h3>

                        <div class="list-group list-group--download">
                            <a class="list-group-item list-group-item-action" href="/who-we-are/csr/download.html"><i class="icon-file fa-2x text-blue"></i> Annual Report 2017</a>
                            <a class="list-group-item list-group-item-action" href="/ir/financial-information/financial-statements.html"><i class="icon-presentation fa-2x text-blue"></i> Form 56-1 2017</a>
                            <a class="list-group-item list-group-item-action" href="/ir/financial-information/financial-statements.html"><i class="icon-bars fa-2x text-blue"></i> Financial Statement Q1/2018</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop


@push('style')
    {!! isset($page) ? $page->present()->custom_css : '' !!}
    @foreach($pages as $child)
        {!! $child->present()->custom_css !!}
    @endforeach
@endpush


@push('script')
    {!! isset($page) ? $page->present()->custom_js : '' !!}
    @foreach($pages as $child)
        {!! $child->present()->custom_js !!}
    @endforeach
@endpush


