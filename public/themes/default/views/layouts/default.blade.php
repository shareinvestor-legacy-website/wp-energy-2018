<!DOCTYPE html>
<html lang="{{locale()}}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='google-site-verification' content='{{setting('general.website.verification')}}'>

    @yield('meta')

    <link
        href="{{setting('general.favicon')  ? asset(setting('general.favicon')) : asset('assets/static/images/favicon.ico')}}"
        rel="shortcut icon"/>

    <title>@yield('title')</title>

    @component('layouts.component.css') @endcomponent

    @stack('style')


</head>
<body>


@component('layouts.component.header') @endcomponent


<main class="main content">
    @section('body')  @show
</main>


@component('layouts.component.footer') @endcomponent



@component('layouts.component.script') @endcomponent
@component('layouts.component.analytic') @endcomponent


@stack('script')


@if (config('app.env') == 'local')
    <script id="__bs_script__">//<![CDATA[
        document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.18.8'><\/script>".replace("HOST", location.hostname));
        //]]></script>
@endif

</body>
</html>
