@extends('layouts.default')


@section('title', title($menu->present()->name, t('company.name')))

@component('component.breadcrumb', ['breadcrumbs' => $menu->breadcrumbs()])@endcomponent
@component('component.titlepage', ['title' => $menu->present()->getTitle($sidebar)])@endcomponent
@component('component.menu.sidebar', ['sidebar' => $sidebar, 'subTitle' => $menu->present()->name])@endcomponent


@section('body')

    <section>
        <div class="container">

            <div class="row mb-5">

                @foreach ($posts as $post)
                    <div class="col-12 col-md-6 col-lg-4 mb-4 ">
                        <div class="card card--publication">
                            <div class="row no-gutters">
                                <div class="col-md-6">
                                    <div class="card-cover"
                                        style="background-image: url('{{ $post->present()->image('assets/static/images/default/report.jpg') }}'); ">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h4 class="card__title">
                                            {{ $post->present()->title }}
                                        </h4>
                                        @if ($post->present()->file != null)
                                            <a href="{{ $post->present()->file }}" target="_blank"
                                                class="btn btn-secondary">
                                                {{ t('download') }} <i class="icon-download"></i>
                                            </a>
                                        @endif

                                        @if ($post->present()->url != null)
                                            <hr>
                                            <a href="{{ $post->present()->url }}" target="_blank" class="btn btn-secondary">
                                                {{ t('view.online') }} <i class="icon-book"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach


                @if ($reports)
                    @foreach ($reports as $report)
                        <div class="col-12 col-md-6 col-xl-4 mb-4 ">
                            <div class="card card--publication">
                                <div class="row no-gutters h-100">
                                    <div class="col-md-6">
                                        <div class="card-cover"
                                            style="background-image: url('{{ $report->first()->present()->image('assets/static/images/default/report.jpg') }}'); ">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body card-body--small">
                                            @foreach ($report as $item)
                                                <h4 class="card__title">
                                                    {{ $item->present()->title }}
                                                </h4>
                                                @if ($item->present()->file != null)
                                                    <a href="{{ $item->present()->file }}" target="_blank"
                                                        class="btn btn-secondary">
                                                        {{ t('download') }} <i class="icon-download"></i>
                                                    </a>
                                                @endif

                                                @if ($item->present()->url != null)
                                                    <hr>
                                                    <a href="{{ $item->present()->url }}" target="_blank"
                                                        class="btn btn-secondary">
                                                        {{ t('view.online') }} <i class="icon-book"></i>
                                                    </a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>

        </div>
    </section>

@stop
