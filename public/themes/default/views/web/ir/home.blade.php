@extends('layouts.default')


@section('title', t('company.name'))


@section('body')

    {!! $page->present()->body !!}

    {{-- <section class="highlight">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-12 col-lg-8 col--left">
                    <div class="row no-gutters">
                        <div class="col-12 col-sm-6 col--middle">
                            <div class="stock">
                                <div class="row">
                                    <div class="col mr-auto">
                                        <h3 class="mb-3">Stock Price</h3>
                                    </div>
                                    <div class="col-auto"><a href="javascript:;" class="btn btn-secondary" target="_blank" rel="external">View all</a></div>
                                </div>
                                <div class="row align-items-center">

                                </div>
                            </div>
                            <div class="slide">
                                <div class="row">
                                    <div class="col mr-auto">
                                        <h3 class="mb-3">Presentation</h3>
                                    </div>
                                    <div class="col-auto"><a href="javascript:;" class="btn btn-secondary" target="_blank" rel="external">View all</a></div>
                                </div>
                                <div class="slide__image">
                                    <img src="/storage/ir-home/banner/cover-presentation.jpg" alt="" class="img-fluid">
                                </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="announcements">
                                    <div class="row">
                                        <div class="col mr-auto">
                                            <h3 class="mb-3">SET Announcements</h3>
                                        </div>
                                        <div class="col-auto"><a href="javascript:;" class="btn btn-secondary" target="_blank" rel="external">View all</a></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-12 mb-4">
                                            <a class="card" href="javascript:;" target="_blank" rel="external">
                                                <div class="card__body">
                                                    <time class="datetime">01/07/2018</time>
                                                    <p class="card__title">completes sale of stake in Thailand's bongkot field to PTTEP</p>
                                                </div>
                                                <div class="card__footer">
                                                    <div class="btn btn-primary">Read More</div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-12 col-lg-12 mt-4">
                                            <a class="card" href="javascript:;" target="_blank" rel="external">
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
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col--right">
                        <div class="card card--vertical">
                            <div class="card__image">
                                <img src="/storage/ir-home/banner/cover-event.jpg" alt="" class="img-fluid">
                        </div>
                                <div class="card__body">
                                    <h3 class="card__title">Upcoming Event</h3>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <i class="icon icon-calendar"></i>
                                        </div>
                                        <div class="col-lg-9">
                                            <p class="datetime">01/07/2018</p>
                                            <h5>Opportunity Day for Q2/2018 Performance</h5>
                                            <p>Time : 9.00 - 10.00 hrs.</p>
                                            <p>At: Meeting Room 603, The Stock Exchange of Thailand</p>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <a class="link" href="javascript:;" target="_blank" rel="external">
                                            <div class="btn btn-primary">More Event</div>

                                          </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>

    <section class="download">
        <div class="container">
            <h2 class="h1 text-blue pb-2 mb-4">IR Download</h2>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card card--overlap">
                        <div class="card__image">
                            <img src="/storage/ir-home/banner/cover-fs.jpg" alt="" class="img-fluid">
                                </div>
                            <div class="card__body justify-content-center">
                                <a class="list-group-item" href="#">
                                    <i class="icon-bars fa-2x text-blue"></i> Financial Statement Q1/2018
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4">
                        <div class="card card--overlap">
                            <div class="card__image">
                                <img src="/storage/ir-home/banner/cover-form561.jpg" alt="" class="img-fluid">
                            </div>
                                <div class="card__body">
                                    <a class="list-group-item" href="#">
                                        <i class="icon-presentation fa-2x text-blue"></i> Form 56-1 2017</a>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="card card--overlap">
                                <div class="card__image">
                                    <img src="/storage/ir-home/banner/cover-ar.jpg" alt="" class="img-fluid">
                                </div>
                                    <div class="card__body">
                                        <a class="list-group-item" href="#">
                                            <i class="icon-file fa-2x text-blue"></i> Annual Report 2017</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

    </section>

    <section class="contact">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-7">
                    <h3 class="mb-3">IR Contact</h3>
                    <p class="h5">1 East Water Building 15th Floor, Soi 5 Vipavadeerangsit Rd, Jatujak, Bangkok 10900</p>
                    <div class="contact__icon">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <i class="icon-call fa-2x"></i> 0 2272 3333</div>
                            <div class="col-auto"><i class="icon-telephone fa-2x"></i> 0 2272 0641, 0 2272 0713</div>
                            <div class="col-auto"><i class="icon-email fa-2x"></i> <a href="mailto:ir@wp-energy.co.th">ir@wp-energy.co.th</a></div>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-lg-4 offset-lg-1">
                    <h3 class="mb-3">Email Alert</h3>
                    <p class="h5">Update with all the latest announcements</p>
                    <a href="#" class="btn btn-success" >Subscribe</a>
                </div>
            </div>
        </div>
    </section> --}}

@stop


@push('style')

    {!! isset($page) ? $page->present()->custom_css : '' !!}

@endpush


@push('script')

    {!! isset($page) ? $page->present()->custom_js : '' !!}

@endpush


