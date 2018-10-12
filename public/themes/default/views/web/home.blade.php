@extends('layouts.default')


@section('title', t('company.name'))



@section('body')

    @component('component.dialog',['dialog' => $dialog])@endcomponent

    {!! $page->present()->body !!}

    @foreach($pages as $child)
        {!! $child->present()->body !!}
    @endforeach

<section class="home__highlight">
    <div class="container invisible" data-vp-remove-class="invisible" data-vp-add-class="animated fadeInUp">
        <div class="row no-gutters">
            <div class="col-12 col-lg-8 border--right">
                <div class="row no-gutters">
                    <div class="col-12">
                        <a class="card card--horizontal" href="/who-we-are/about-us/corporate-info.html">
                            <div class="card__image">
                                <img src="/themes/default/assets/static/images/home/corporate-info.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="card__body">
                                <h3 class="card__title">Corporate Info</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <div class="btn btn-primary">Read More</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 border--top-right">
                        <a class="card card--highlight" href="/who-we-are/about-us/award.html">
                            <div class="card__image">
                                <img src="/themes/default/assets/static/images/home/award.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="card__body">
                                <h3 class="card__title">Award & Recognitions</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <div class="btn btn-primary">Read More</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 border--top-right">
                        <a class="card card--highlight" href="/who-we-are/join-us/positions.html">
                            <div class="card__image">
                                <img src="/themes/default/assets/static/images/home/join-with-us.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="card__body">
                                <h3 class="card__title">Join with us</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <div class="btn btn-primary">Read More</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 border--top">
                <div class="card card--vertical">
                    <div class="card__image">
                        <img src="/themes/default/assets/static/images/home/customer-distribution.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="card__body">
                        <h3 class="card__title">Customer & Distribution</h3>

                        <div class="list-group list-group--dots">
                            <a class="list-group-item list-group-item-action" href="/what-we-do/customer-and-distribution/filling-plant.html">Filing Plant</a>
                            <a class="list-group-item list-group-item-action" href="/what-we-do/customer-and-distribution/auto-gas-station.html">Auto Gas Station</a>
                            <a class="list-group-item list-group-item-action" href="/what-we-do/customer-and-distribution/gas-retial-shop.html">Gas Retail Shop</a>
                            <a class="list-group-item list-group-item-action" href="/what-we-do/customer-and-distribution/industrial-sector.html">Industrial Sector</a>
                            <a class="list-group-item list-group-item-action" href="/what-we-do/customer-and-distribution/commercial-sector.html">Commercial Sector</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="home__news bg-gradient bg-banner" style="background-image: url(/themes/default/assets/static/images/banner/banner-invertor.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3 align-self-center invisible" data-vp-remove-class="invisible" data-vp-add-class="animated slideInLeft">
                <h2>WHAT'S NEWS</h2>
            </div>
            <div class="col-12 col-lg-9">
                <div class="owl-carousel owl-theme owl--news invisible" data-vp-remove-class="invisible" data-vp-add-class="animated fadeIn">
                    <div class="item">
                        <a class="card card--overlap" href="/who-we-are/csr/activities/index.html">
                            <div class="card__image">
                                <img src="/themes/default/assets/static/images/home/news-1.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="card__body">
                                <p class="card__category">CSR Activities</p>
                                <p class="card__title h4">completes sale of stake in Thailand's bongkot field to PTTEP</p>
                                <time class="datetime">01/07/2018</time>

                            </div>
                            <div class="card__footer">
                                <div class="btn btn-primary">Read More</div>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a class="card card--overlap" href="/news-and-media/news/index.html">
                            <div class="card__image">
                                <img src="/themes/default/assets/static/images/home/news-2.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="card__body">
                                <p class="card__category">Press Release</p>
                                <p class="card__title">completes sale of stake in Thailand's bongkot field to PTTEP</p>
                                <time class="datetime">01/07/2018</time>
                            </div>
                            <div class="card__footer">
                                <div class="btn btn-primary">Read More</div>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a class="card card--overlap" href="/news-and-media/video/index.html">
                            <div class="card__image">
                                <img src="/themes/default/assets/static/images/home/news-3.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="card__body">
                                <p class="card__category">VDO</p>
                                <p class="card__title">completes sale of stake in Thailand's bongkot field to PTTEP</p>
                                <time class="datetime">01/07/2018</time>
                            </div>
                            <div class="card__footer">
                                <div class="btn btn-primary">Read More</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
                        <img src="/themes/default/assets/static/images/home/quick-download.jpg" alt="" class="img-fluid">
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


