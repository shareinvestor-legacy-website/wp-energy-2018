<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link href="{{setting('general.favicon')  ? asset(setting('general.favicon')) : asset('assets/static/images/favicon.ico')}}"
          rel="shortcut icon"/>

    <title>Blaze CMS</title>


    @include('layouts.css')
    @stack('css')
</head>


<body class="">

<div class="wrapper">


@include('layouts.header')
@include('layouts.sidebar')


<!-- Main section-->
    <section>
        <!-- Page content-->
        <div class="content-wrapper">
            @yield('content')
        </div>
    </section>


    @include('layouts.footer')

</div>

@include('layouts.script')
@stack('script')



@if (config('app.env') == 'local')
    <script id="__bs_script__">//<![CDATA[
        document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.18.8'><\/script>".replace("HOST", location.hostname));
        //]]></script>
@endif


</body>

</html>