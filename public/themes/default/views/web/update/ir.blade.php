@extends('layouts.default')


@section('title', title($menu->present()->name, t('company.name')))

@component('component.breadcrumb', ['breadcrumbs'=>$menu->breadcrumbs()]) @endcomponent
@component('component.titlepage', ['title'=>$title]) @endcomponent
@component('component.menu.sidebar', ['sidebar'=>$sidebar, 'subTitle'=> $menu->present()->name]) @endcomponent


@section('body')


<section>
    <div class="container mb-5">
        <form method="get">
            <div class="form-row justify-content-between mb-4">
                <div class="col-md-6 col-lg-7 mb-4 mb-md-0 ">
                    <div class="search">
                        <input type="text" name="search" value="" class="form-control" placeholder="search news">
                        <input type="submit" class="btn btn-success" value="Search">
                    </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="filter">
                            <label class="filter__title" for="year">Year: </label>
                            <div class="filter__selection">
                                <div class="filter__icon"><i class="icon-arrow-down"></i></div>
                                <select name="year" class="form-control filter__select" onchange="this.form.submit()">
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                            </select>
                            </div>
                        </div>
                    </div>
                </div>
        </form>


        <div class="row mt-5">
            <div class="col-12 col-lg-4 mb-4 d-fex">
                <a class="card card--border" href="javascript:;" target="_blank" rel="external">
                                <div class="card__body">
                                    <time class="datetime">01/07/2018</time>
                                    <p class="card__title">completes sale of stake in Thailand's bongkot field to PTTEP</p>
                                </div>
                                <div class="card__footer">
                                    <div class="btn btn-primary">Read More</div>
                                </div>
                            </a>
            </div>
            <div class="col-12 col-lg-4 mb-4 d-fex">
                <a class="card card--border" href="javascript:;" target="_blank" rel="external">
                                <div class="card__body">
                                    <time class="datetime">01/07/2018</time>
                                    <p class="card__title">completes sale of stake in Thailand's bongkot field to PTTEP</p>
                                </div>
                                <div class="card__footer">
                                    <div class="btn btn-primary">Read More</div>
                                </div>
                            </a>
            </div>
            <div class="col-12 col-lg-4 mb-4 d-fex">
                <a class="card card--border" href="javascript:;" target="_blank" rel="external">
                                    <div class="card__body">
                                        <time class="datetime">01/07/2018</time>
                                        <p class="card__title">completes sale of stake in Thailand's bongkot field to PTTEP</p>
                                    </div>
                                    <div class="card__footer">
                                        <div class="btn btn-primary">Read More</div>
                                    </div>
                                </a>
            </div>

            <div class="col-12 col-lg-4 mb-4 d-fex">
                <a class="card card--border" href="javascript:;" target="_blank" rel="external">
                                    <div class="card__body">
                                        <time class="datetime">01/07/2018</time>
                                        <p class="card__title">completes sale of stake in Thailand's bongkot field to PTTEP</p>
                                    </div>
                                    <div class="card__footer">
                                        <div class="btn btn-primary">Read More</div>
                                    </div>
                                </a>
            </div>
            <div class="col-12 col-lg-4 mb-4 d-fex">
                <a class="card card--border" href="javascript:;" target="_blank" rel="external">
                                    <div class="card__body">
                                        <time class="datetime">01/07/2018</time>
                                        <p class="card__title">completes sale of stake in Thailand's bongkot field to PTTEP</p>
                                    </div>
                                    <div class="card__footer">
                                        <div class="btn btn-primary">Read More</div>
                                    </div>
                                </a>
            </div>
            <div class="col-12 col-lg-4 mb-4 d-fex">
                <a class="card card--border" href="javascript:;" target="_blank" rel="external">
                                        <div class="card__body">
                                            <time class="datetime">01/07/2018</time>
                                            <p class="card__title">completes sale of stake in Thailand's bongkot field to PTTEP</p>
                                        </div>
                                        <div class="card__footer">
                                            <div class="btn btn-primary">Read More</div>
                                        </div>
                                    </a>
            </div>

            <div class="col-12 col-lg-4 mb-4 d-fex">
                <a class="card card--border" href="javascript:;" target="_blank" rel="external">
                                        <div class="card__body">
                                            <time class="datetime">01/07/2018</time>
                                            <p class="card__title">completes sale of stake in Thailand's bongkot field to PTTEP</p>
                                        </div>
                                        <div class="card__footer">
                                            <div class="btn btn-primary">Read More</div>
                                        </div>
                                    </a>
            </div>
            <div class="col-12 col-lg-4 mb-4 d-fex">
                <a class="card card--border" href="javascript:;" target="_blank" rel="external">
                                        <div class="card__body">
                                            <time class="datetime">01/07/2018</time>
                                            <p class="card__title">completes sale of stake in Thailand's bongkot field to PTTEPcompletes sale of stake in Thailand's bongkot field to PTTEP</p>
                                        </div>
                                        <div class="card__footer">
                                            <div class="btn btn-primary">Read More</div>
                                        </div>
                                    </a>
            </div>
            <div class="col-12 col-lg-4 mb-4 d-fex">
                <a class="card card--border" href="javascript:;" target="_blank" rel="external">
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

        <div class="page-navigation text-center pt-5">
            <ul class="pagination justify-content-center">
                <li class="page-item ">
                    <a class="page-link" href="javascript:void(0);" tabindex="-1"><span>&lsaquo;</span></a>
                </li>
                <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                <li class="page-item">
                    <a class="page-link" href="javascript:void(0);"><span>&rsaquo;</span></a>
                </li>
            </ul>
        </div>
    </div>


</section>


@stop

