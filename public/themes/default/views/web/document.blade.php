@extends('layouts.default')


@section('title', title($menu->present()->name, t('company.name')))

@component('component.breadcrumb', ['breadcrumbs'=>$menu->breadcrumbs()]) @endcomponent
@component('component.titlepage', ['title'=>$menu->present()->getTitle($sidebar)]) @endcomponent
@component('component.menu.sidebar', ['sidebar'=>$sidebar, 'subTitle'=> $menu->present()->name]) @endcomponent

@section('body')

<div class="container mb-5">

        @component('component.filter.year', compact('years', 'year', 'category'))
        @endcomponent

        <div id="year-{{$year}}">

            <div class="row">

                <div class="col-12">

                    @foreach ($posts as $post)

                        {!! $post->present()->body !!}

                    @endforeach

                </div>


            </div>

        </div>

    </div>

@stop



