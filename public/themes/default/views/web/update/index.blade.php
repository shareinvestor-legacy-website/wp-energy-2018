@extends('layouts.default')


@section('title', title($menu->present()->name, t('company.name')))

@component('component.breadcrumb', ['breadcrumbs'=>$menu->breadcrumbs()]) @endcomponent
@component('component.titlepage', ['title'=>$title]) @endcomponent
@component('component.menu.sidebar', ['sidebar'=>$sidebar, 'subTitle'=> $menu->present()->name]) @endcomponent


@section('body')

<section>
    <div class="container mb-5">

        @component('component.filter.year', compact('years', 'year', 'root', 'category', 'hasFilterAll'))
        @endcomponent

        <div class="row">

            @foreach ($posts as $post)

                @component('web.update.component.item', compact('post', 'category', 'root')) @endcomponent

            @endforeach

        </div>

        <div class="page-navigation text-center pt-5">

            {{ $posts->appends(['year'=>$year])->links() }}

        </div>
    </div>

</section>

@stop

