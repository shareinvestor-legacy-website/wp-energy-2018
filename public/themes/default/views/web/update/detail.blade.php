@extends('layouts.default')


@section('title', title($post->present()->title, t('company.name')))

@component('component.breadcrumb', ['breadcrumbs'=>$menu->breadcrumbs()]) @endcomponent
@component('component.titlepage', ['title'=>$menu->present()->name]) @endcomponent

@section('body')


<section class="bg-gradient py-5 mb-4">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-12 col-md-6 col-lg-5">
                <div class="card bg-transparent mb-4 mb-md-0">
                    <div class="card__body mb-5">
                        <h2 class="text-white">{{$post->present()->title}}</h2>
                    </div>
                    <div class="card__footer border-white">
                        <time class="datetime">{{$post->present()->date}}</time>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">

                <div class="img-highlight">
                    <img src="{{$post->present()->image('assets/static/images/default/news.jpg')}}" alt="" class="img-fluid">
                </div>

            </div>
        </div>
    </div>
</section>

<section class="container">

    @component('web.update.component.gallery', compact('post', 'category', 'gallery')) @endcomponent

    <div class="row justify-content-center mb-5">
        <div class="col-12 col-lg-10 mb-5">

            {!! $post->present()->body !!}

            @if($post->present()->url != "")
            <ul>
                @if(is_array($post->present()->url))
                    @foreach($post->present()->url as $file)
                    <li>
                        <a href="{{ $file }}" target="_blank">Attachment {{ $loop->iteration }}</a>
                    </li>
                    @endforeach
                @else
                    <li>
                        <a href="{{ $post->present()->url }}" target="_blank">Attachment 1</a>
                    </li>
                @endif
            </ul>
            @endif

        </div>

        <div class="col-12 col-lg-10">

            @component('web.update.component.share', compact('action', 'post')) @endcomponent

        </div>

        <div class="col-12 col-lg-10 border-top pt-3">
            <a class="btn btn-primary btn--back d-inline-flex" href="{{$back}}">{{t('back')}}</a>
        </div>
    </div>

</section>

@stop

