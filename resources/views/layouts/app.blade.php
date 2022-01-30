<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @stack('css-first')
    <link href="{{asset('css/main.css')}} " rel="stylesheet">
    <link href="{{asset('css/tailwind.css')}}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick-theme.css')}}">
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="shortcut icon" href="{{asset('img/logo.svg')}}">
    @stack('css-last')
    <title>HeyEvents!</title>
    @livewireStyles
    @livewireScripts
</head>

<body>
    <!-- Navigation -->
    @include('layouts.nav')
    <!--End Navigation -->

    <!-- Main -->
    {{$slot}}
    <!--End Main -->

    <!-- Footer -->
    @include('layouts.footer')
    <!-- End Footer -->
   

    @stack('js-first')
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="{{asset('js/slick.js')}}" type="text/javascript" charset="utf-8"></script>
    @stack('js-last')

    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>