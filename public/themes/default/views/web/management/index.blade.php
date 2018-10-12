@extends('layouts.default')


@section('title', title($menu->present()->name, t('company.name')))

@component('component.breadcrumb', ['breadcrumbs'=>$menu->breadcrumbs()]) @endcomponent
@component('component.titlepage', ['title'=>$title]) @endcomponent
@component('component.menu.sidebar', ['sidebar'=>$sidebar, 'subTitle'=> $menu->present()->name]) @endcomponent


@section('body')



@stop

