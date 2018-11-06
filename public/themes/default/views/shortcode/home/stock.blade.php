@isset($stock)
<div class="stock">
    <div class="stock__date">
        <h3>{{t('stock.price')}}</h3>
        <p class="stock--datetime">{{t('last.updated')}} <time class="d-inline-block">{{$stock->present()->datetime('dd MMM yyyy HH:mm')}}</time></p>
    </div>
    <div class="stock__symbol">
        <p class="h3">{{t('set.symbol')}}</p>
        <p>{{$stock->present()->symbol}}</p>
    </div>
    <div class="stock__value">
        <p>
            <span class="stock__text stock__text--bold">{{$stock->present()->last_done}}</span>
            <span class="stock__text stock__text--semibold">{{$stock->present()->currency}}</span>
        </p>
    </div>
    <div class="stock__change">
        <p class="mb-2">{{t('change')}} (%{{t('change')}})</p>
        <p>{{$stock->present()->change}} ({{$stock->present()->percent_change}}%)</p>
    </div>
</div>
@endisset
