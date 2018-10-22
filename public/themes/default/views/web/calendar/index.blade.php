@extends('layouts.default')


@section('title', title($menu->present()->name, t('company.name')))

@component('component.breadcrumb', ['breadcrumbs'=>$menu->breadcrumbs()]) @endcomponent
@component('component.titlepage', ['title'=>$menu->present()->getTitle($sidebar)]) @endcomponent
@component('component.menu.sidebar', ['sidebar'=>$sidebar, 'subTitle'=> $menu->present()->name]) @endcomponent

@section('body')


<section>


    {!! $category->present()->body !!}

    <div class="container mb-5">

        @component('component.filter.year', compact('years', 'year', 'category'))
        @endcomponent

        <div id="year-{{$year}}">
            <div class="table-responsive">
                <table class="table table--calendar">
                    <tbody>
                        <tr>
                            <th>{{t('date')}}</th>
                            <th>{{t('event')}}</th>
                            <th>{{t('detail')}}</th>
                        </tr>

                        @if($posts->count() > 0)

                            @foreach ($posts as $post)

                                @component('web.calendar.component.item', compact('post')) @endcomponent

                            @endforeach

                        @else
                        <tr>
                            <td colspan="3">{{t('no.event')}}</td>
                        </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@stop



