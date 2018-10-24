@extends('layouts.default')


@section('title', title($menu->present()->name, t('company.name')))

@component('component.breadcrumb', ['breadcrumbs'=>$menu->breadcrumbs()]) @endcomponent
@component('component.titlepage', ['title'=>$menu->present()->getTitle()]) @endcomponent


@section('body')

    <section>
        <div class="container mb-5">

            @component('component.filter.year-ir', compact('years', 'year', 'search'))
            @endcomponent

            <div class="row mt-5">

                @foreach ($posts as $post)
                <div class="col-12 col-lg-4 mb-4 d-fex">
                    <a class="card card--border" href="{{$post->present()->is_html ? action('Web\WebController@showIrUpdate', ['slug'=> $slug, 'id'=>$post->id, 'title'=>$post->present()->title(true)]) : $post->present()->url}}" target="{{$post->present()->is_html ? '_self' : '_blank'}}">
                        <div class="card__body">
                            <time class="datetime">
                                {{$post->present()->date}}
                            </time>
                            <h5 class="card__title">
                                {{$post->present()->title}}
                            </h5>
                        </div>
                        <div class="card__footer">
                            <span class="btn btn-primary">{{t('read.more')}}</span>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

            @component('component.filter.pagination', compact('posts', 'year')) @endcomponent

        </div>

    </section>


@stop

