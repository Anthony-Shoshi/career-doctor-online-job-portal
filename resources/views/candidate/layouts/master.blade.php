<!DOCTYPE html>
<html lang="en">
  <head>
    <title>JobPortal - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('user/assets/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/animate.css') }}">
    
    <link rel="stylesheet" href="{{ asset('user/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('user/assets/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('user/assets/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('user/assets/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/jquery.timepicker.css') }}">

    
    <link rel="stylesheet" href="{{ asset('user/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

    @yield('myCss')
    
  </head>
  <body>
    
	  @include('candidate.includes.navbar')
    <!-- END nav -->
    
    

    @yield('content')
    

    @include('candidate.includes.footer')
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{ asset('user/assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('user/assets/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('user/assets/js/popper.min.js') }}"></script>
  <script src="{{ asset('user/assets/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('user/assets/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('user/assets/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('user/assets/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('user/assets/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('user/assets/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('user/assets/js/aos.js') }}"></script>
  <script src="{{ asset('user/assets/js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('user/assets/js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ asset('user/assets/js/jquery.timepicker.min.js') }}"></script>
  <script src="{{ asset('user/assets/js/scrollax.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ asset('user/assets/js/google-map.js') }}"></script>
  <script src="{{ asset('user/assets/js/main.js') }}"></script>
  <script src="{{ asset('js/toastr.min.js') }}"></script>

  <!-- toastr notification -->
  <script>
    @if(Session::has('success'))
      toastr.success("{{ Session::get('success') }}");
    @endif

    @if(Session::has('delete'))
      toastr.error("{{ Session::get('delete') }}");
    @endif
    
  </script>


  @yield('myJs')

  </body>
</html>