<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MusicSite</title>
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet" type="text/css">

</head>
<body>
<div class="flex-center container-fluid">
    <div class="col-md-12 full-height">
        {{--include the menu--}}
        <div class="col-md-12">
            @include('layouts.menu')
        </div>
        <div class="col-md-8">
            @yield('content')
        </div>

    </div>
    <footer id="footer" class="text-center col-md-12">
        Copyright 2018 &copy; NairaV
    </footer>
</div>
</body>
</html>