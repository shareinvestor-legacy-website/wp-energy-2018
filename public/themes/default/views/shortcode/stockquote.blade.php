@isset($stock)
<div class="container mb-3">
    <div class="content-stock">
        <p class="text-right">{{t('last.updated')}}: {{$stock->present()->datetime('dd MMMM yyyy HH:mm')}}</p>
        <div class="row">
            <div class="col-md-12">
                <div class="card text-white px-4 py-3">
                    <h2 class="card__stock">
                        <span>{{$stock->present()->symbol}}</span>
                        {{$stock->present()->last_done}} {{$stock->present()->currency}}
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex">
                <div class="card">
                    <div class="card-body">
                        <div class="stock-change">
                            <p><span>{{t('change')}}</span><span> {{$stock->present()->change}}</span></p>
                            <p><span>{{t('volume.shares')}}</span><span> {{$stock->present()->volume}}</span></p>
                        </div><div class="stock-change">
                            <p><span>{{t('change')}} (%)</span><span> {{$stock->present()->percent_change}}%</span></p>
                            <p><span>{{t('value.baht')}}</span><span> {{$stock->present()->value}}</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex">
                <div class="card">
                    <div class="card-body">
                        <div class="stock-change">
                            <p><span>{{t('prior')}} :</span><span>{{$stock->present()->prior}}</span></p>
                            <p><span>{{t('days.range')}}</span><span> {{$stock->present()->range_days}}</span></p>
                        </div><div class="stock-change">
                            <p><span>{{t('price.open')}}</span><span> {{$stock->present()->open}}</span></p>
                            <p><span>{{t('52weeks.range')}}</span><span> {{$stock->present()->range_52weeks}}</span></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endisset
