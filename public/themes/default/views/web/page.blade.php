@extends('layouts.default')


@section('title', title($page->present()->title, t('company.name')))

@component('component.breadcrumb', ['breadcrumbs'=>$page->breadcrumbs()]) @endcomponent
@component('component.titlepage', ['title'=>$page->present()->getTitle($sidebar)]) @endcomponent
@component('component.menu.sidebar', ['sidebar'=>$sidebar, 'subTitle'=> $page->present()->title]) @endcomponent


@section('body')

    {!! $page->present()->body !!}

@stop


@push('style')
    {!! $page->present()->custom_css !!}
@endpush


@push('script')
    {!! $page->present()->custom_js !!}
@endpush
