@extends('layouts.default')


@section('title', title($menu->present()->name, t('company.name')))

@component('component.breadcrumb', ['breadcrumbs'=>$menu->breadcrumbs()]) @endcomponent
@component('component.titlepage', ['title'=>$menu->present()->getTitle()]) @endcomponent

@section('body')


<div class="container mb-5">

    <form action="{{action('Web\WebController@historicalPrice')}}" method="get" class="search search--historical">
        <div class="form-row">
            <div class="form-group col-sm-6 col-md-4 ">
                <label for="from">{{t('from')}}</label>

                <input name="date_start" class="form-control d-inline-block" id="startDate" type="text" value="{{$date_start}}">

            </div>

            <div class="form-group col-sm-6 col-md-4 ">
                <label for="to">{{t('to')}}</label>

                <input name="date_end" class="form-control d-inline-block" id="endDate" type="text" value="{{$date_end}}">

            </div>

            <div class="col-xs-12 col-md-12 col-lg-4">
                <input value="{{t('view.result')}}" class="btn btn-success d-inline-block" type="submit">
            </div>

        </div>

    </form>

    <div class="row">
        <div class="col-12">
            <p class="my-3">
                {{t('historical.price.from')}}
                <strong>{{$daily->last()->datetime('dd MMM yyyy')}}</strong>
                {{t('to')}}
                <strong>{{$daily->first()->datetime('dd MMM yyyy')}}</strong></p>
            </p>

            @if($daily->count() > 0)

            <div class="table-responsive">
                <table class="table table--historical">
                    <tbody>
                        <tr>
                            <th>{{t('date')}}</th>
                            <th>{{t('price.open')}}</th>
                            <th>{{t('price.high')}}</th>
                            <th>{{t('price.low')}}</th>
                            <th>{{t('price.close')}}</th>
                            <th>{!!t('volume.shares')!!}</th>
                            <th>{!!t('value.baht')!!}</th>
                        </tr>
                        <tr class="row-highlight">
                            <td colspan="7">{{t('summary')}}</td>
                        </tr>

                        @if(isset($summary))
                            @foreach($summary as $item)
                            <tr>
                                <td class="text-nowrap">
                                    {{ $item->period }}
                                    <br>
                                    ({{$item->end_date('dd MMM yyyy')}} {{t('to')}} {{$item->start_date('dd MMM yyyy')}})
                                </td>
                                <td>{{ $item->open }}</td>
                                <td>{{ $item->high }}</td>
                                <td>{{ $item->low }}</td>
                                <td>{{ $item->close }}</td>
                                <td>{{ $item->volumn }}</td>
                                <td>{{ $item->value }}</td>
                            </tr>
                            @endforeach
                        @endif

                        <tr class="row-highlight">
                            <td colspan="7">{{t('daily.historical.data')}}</td>
                        </tr>

                        @foreach($daily as $item)
                        <tr>
                            <td>
                                {{$item->datetime('dd MMM yyyy')}}
                            </td>
                            <td>{{ $item->open }}</td>
                            <td>{{ $item->high }}</td>
                            <td>{{ $item->low }}</td>
                            <td>{{ $item->close }}</td>
                            <td>{{ $item->volumn }}</td>
                            <td>{{ $item->value }}</td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                @else

                <p>{{t('no.data.available')}}</p>

                @endif

                <p>{!! t('remark.historical.price') !!}</p>

            </div>
        </div>
    </div>


@stop



