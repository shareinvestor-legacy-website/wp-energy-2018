@extends('layouts.default')


@section('title', title($page->present()->title, t('company.name')))

@component('component.breadcrumb', ['breadcrumbs'=>$page->breadcrumbs()]) @endcomponent
@component('component.titlepage', ['title'=>$page->present()->title]) @endcomponent


@section('body')

    {!! $page->present()->body !!}

@stop


@push('style')
    {!! $page->present()->custom_css !!}
@endpush


@push('script')
    {!! $page->present()->custom_js !!}
@endpush
