@extends('layouts.default')


@section('title', title($menu->present()->name, t('company.name')))

@component('component.breadcrumb', ['breadcrumbs'=>$menu->breadcrumbs()]) @endcomponent
@component('component.titlepage', ['title'=>$menu->present()->getTitle($sidebar)]) @endcomponent
@component('component.menu.sidebar', ['sidebar'=>$sidebar, 'subTitle'=> $menu->present()->name]) @endcomponent


@section('body')

    <div class="container">

        <div class="row mt-5 pt-4">

            @foreach ($posts as $post)
                @component('web.management.component.item', compact('post', 'category'))@endcomponent
            @endforeach


        </div>

    </div>

@stop

