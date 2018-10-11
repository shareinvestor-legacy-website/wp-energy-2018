<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Error</title>
    <link rel="stylesheet" href="/themes/default/assets/vendor.css"/>
    <link rel="stylesheet" href="/themes/default/assets/admin.css"/>
</head>

<body>
<div class="wrapper">
    <div class="abs-center">
        <!-- START panel-->
        <div class="text-center mb-xl">
            <div class="mb-lg">
                <em class="fa fa-wrench fa-5x text-muted"></em>
            </div>
            <div class="text-lg mb-lg">500</div>
            <p class="lead m0">Oh! Something went wrong :(</p>
            <br/>
            <p><strong>Error -> </strong>{{$message}} </p>
        </div>
        <ul class="list-inline text-center text-sm mb-xl">
            <li><a href="{{action('Web\WebController@home')}}" class="text-muted">Go to homepage</a>
            </li>
        </ul>
        <div class="p-lg text-center">
            <span>&copy;</span>
            <span>2017</span>
            <span>-</span>
            <span>Blaze CMS</span>
        </div>
    </div>
</div>

</body>

</html>