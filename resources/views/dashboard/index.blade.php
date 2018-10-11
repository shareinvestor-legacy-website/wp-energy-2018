@extends('layouts.app')


@section('content')

    <div class="content-heading">

        Dashboard

        <ol class="breadcrumb">
            <li>Welcome, {{ Auth::user()->username }} to Blaze CMS! The following permissions you are granted, please check
                it out.
            </li>
        </ol>

    </div>
    @include('component.flash')
    <div class="row">
        <div class="col-sm-12">


            @include('dashboard.permission.web')
            @include('dashboard.permission.jobboard')
            @include('dashboard.permission.auth')
            @include('dashboard.permission.tool')
            @include('dashboard.permission.setting')


        </div>
    </div>

@stop






