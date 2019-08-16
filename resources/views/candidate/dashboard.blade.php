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
<!-- Title -->
<title>CareerUp - The Most Popular Job Board HTML Template</title>
<!-- Favicon -->
<link href="{{ asset('candidate_company/assets/images/favicon.ico') }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
<link href="{{ asset('candidate_company/assets/images/favicon.ico') }}" sizes="128x128" rel="shortcut icon" />

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
	<header class="header-nav style_one dashbord_menu dashbord navbar-scrolltofixed main-menu">
		<div class="container">
		    <!-- Ace Responsive Menu -->
		    <nav>
		        <!-- Menu Toggle btn--> 
		        <div class="menu-toggle">
		            <img class="nav_logo_img img-fluid" src="{{ asset('candidate_company/assets/images/header-logo.png') }}" alt="header-logo.png">
		            <button type="button" id="menu-btn">
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>
		        </div>
		        <a href="{{ url('/') }}" class="navbar_brand float-left dn-smd">
		            <img class="img-fluid mt10" src="{{ asset('candidate_company/assets/images/header-logo.png') }}" alt="header-logo.png">
		        </a>
		        <!-- Responsive Menu Structure-->
		        <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
		        <ul id="respMenu" class="ace-responsive-menu" data-menu-style="horizontal">
		            <li>
		                <a href="{{ url('/') }}"><span class="title">Home</span></a>
                    </li>
                    <li>
		                <a href="#"><span class="title">Find a Job</span></a>
                    </li>
                    <li>
		                <a href="#"><span class="title">Blog</span></a>
					</li>
					<li>
		                <a href="#"><span class="title">About Us</span></a>
					</li>
					<li>
		                <a href="#"><span class="title">Contact Us</span></a>
		            </li>
		        </ul>
		        <ul class="header_user_notif pull-right dn-smd">
	                <li class="user_notif">
						<div class="dropdown">
						    <a href="page-candidates-job-alert.html" data-toggle="dropdown"><span class="flaticon-alarm color-white fz20"></span><span>8</span></a>
						    <div class="dropdown-menu">
								<div class="so_heading">
									<p>Notifications</p>
								</div>
								<div class="so_content" data-simplebar="init">
									<ul>
										<li>
											<h5>Candidate suggestion</h5>
											<p>You might be interested based on your profile.</p>
										</li>
										<li>
											<h5>Candidate suggestion</h5>
											<p>You might be interested based on your profile.</p>
										</li>
										<li>
											<h5>Candidate suggestion</h5>
											<p>You might be interested based on your profile.</p>
										</li>
										<li>
											<h5>Candidate suggestion</h5>
											<p>You might be interested based on your profile.</p>
										</li>
										<li>
											<h5>Candidate suggestion</h5>
											<p>You might be interested based on your profile.</p>
										</li>
										<li>
											<h5>Candidate suggestion</h5>
											<p>You might be interested based on your profile.</p>
										</li>
										<li>
											<h5>Candidate suggestion</h5>
											<p>You might be interested based on your profile.</p>
										</li>
									</ul>
								</div>
						    </div>
						</div>
	                </li>
	                <li class="user_setting">
						<div class="dropdown">
	                		<a class="btn dropdown-toggle" href="#" data-toggle="dropdown"><span>{{auth::user()->name}}</span></a> 
						    <div class="dropdown-menu">
						    	<div class="user_set_header">
							    	<p>Hi, {{auth::user()->name}} <br><span class="address">Candidate</span></p>
						    	</div>
						    	<div class="user_setting_content">
									<a class="dropdown-item active" href="page-candidates-dashboard.html"><span class="flaticon-dashboard"></span> Dashboard</a>
									<a class="dropdown-item" href="page-candidates-profile.html"><span class="flaticon-profile"></span> Profile</a>
									<a class="dropdown-item" href="page-candidates-my-resume.html"><span class="flaticon-resume"></span> Resume</a>
									<a class="dropdown-item" href="page-candidates-applied-jobs.html"><span class="flaticon-paper-plane"></span> Applied Jobs</a>
									<a class="dropdown-item" href="page-candidates-cv-manager.html"><span class="flaticon-analysis"></span> CV Manager</a>
									<a class="dropdown-item" href="page-candidates-favourite-jobs.html"><span class="flaticon-favorites"></span> Favourite Jobs</a>
									<a class="dropdown-item" href="page-candidates-message.html"><span class="flaticon-chat"></span> Messages</a>
									<a class="dropdown-item" href="page-candidates-review.html"><span class="flaticon-rating"></span> Reviews</a>
									<a class="dropdown-item" href="page-candidates-job-alert.html"><span class="flaticon-alarm"></span> Job Alerts</a>
									<a class="dropdown-item" href="page-candidates-change-password.html"><span class="flaticon-locked"></span> Change Password</a>
									<a class="dropdown-item" href="page-log-reg.html"><span class="flaticon-logout"></span> Logout</a>
									<a class="dropdown-item" href="#"><span class="flaticon-rubbish-bin"></span> Delete Profile</a>
						    	</div>
						    </div>
						</div>
			        </li>
	            </ul>
		    </nav>
		    <!-- End of Responsive Menu -->
		</div>
	</header>

	<!-- Main Header Nav For Mobile -->
	<div id="page" class="stylehome1 h0">
		<div class="mobile-menu">
	        <ul class="header_user_notif pull-right">
                <li class="user_notif">
					<div class="dropdown">
					    <a href="page-candidates-job-alert.html" data-toggle="dropdown"><span class="flaticon-alarm color-white fz20"></span><span>8</span></a>
					    <div class="dropdown-menu">
							<div class="so_heading">
								<p>Notifications</p>
							</div>
							<div class="so_content" data-simplebar="init">
								<ul>
									<li>
										<h5>Candidate suggestion</h5>
										<p>You might be interested based on your profile.</p>
									</li>
									<li>
										<h5>Candidate suggestion</h5>
										<p>You might be interested based on your profile.</p>
									</li>
									<li>
										<h5>Candidate suggestion</h5>
										<p>You might be interested based on your profile.</p>
									</li>
									<li>
										<h5>Candidate suggestion</h5>
										<p>You might be interested based on your profile.</p>
									</li>
									<li>
										<h5>Candidate suggestion</h5>
										<p>You might be interested based on your profile.</p>
									</li>
									<li>
										<h5>Candidate suggestion</h5>
										<p>You might be interested based on your profile.</p>
									</li>
									<li>
										<h5>Candidate suggestion</h5>
										<p>You might be interested based on your profile.</p>
									</li>
								</ul>
							</div>
					    </div>
					</div>
                </li>
                <li class="user_setting">
					<div class="dropdown">
                		<a class="btn dropdown-toggle" href="#" data-toggle="dropdown">{{auth::user()->name}}</a> 
					    <div class="dropdown-menu">
					    	<div class="user_set_header">
						    	<p>Hi, Martha Griffin <br><span class="address">Bothell, WA, USA</span></p>
					    	</div>
					    	<div class="user_setting_content">
								<a class="dropdown-item active" href="page-candidates-dashboard.html"><span class="flaticon-dashboard"></span> Dashboard</a>
								<a class="dropdown-item" href="page-candidates-profile.html"><span class="flaticon-profile"></span> Profile</a>
								<a class="dropdown-item" href="page-candidates-my-resume.html"><span class="flaticon-resume"></span> Resume</a>
								<a class="dropdown-item" href="page-candidates-applied-jobs.html"><span class="flaticon-paper-plane"></span> Applied Jobs</a>
								<a class="dropdown-item" href="page-candidates-cv-manager.html"><span class="flaticon-analysis"></span> CV Manager</a>
								<a class="dropdown-item" href="page-candidates-favourite-jobs.html"><span class="flaticon-favorites"></span> Favourite Jobs</a>
								<a class="dropdown-item" href="page-candidates-message.html"><span class="flaticon-chat"></span> Messages</a>
								<a class="dropdown-item" href="page-candidates-review.html"><span class="flaticon-rating"></span> Reviews</a>
								<a class="dropdown-item" href="page-candidates-job-alert.html"><span class="flaticon-alarm"></span> Job Alerts</a>
								<a class="dropdown-item" href="page-candidates-change-password.html"><span class="flaticon-locked"></span> Change Password</a>
								<a class="dropdown-item" href="page-log-reg.html"><span class="flaticon-logout"></span> Logout</a>
								<a class="dropdown-item" href="#"><span class="flaticon-rubbish-bin"></span> Delete Profile</a>
					    	</div>
					    </div>
					</div>
		        </li>
            </ul>
			<div class="header stylehome1 dashbord_mobile_logo">
	            <img class="nav_logo_img img-fluid float-left mt25" src="images/header-logo.png" alt="header-logo.png">
				<a class="bg-thm" href="#menu"><span></span></a>
			</div>
		</div><!-- /.mobile-menu -->
		<nav id="menu" class="stylehome1">
			<ul>
				<li>
		            <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li>
		                <a href="#"><span class="title">Find A Job</span></a>
                    </li>
                    <li>
		                <a href="#"><span class="title">Blog</span></a>
					</li>
					<li>
		                <a href="#"><span class="title">About Us</span></a>
					</li>
					<li>
		                <a href="#"><span class="title">Contact Us</span></a>
                    </li>
                    @guest
					<li><a href="{{ route('login') }}" class="text-thm">Log<span class="dn-md">in</span>/Reg<span class="dn-md">ister</span></a></li>
					@else
						<li><a href="{{ route('dashboard') }}" class="text-thm">Dashboard</a></li>
						<li><a href="{{ route('logout') }}" class="text-thm" onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">Logout</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
					</li>
				@endguest
			</ul>
		</nav>
	</div>

	<!-- Our Dashbord -->
	<section class="our-dashbord dashbord">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-lg-4 col-xl-3 dn-smd">
					<div class="user_profile">
						<div class="media">
						  	<img src="images/team/8.jpg" class="align-self-start mr-3 rounded-circle" alt="8.jpg">
						  	<div class="media-body">
						    	<h5 class="mt-0">Hi, {{auth::user()->name}}</h5>
						    	<p>{{auth::user()->user_type}}</p>
							</div>
						</div>
					</div>
					<div class="dashbord_nav_list">
						<ul>
							<li class="active"><a href="page-candidates-dashboard.html"><span class="flaticon-dashboard"></span> Dashboard</a></li>
							<li><a href="page-candidates-profile.html"><span class="flaticon-profile"></span> Profile</a></li>
							<li><a href="page-candidates-my-resume.html"><span class="flaticon-resume"></span> Resume</a></li>
							<li><a href="page-candidates-applied-jobs.html"><span class="flaticon-paper-plane"></span> Applied Jobs</a></li>
							<li><a href="page-candidates-cv-manager.html"><span class="flaticon-analysis"></span> CV Manager</a></li>
							<li><a href="page-candidates-favourite-jobs.html"><span class="flaticon-favorites"></span> Favourite Jobs</a></li>
							<li><a href="page-candidates-message.html"><span class="flaticon-chat"></span> Messages</a></li>
							<li><a href="page-candidates-review.html"><span class="flaticon-rating"></span> Reviews</a></li>
							<li><a href="page-candidates-job-alert.html"><span class="flaticon-alarm"></span> Job Alerts</a></li>
							<li><a href="page-candidates-change-password.html"><span class="flaticon-locked"></span> Change Password</a></li>
							<li><a href="page-log-reg.html"><span class="flaticon-logout"></span> Logout</a></li>
							<li><a href="#"><span class="flaticon-rubbish-bin"></span> Delete Profile</a></li>
						</ul>
					</div>
					<div class="skill_sidebar_widget">
						<h4>Skills Percentage <span class="float-right font-weight-bold">85%</span></h4>
						<p>Put value for "Cover Image" field to increase your skill up to "15%"</p>
				        <ul class="skills">
				            <li class="progressbar3" data-width="85" data-target="85"></li>
				        </ul>
					</div>
				</div>
				<div class="col-lg-8 col-xl-9">
					<div class="row">
						<div class="col-lg-12">
							<h4 class="mb30">Dashboard</h4>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="ff_one">
								<div class="icon"><span class="flaticon-paper-plane"></span></div>
								<div class="detais">
									<div class="timer">20</div>
									<p>Applied Jobs</p>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="ff_one style2">
								<div class="icon"><span class="flaticon-favorites"></span></div>
								<div class="detais">
									<div class="timer">26</div>
									<p>Favorite Jobs</p>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="ff_one style3">
								<div class="icon"><span class="flaticon-alarm"></span></div>
								<div class="detais">
									<div class="timer">11</div>
									<p>Job Alerts</p>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="ff_one style4">
								<div class="icon"><span class="flaticon-tag"></span></div>
								<div class="detais">
									<div class="timer">79</div>
									<p>Packages</p>
								</div>
							</div>
						</div>
						<div class="col-xl-8">
							<div class="application_statics">
								<h4>Applications Statistics</h4>
								<div class="c_container"></div>
							</div>
						</div>
						<div class="col-xl-4">
							<div class="recent_job_trafic">
								<h4>Traffic</h4>
								<div class="trafic_details">
									<div class="circlechart" data-percentage="60">1.5 M</div>
									<h4>Traffic for the day</h4>
									<p>Traffic through the sources google and facebook for the day</p>
									<ul class="trafic_list float-left">
										<li>40%</li>
										<li class="list-inline-item"><span class="bgc-fb"></span></li>
										<li class="list-inline-item">Facebook</li>
									</ul>
									<ul class="trafic_list">
										<li>60%</li>
										<li class="list-inline-item"><span class="bgc-gogle"></span></li>
										<li class="list-inline-item">Facebook</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-xl-8">
							<div class="recent_job_apply">
								<h4 class="title">Recent Apply Jobs <a class="text-thm float-right" href="#">Browse All Jobs <span class="flaticon-right-arrow"></span></a></h4>
								<div class="rj_grid">
									<h4 class="sub_title">UX/UI Designer</h4>
									<p class="text-thm float-left">Wiggle CRC</p>
									<ul class="rj_post_address float-right">
										<li class="list-inline-item"><a href="#"><span class="flaticon-location-pin"></span></a></li>
										<li class="list-inline-item"><a href="#">Bothell, WA, USA</a></li>
					    				<li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Edit"><span class="flaticon-edit"></span></a></li>
					    				<li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-rubbish-bin"></span></a></li>
									</ul>
								</div>
								<div class="rj_grid">
									<h4 class="sub_title">Regional Sales Manager South east Asia</h4>
									<p class="text-thm float-left">Wiggle CRC</p>
									<ul class="rj_post_address float-right">
										<li class="list-inline-item"><a href="#"><span class="flaticon-location-pin"></span></a></li>
										<li class="list-inline-item"><a href="#">Bothell, WA, USA</a></li>
					    				<li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Edit"><span class="flaticon-edit"></span></a></li>
					    				<li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-rubbish-bin"></span></a></li>
									</ul>
								</div>
								<div class="rj_grid">
									<h4 class="sub_title">C Developer (Senior) C .Net</h4>
									<p class="text-thm float-left">Wiggle CRC</p>
									<ul class="rj_post_address float-right">
										<li class="list-inline-item"><a href="#"><span class="flaticon-location-pin"></span></a></li>
										<li class="list-inline-item"><a href="#">Bothell, WA, USA</a></li>
					    				<li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Edit"><span class="flaticon-edit"></span></a></li>
					    				<li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-rubbish-bin"></span></a></li>
									</ul>
								</div>
								<div class="rj_grid mb0">
									<h4 class="sub_title">UX/UI Designer</h4>
									<p class="text-thm float-left">Wiggle CRC</p>
									<ul class="rj_post_address float-right">
										<li class="list-inline-item"><a href="#"><span class="flaticon-location-pin"></span></a></li>
										<li class="list-inline-item"><a href="#">Bothell, WA, USA</a></li>
					    				<li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Edit"><span class="flaticon-edit"></span></a></li>
					    				<li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-rubbish-bin"></span></a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-xl-4">
							<div class="recent_job_activity">
								<h4 class="title">Activity</h4>
								<div class="grid">
									<div class="color_bg float-left"></div>
									<ul>
										<li><span>Dobrick </span>published an article</li>
										<li>2 hours ago</li>
									</ul>
								</div>
								<div class="grid">
									<div class="color_bg two float-left"></div>
									<ul>
										<li><span>Stella </span>created an event</li>
										<li>2 hours ago</li>
									</ul>
								</div>
								<div class="grid">
									<div class="color_bg three float-left"></div>
									<ul>
										<li><span>Peter </span>submitted the reports</li>
										<li>2 hours ago</li>
									</ul>
								</div>
								<div class="grid">
									<div class="color_bg four float-left"></div>
									<ul>
										<li><span>Nateila </span>updated the docs</li>
										<li>2 hours ago</li>
									</ul>
								</div>
								<div class="grid">
									<div class="color_bg float-left"></div>
									<ul>
										<li><span>Dobrick </span>published an article</li>
										<li>2 hours ago</li>
									</ul>
								</div>
								<div class="grid mb0">
									<div class="color_bg two float-left"></div>
									<ul>
										<li><span>Stella </span>created an event</li>
										<li>2 hours ago</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
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
</body>
</html>