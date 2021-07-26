<script>
    var cookieSetting = {
        'accept': "{{config('user.cookies.acceptExpire')}}",
        'reject': "{{config('user.cookies.rejectExpire')}}",
        'cookie-performance': "{{config('user.cookies.unnecEnableByDefault')}}"
    }
</script>


<div id="cookie">
    <!-- Settitng Left  = cookie--theme-1 -->
    <!-- Settitng Right = cookie--theme-2 -->
    <!-- Reject         = cookie--theme-3 -->
    <div class="cookie cookie--theme-3" :class="{ 'cookie--backdrop' : showSettings}">
        <div class="cookie-notice" :class="{ 'cookie-notice--show': showCookieBar }">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-9 text-lg-center">
                        {!! t('cookie.notice.text') !!}
                    </div>
                </div>
            </div>
            <div class="cookie-notice__button">
                <a class="cookie-notice__link" @click="reject" href="javascript:;" target="_self">{{t('reject')}}</a>
                <a class="cookie-notice__link" @click="toggleSetting" href="javascript:;" target="_self">{{t('cookie.settings')}}</a>
                <a class="btn btn-success text-uppercase" @click="accept" href="javascript:;" target="_self">{{t('accept.all')}}</a>
            </div>
        </div>

        <div class="cookie-setting" :class="{ 'cookie-setting--show' : showSettings }">
            <a class="cookie-setting__close" @click="toggleSetting" href="javascript:;" target="_self">&times;</a>
            <div class="cookie-setting__wrapper">
                <div class="cookie-setting__item cookie-setting__item--highlight">
                    <div class="cookie-setting__header">
                        <h2 class="cookie-setting__title">{{t('privacy.preference.center')}}</h2>
                    </div>
                    <div class="cookie-setting__body">
                        {!!t('privacy.preference.text')!!}
                        <a class="btn-link text-white" href="javascript:;" target="_self">{{t('more.information')}}</a>
                    </div>
                    <div class="cookie-setting__footer">
                        <a class="btn btn-success text-uppercase" @click="accept" href="javascript:;" target="_self">{{t('accept.all')}}</a>
                    </div>
                </div>
                <div class="cookie-setting__item">
                    <div class="cookie-setting__header">
                        <h5 class="cookie-setting__title">
                            {!!t('strictly.necessary.cookies')!!}
                        </h5>
                    </div>
                    <div class="cookie-setting__body">
                        <div class="cookie-setting__remark">{{t('always.active')}}</div>
                        {!!t('strictly.necessary.cookies.text')!!}
                    </div>
                </div>
                <div class="cookie-setting__item">
                    <div class="cookie-setting__header">
                        <h5 class="cookie-setting__title">
                            {!!t('analytic.cookies')!!}
                        </h5>
                        <div class="cookie-setting__checker">
                            <a class="cookie-button ml-auto" @click="toggleCookiePerformance" :class="{ 'cookie-button--active': enableCookiePerformance }" href="javascript:;" target="_self">
                                <span class="cookie-button__point"></span>
                            </a>
                        </div>
                    </div>
                    <div class="cookie-setting__body">
                        {!!t('analytic.cookies.text')!!}
                    </div>
                </div>
                <div class="cookie-setting__item">
                    <div class="cookie-setting__body">
                        <a class="btn btn-success text-uppercase" @click="onSave()" href="javascript:;" target="_self">{{t('confirm.my.choices')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(config('app.env') == 'production')

		@if(setting('general.analytic.google') != null)
        <ga :cookie-performance="cookiePerformance" tracking="{{setting('general.analytic.google')}}"></ga>
        @endif

        @if(setting('general.analytic.google.alternative') != null)
        <ga :cookie-performance="cookiePerformance" tracking="{{setting('general.analytic.google.alternative')}}"></ga>
        @endif

        @if(setting('general.analytic.google.tag.manager') != null)
        <gtm :cookie-performance="cookiePerformance" tracking="{{setting('general.analytic.google.tag.manager')}}"></gtm>
        @endif

        @if(setting('general.analytic.piwik') != null)
        <piwik :cookie-performance="cookiePerformance" tracking="{{setting('general.analytic.piwik')}}"></piwik>
        @endif

    @endif

</div>
