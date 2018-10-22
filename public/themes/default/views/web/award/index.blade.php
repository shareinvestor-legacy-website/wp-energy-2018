@extends('layouts.default')


@section('title', title($menu->present()->name, t('company.name')))

@component('component.breadcrumb', ['breadcrumbs'=>$menu->breadcrumbs()]) @endcomponent
@component('component.titlepage', ['title'=>$menu->present()->getTitle($sidebar)]) @endcomponent
@component('component.menu.sidebar', ['sidebar'=>$sidebar, 'subTitle'=> $menu->present()->name]) @endcomponent


@section('body')


@if($highlights->count() > 0)
<section class="bg-gradient pt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="owl-carousel owl--singular owl--dots-left">

                    @foreach ($highlights as $post)

                        @component('web.award.component.highlight', compact('post')) @endcomponent

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
@endif

<section class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">

            <div class="list-group list-group-flush list-group--content">

                @foreach ($posts as $post)

                    @component('web.award.component.item', compact('post')) @endcomponent

                @endforeach

            </div>

        </div>
    </div>
</section>

@stop

