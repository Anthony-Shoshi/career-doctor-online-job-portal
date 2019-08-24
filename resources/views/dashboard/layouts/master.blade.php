<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="candidates, career, employment, freelance, glassdoor, Human Resource Management, indeed, job board, job listing, job portal, job postings, jobs, listings, recruitment, resume">
<meta name="CreativeLayers" content="ATFN">
<!-- css file -->
<link rel="stylesheet" href="{{ asset('candidate_company/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('candidate_company/assets/css/menu.css') }}">
<link rel="stylesheet" href="{{ asset('candidate_company/assets/css/style.css') }}">
<!-- Responsive stylesheet -->
<link rel="stylesheet" href="{{ asset('candidate_company/assets/css/responsive.css') }}">
<link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
<!-- Title -->
<title>CareerUp - The Most Popular Job Board HTML Template</title>
<!-- Favicon -->
<link href="{{ asset('candidate_company/assets/images/favicon.ico') }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
<link href="{{ asset('candidate_company/assets/images/favicon.ico') }}" sizes="128x128" rel="shortcut icon" />
@yield('myCss')
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="wrapper">
	<div class="preloader"></div>

	@include('dashboard.includes.navbar')

	<!-- Our Dashbord -->
	<section class="our-dashbord dashbord">
		<div class="container">
			<div class="row">
				@include('dashboard.includes.sidebar')
				
                @yield('content')
			</div>
		</div>
	</section>

	
<a class="scrollToHome text-thm" href="#"><i class="flaticon-rocket-launch"></i></a>
</div>
<!-- Wrapper End -->

<script type="text/javascript" src="{{ asset('candidate_company/assets/js/jquery-3.3.1.js') }}"></script>
<script type="text/javascript" src="{{ asset('candidate_company/assets/js/jquery-migrate-3.0.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('candidate_company/assets/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('candidate_company/assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('candidate_company/assets/js/jquery.mmenu.all.js') }}"></script>
<script type="text/javascript" src="{{ asset('candidate_company/assets/js/ace-responsive-menu.js') }}"></script>
<script type="text/javascript" src="{{ asset('candidate_company/assets/js/bootstrap-select.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('candidate_company/assets/js/snackbar.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('candidate_company/assets/js/simplebar.js') }}"></script>
<script type="text/javascript" src="{{ asset('candidate_company/assets/js/parallax.js') }}"></script>
<script type="text/javascript" src="{{ asset('candidate_company/assets/js/scrollto.js') }}"></script>
<script type="text/javascript" src="{{ asset('candidate_company/assets/js/jquery-scrolltofixed-min.js') }}"></script>
<script type="text/javascript" src="{{ asset('candidate_company/assets/js/jquery.counterup.js') }}"></script>
<script type="text/javascript" src="{{ asset('candidate_company/assets/js/wow.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('candidate_company/assets/js/progressbar.js') }}"></script>
<script type="text/javascript" src="{{ asset('candidate_company/assets/js/slider.js') }}"></script>
<script type="text/javascript" src="{{ asset('candidate_company/assets/js/timepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('candidate_company/assets/js/chart.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('candidate_company/assets/js/chart.custome.js') }}"></script>
<!-- Custom script for all pages --> 
<script type="text/javascript" src="{{ asset('candidate_company/assets/js/script.js') }}"></script>
<!-- toastr -->
<script src="{{asset('js/toastr.js')}}"></script>
<script>
    @if(Session::has('success'))
      toastr.success("{{ Session::get('success') }}");
    @endif

    @if(Session::has('delete'))
      toastr.error("{{ Session::get('delete') }}");
    @endif

// @if(Session::has('success'))
// Command: toastr["success"]("{{session('success')}}")
// @endif
// @if(Session::has('error'))
// Command: toastr["error"]("{{session('error')}}")
// @endif
// @foreach ($errors->all() as $error)
// Command: toastr["error"]("{{ $error }}");
// @endforeach
</script>
@yield('myJs')
</body>
</html>