<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}} ">
  <link rel="icon" type="image/png" href="{{asset('img/logo.svg')}} ">
  <title>HeyEvents - Admin login</title>
  <!--     Fonts and    -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{asset('css/nucleo-svg.css" rel="stylesheet')}} " />
  <!-- Icons -->
  <link href="{{asset('css/nucleo-icons.css" rel="stylesheet')}} " />
  <link href="{{asset('css/nucleo-svg.css" rel="stylesheet')}} " />
  <!-- CSS -->
  <link id="pagestyle" href="{{asset('css/soft-ui-dashboard.css?v=1.0.3')}} " rel="stylesheet" />
</head>

<body>

  @include('admin.auth.login')

  <script src="{{asset('js/core/popper.min.js')}} "></script>
  <script src="{{asset('js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('soft-ui-dashboard.min.js?v=1.0.3')}}"></script>
</body>

</html>