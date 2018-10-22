@extends('layouts.default')


@section('title', title($menu->present()->name, t('company.name')))

@component('component.breadcrumb', ['breadcrumbs'=>$menu->breadcrumbs()]) @endcomponent
@component('component.titlepage', ['title'=>$menu->present()->getTitle($sidebar)]) @endcomponent
@component('component.menu.sidebar', ['sidebar'=>$sidebar, 'subTitle'=> $menu->present()->name]) @endcomponent


@section('body')


<section>
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-8 col-sm-10 mb-5">
                <div class="owl-carousel owl--linear-gradient">

                    @foreach ($posts as $post)

                    <div id="list-{{$post->slug}}" class="item{{$loop->first ? ' show' : ''}}">
                        {{$post->present()->title}}
                    </div>

                    @endforeach

                </div>
            </div>

            <div class="col-12 col-lg-10">
                <div class="milestone-lists">

                    @foreach ($posts as $post)

                    <div id="year-{{$post->slug}}" class="list-group list-group-flush list-group--content{{$loop->first ? ' show' : ''}}">

                        {!! $post->present()->body !!}

                    </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>

</section>


@stop

