<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <!--====== STYLESHEETS ======-->
        <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
        <link rel="stylesheet" href="{{asset('css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('css/modal-video.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/stellarnav.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('css/slick.css')}}">
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/material-icons.css')}}" rel="stylesheet">

        <!--====== MAIN STYLESHEETS ======-->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <link href="{{asset('css/responsive.css')}}" rel="stylesheet">

        <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>

        {!! Charts::assets() !!}
    </head>
    <body class="home-one" data-spy="scroll" data-target=".mainmenu-area" data-offset="90">

    @yield('content')

    @yield('script')
    </body>
</html>
