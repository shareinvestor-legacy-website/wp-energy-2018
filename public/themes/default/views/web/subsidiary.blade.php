@extends('layouts.default')


@section('title', title($menu->present()->name, t('company.name')))

@component('component.breadcrumb', ['breadcrumbs'=>$menu->breadcrumbs()]) @endcomponent
@component('component.titlepage', ['title'=>$menu->present()->getTitle()]) @endcomponent


@section('body')

<section>

    {!! $category->present()->body !!}

    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <div class="accordion accordion--column" id="accordion-{{$category->slug}}">

                    @foreach ($posts as $post)

                    <div class="card">
                        <div class="card-header collapsed" data-toggle="collapse" aria-expanded="{{$loop->first ? 'true' : 'false'}}" href="#accordion-{{$post->id}}" data-parent="#accordion-{{$category->slug}}">
                            <a class="card-title">{{ $post->present()->title }}</a>
                        </div>
                        <div id="accordion-{{$post->id}}" class="card-block collapse{{$loop->first ? ' show' : ''}}" data-parent="#accordion-{{$category->slug}}">

                            {!! $post->present()->body !!}

                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

@stop

