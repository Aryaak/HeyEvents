<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/tailwind.css')}}" rel="stylesheet">
    <link href="{{asset('css/slick.css')}}"  rel="stylesheet" type="text/css" >
    <link href="{{asset('css/slick-theme.css')}}" rel="stylesheet" type="text/css" >
    <link href="{{asset('img/logo.svg')}}" rel="shortcut icon" type="text/css" >
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @stack('css')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <title>HeyEvents! - @yield('title')</title>
</head>

<body>
    @include('layouts.navbar')

    @yield('content')

    @include('layouts.footer')

    @stack('js')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
        AOS.init({
            once: false
        });
    </script>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{asset('js/slick.js')}}" type="text/javascript" charset="utf-8"></script>
</body>

</html>