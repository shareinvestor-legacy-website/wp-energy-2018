@extends('layouts.default')


@section('title', title($menu->present()->name, t('company.name')))

@component('component.breadcrumb', ['breadcrumbs'=>$menu->breadcrumbs()]) @endcomponent
@component('component.titlepage', ['title'=>$title]) @endcomponent


@section('body')

<section>
    <div class="container mb-5">

        @component('component.filter.year-all', compact('years', 'year', 'root', 'category')) @endcomponent

        <div class="row">
            @foreach ($posts as $post)
            <div class="col-12 col-md-12 col-lg-4">
                <div class="card card--mix">
                    <div class="card__image">
                        <img src="{{$post->present()->image}}" alt="" class="img-fluid">
                    </div>
                    <div class="card__body">
                        <h4 class="card__title pb-3">{{$post->present()->title}}</h4>

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
            @endforeach
        </div>
    </div>
</section>

@stop

