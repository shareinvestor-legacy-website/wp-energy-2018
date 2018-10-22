@extends('layouts.default')


@section('title', title($menu->present()->name, t('company.name')))

@component('component.breadcrumb', ['breadcrumbs'=>$menu->breadcrumbs()]) @endcomponent
@component('component.titlepage', ['title'=>$menu->present()->getTitle($sidebar)]) @endcomponent
@component('component.menu.sidebar', ['sidebar'=>$sidebar, 'subTitle'=> $menu->present()->name]) @endcomponent


@section('body')

    <section>
        <div class="container">

            <div class="row mb-5">

                @foreach ($posts as $post)

                    @component('web.report.component.item', compact('post')) @endcomponent

                @endforeach

            </div>

        </div>
    </section>

@stop

