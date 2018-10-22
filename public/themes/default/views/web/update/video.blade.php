@extends('layouts.default')


@section('title', title($menu->present()->name, t('company.name')))

@component('component.breadcrumb', ['breadcrumbs'=>$menu->breadcrumbs()]) @endcomponent
@component('component.titlepage', ['title'=>$menu->present()->name]) @endcomponent

@section('body')

<section>
    <div class="container mb-5">

        @component('component.filter.year-all', compact('years', 'year', 'category'))
        @endcomponent

        <div class="row">

            @foreach ($posts as $post)
            <div class="col-12 col-md-6 col-lg-4">
                <a class="card card--vdo mb-4" href="{{$post->present()->url ?? $post->present()->file}}">
                    <div class="card__image">
                        <img src="{{$post->present()->image('assets/static/images/default/news.jpg')}}" alt="" class="img-fluid">
                    </div>
                    <div class="card__body">
                        <h4 class="card__title ellipsis">{{$post->present()->title}}</h4>
                        <time class="datetime">{{$post->present()->date}}</time>
                        <div class="card__footer"></div>
                    </div>
                </a>
            </div>
            @endforeach

        </div>

        @component('component.filter.pagination', compact('posts', 'year')) @endcomponent

    </div>

</section>

@stop

