@extends('layouts.default')


@section('title', title($post->present()->title, t('company.name')))

@component('component.breadcrumb', ['breadcrumbs'=>$menu->breadcrumbs()]) @endcomponent
@component('component.titlepage', ['title'=>$menu->present()->name]) @endcomponent

@section('body')


    <div class="profile">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-4">
                    <div class="profile__image">
                        <img src="{{$post->present()->image('assets/static/images/default/board.png')}}" alt="" class="img-fluid">
                    </div>
                </div>

                <div class="col-12 col-sm-8">

                    <div class="profile__detail">

                        <h3>{{$post->present()->title}}</h3>

                        {!! $post->present()->excerpt !!}

                        <div class="profile__lists">

                            <div class="profile__items">

                                {!! $post->present()->body !!}

                            </div>

                        </div>

                    </div>

                    <a class="btn btn-primary btn--back mb-5 d-inline-flex" href="{{action('Web\WebController@management', ['category'=>$category->slug])}}">{{t('back')}}</a>

                </div>
            </div>
        </div>
    </div>


@stop

