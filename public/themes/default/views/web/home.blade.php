@extends('layouts.default')


@section('title', 'Website')



@section('body')

    @component('component.dialog',['dialog' => $dialog])@endcomponent

    {!! isset($page) ? $page->present()->body : 'Welcome to BlazeCMS v' . \BlazeCMS\Supports\Version::BLAZE  !!}
    

@stop


@push('style')
    {!! isset($page) ? $page->present()->custom_css : '' !!}
@endpush


@push('script')
    {!! isset($page) ? $page->present()->custom_js : '' !!}
@endpush


