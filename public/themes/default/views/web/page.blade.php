@extends('layouts.default')


@section('title', title($page->present()->title, "Website"))




@section('body')

    {!! $page->present()->body !!}

@stop



@push('style')
    {!! $page->present()->custom_css !!}
@endpush


@push('script')
    {!! $page->present()->custom_js !!}
@endpush