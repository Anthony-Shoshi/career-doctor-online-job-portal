<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="candidates, career, employment, freelance, glassdoor, Human Resource Management, indeed, job board, job listing, job portal, job postings, jobs, listings, recruitment, resume">
<meta name="CreativeLayers" content="ATFN">
<!-- css file -->
<link rel="stylesheet" href="{{ asset('candidate_company/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('candidate_company/assets/css/menu.css') }}">
<link rel="stylesheet" href="{{ asset('candidate_company/assets/css/style.css') }}">
<!-- Responsive stylesheet -->
<link rel="stylesheet" href="{{ asset('candidate_company/assets/css/responsive.css') }}">
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

	<!-- Main Header Nav -->
	@include('candidate.includes.navbar')
	<!-- Modal -->
	<div class="sign_up_modal modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
	  	<div class="modal-dialog modal-dialog-centered" role="document">
	    	<div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		      	</div>
	    		<ul class="sign_up_tab nav nav-tabs" id="myTab" role="tablist">
				  	<li class="nav-item">
				    	<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Login</a>
				  	</li>
				  	<li class="nav-item">
				    	<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Register</a>
				  	</li>
				</ul>
				<div class="tab-content" id="myTabContent">
				  	<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
						<div class="login_form">
							<form action="#">
								<div class="heading">
									<h3 class="text-center">Quick Login</h3>
									<p class="text-center">Don't have an account? <a class="text-thm" href="#">Sign Up!</a></p>
								</div>
								 <div class="form-group">
							    	<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
								</div>
								<div class="form-group">
							    	<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
								</div>
								<div class="form-group form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<label class="form-check-label" for="exampleCheck1">Remember me</label>
									<a class="tdu text-thm float-right" href="#">Forgot Password?</a>
								</div>
								<button type="submit" class="btn btn-log btn-block btn-thm">Login</button>
								<hr>
								<div class="row mt40">
									<div class="col-lg">
										<button type="submit" class="btn btn-block color-white bgc-fb"><i class="fa fa-facebook float-left mt5"></i> Facebook</button>
									</div>
									<div class="col-lg">
										<button type="submit" class="btn btn-block color-white bgc-gogle"><i class="fa fa-google float-left mt5"></i> Google</button>
									</div>
								</div>
							</form>
						</div>
				  	</div>
				  	<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
						<div class="sign_up_form">
							<div class="heading">
								<h3 class="text-center">Create New Account</h3>
								<p class="text-center">Don't have an account? <a class="text-thm" href="#">Sign Up!</a></p>
							</div>
							<form action="#">
								<div class="form-group">
							    	<input type="text" class="form-control" id="exampleInputName1" placeholder="User Name">
								</div>
								 <div class="form-group">
							    	<input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email">
								</div>
								<div class="form-group">
							    	<input type="number" class="form-control" id="exampleInputPhone1" placeholder="Phone Number">
								</div>
								<div class="form-group">
									<select id="inputState1" class="form-control">
								        <option selected>Select Sector</option>
								        <option>Web Developer</option>
								        <option>Ui/Ux Designer</option>
								        <option>Photoeditor</option>
								        <option>Graphics Designer</option>
								    </select>
								</div>
								<div class="form-group">
							    	<input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
								</div>
								<div class="form-group form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck2">
									<label class="form-check-label" for="exampleCheck2">By Registering You Confirm That You Accept <a class="text-thm" href="page-terms-and-policies.html">Terms & Conditions</a> And <a class="text-thm" href="page-terms-and-policies.html">Privacy Policy</a></label>
								</div>
								<button type="submit" class="btn btn-log btn-block btn-dark">Register</button>
								<hr>
								<div class="row mt40">
									<div class="col-lg">
										<button type="submit" class="btn btn-block color-white bgc-fb"><i class="fa fa-facebook float-left mt5"></i> Facebook</button>
									</div>
									<div class="col-lg">
										<button type="submit" class="btn btn-block color-white bgc-gogle"><i class="fa fa-google float-left mt5"></i> Google</button>
									</div>
								</div>
							</form>
						</div>
				  	</div>
				</div>
	    	</div>
	  	</div>
	</div>

	<!-- Home Design -->
	@yield('content')

	<!-- Our Footer Top Area -->
  @include('candidate.includes.footer')
  
<a class="scrollToHome" href="#"><i class="flaticon-rocket-launch"></i></a>
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
<!-- Custom script for all pages --> 
<script type="text/javascript" src="{{ asset('candidate_company/assets/js/script.js') }}"></script>
@yield('myJs')
</body>
</html>