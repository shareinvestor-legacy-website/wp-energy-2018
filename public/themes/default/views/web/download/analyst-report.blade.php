@extends('layouts.default')


@section('title', title($menu->present()->name, t('company.name')))

@component('component.breadcrumb', ['breadcrumbs'=>$menu->breadcrumbs()]) @endcomponent
@component('component.titlepage', ['title'=>$menu->present()->getTitle()]) @endcomponent


@section('body')

<section>
    <div class="container mb-5">

        @component('component.filter.year-all', compact('years', 'year', 'category'))
        @endcomponent

        <div class="row">
            <div class="col-12 col-md-12 col-lg-4">

                @component('web.download.component.latest', ['post'=>$latest]) @endcomponent

            </div>
            <div class="col-12 col-md-12 col-lg-8">
                <div class="table-responsive">
                    <table class="table table--download">
                        <tbody>
                            <tr>
                                <th>{{t('broker')}}</th>
                                <th>{{t('file.size')}}</th>
                                <th>{{t('download')}}</th>
                            </tr>

                            @foreach ($posts as $post)

                                @component('web.download.component.item', compact('post')) @endcomponent

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>

</section>

@stop

