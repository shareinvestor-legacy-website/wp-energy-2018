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
            <div class="col-12 col-md-12 col-lg-4">

                @component('web.ir.download.component.latest', ['post'=>$latest]) @endcomponent

            </div>
            <div class="col-12 col-md-12 col-lg-8">
                <div class="table-responsive">
                    <table class="table table--download">
                        <tbody>
                            <tr>
                                <th>{{t('year')}}</th>
                                <th>{{t('file.size')}}</th>
                                <th>{{t('download')}}</th>
                            </tr>

                            @foreach ($posts as $post)

                                @component('web.ir.download.component.item', compact('post')) @endcomponent

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>

</section>

@stop

