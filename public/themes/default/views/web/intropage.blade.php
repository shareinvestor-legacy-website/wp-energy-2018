<!DOCTYPE html>
<html lang="{{locale()}}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name='google-site-verification' content='{{setting('general.website.verification')}}'>

    <link href="{{setting('general.favicon')  ? asset(setting('general.favicon')) : asset('assets/img/favicon.ico')}}"
          rel="shortcut icon"/>


    <title>{{$post->present()->title .' | '. 'Website'}}</title>

    @component('layouts.component.css') @endcomponent

    <style>
        {!! $post->present()->custom_css !!}
    </style>
</head>


<body>




{!! $post->present()->body !!}



@component('layouts.component.script') @endcomponent
@component('layouts.component.analytic') @endcomponent



<script>
    {!! $post->present()->custom_js !!}
</script>





</body>

</html>