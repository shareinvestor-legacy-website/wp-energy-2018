@extends('layouts.default')


@section('title', t('company.name'))



@section('body')

    @component('component.dialog',['dialog' => $dialog])@endcomponent

    {!! $child->present()->body !!}

@stop


@push('style')
    {!! isset($page) ? $page->present()->custom_css : '' !!}
    @foreach($pages as $child)
        {!! $child->present()->custom_css !!}
    @endforeach
@endpush


@push('script')
    {!! isset($page) ? $page->present()->custom_js : '' !!}
    @foreach($pages as $child)
        {!! $child->present()->custom_js !!}
    @endforeach
@endpush


