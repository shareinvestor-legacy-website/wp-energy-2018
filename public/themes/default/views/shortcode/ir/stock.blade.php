@isset($stock)
<div class="col-md-12">
    <div class="stock__symbol">
        <p>{{$stock->present()->symbol}}</p>
    </div>
</div>
<div class="col-md-6">
    <div class="stock__value">
        <span class="stock__text stock__text--bold">{{$stock->present()->last_done}}</span>
        <span class="stock__text stock__text--semibold">{{$stock->present()->currency}}</span>
    </div>
</div>
<div class="col-md-6">
    <div class="stock__change">
        <p class="h4">{{$stock->present()->change}}({{$stock->present()->percent_change}}%)</p>
    </div>
</div>
<div class="col-md-12">
    <div class="stock__date">
        <p class="datetime">{{t('last.updated')}} <time class="d-inline-block">{{$stock->present()->datetime('dd MMM yyyy HH:mm')}}</time>
        </p>
    </div>
</div>
@endisset
