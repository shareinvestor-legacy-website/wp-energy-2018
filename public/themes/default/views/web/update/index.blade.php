@extends('layouts.default')


@section('title', title($menu->present()->name, t('company.name')))

@component('component.breadcrumb', ['breadcrumbs'=>$menu->breadcrumbs()]) @endcomponent
@component('component.titlepage', ['title'=>$menu->present()->getTitle($sidebar)]) @endcomponent
@component('component.menu.sidebar', ['sidebar'=>$sidebar, 'subTitle'=> $menu->present()->name]) @endcomponent


@section('body')

<section>
    <div class="container mb-5">

        @component('component.filter.year', compact('years', 'year', 'category'))
        @endcomponent

        <div class="row">

            @foreach ($posts as $post)

                @component('web.update.component.item', compact('post', 'category', 'root')) @endcomponent

            @endforeach

        </div>

        @component('component.filter.pagination', compact('posts', 'year')) @endcomponent

    </div>

</section>

@stop

