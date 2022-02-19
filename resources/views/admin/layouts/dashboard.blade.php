<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href=" {{asset('img/apple-icon.png')}} ">
  <link rel="icon" type="image/png" href="{{asset('img/logo.svg')}}">
  <title>HeyEvents</title>
  <!--     Fonts     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Icons -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="{{asset('css/nucleo-icons.css')}} " rel="stylesheet" />
  <link href="{{asset('css/nucleo-svg.css')}} " rel="stylesheet" />
  <link href="{{asset('css/admin.css')}} " rel="stylesheet" />
  <!-- CSS -->
  <link id="pagestyle" href="{{asset('css/soft-ui-dashboard.css?v=1.0.3')}}" rel="stylesheet" />
  <link href="{{asset('css/main.css')}}" rel="stylesheet">
</head>

<body class="g-sidenav-show  bg-gray-100">
    
    @include('admin.layouts.sidebar')

  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    @include('admin.layouts.navbar')
    
    @yield('content')
    {{-- @include('admin.pages.home.index') --}}
  </main>
  
  <!--   Core JS Files   -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="{{ mix('js/app.js') }}"></script>
  <script src="{{asset('js/core/popper.min.js')}} "></script>
  <script src="{{asset('js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script src="{{asset('js/plugins/chartjs.min.js')}}"></script>
  <script src="{{asset('js/index.js')}} "></script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="{{asset('js/soft-ui-dashboard.min.js?v=1.0.3')}} "></script>
</body>

</html>