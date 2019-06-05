@extends('layouts.default')


@section('title', t('company.name'))



@section('body')

    @component('component.dialog',['dialog' => $dialog])@endcomponent

    {!! $page->present()->body !!}

@stop


@push('style')

    {!! isset($page) ? $page->present()->custom_css : '' !!}



@endpush


@push('script')

    {!! isset($page) ? $page->present()->custom_js : '' !!}

@endpush


