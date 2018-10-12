<!DOCTYPE html>
<html lang="{{locale()}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name='google-site-verification' content='{{setting('general.website.verification')}}'>

    <link href="{{setting('general.favicon')  ? asset(setting('general.favicon')) : asset('assets/img/favicon.ico')}}"
          rel="shortcut icon"/>


    <title>{{$post->present()->title .' | '. t('company.name')}}</title>

    {!! $post->present()->custom_css !!}

</head>
<body>


{!! $post->present()->body !!}


 {!! $post->present()->custom_js !!}

@component('layouts.component.analytic') @endcomponent



</body>
</html>
