@extends('layouts.default')


@section('title', title($page->present()->title, t('company.name')))

@component('component.breadcrumb') @endcomponent
@component('component.titlepage') @endcomponent


@section('body')

    {!! $page->present()->body !!}

@stop


@push('style')
    {!! $page->present()->custom_css !!}
@endpush


@push('script')
    {!! $page->present()->custom_js !!}
@endpush
