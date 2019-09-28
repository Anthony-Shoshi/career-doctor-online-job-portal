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
					@if(auth::user()->user_type == 'candidate')
                    <li>
		                <a href="#"><span class="title">Find a Job</span></a>
					</li>
					@endif
					@if(auth::user()->user_type == 'company')
                    <li>
		                <a href="{{ route('postJob') }}"><span class="title">Post a Job</span></a>
					</li>
					@endif
                    <li>
		                <a href="#"><span class="title">Blog</span></a>
					</li>
					<li>
		                <a href="{{ route('aboutUs') }}"><span class="title">About Us</span></a>
					</li>
					<li>
		                <a href="{{ route('contactUs') }}"><span class="title">Contact Us</span></a>
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
	                		<a class="btn dropdown-toggle" href="#" data-toggle="dropdown"><img class="rounded-circle" src="{{asset(auth::user()->image)}}" alt="User Image"> <span class="pl15 pr15">{{auth::user()->name}}</span></a> 
						    <div class="dropdown-menu">
						    	<div class="user_set_header">
							    	<p>Hi, {{auth::user()->name}} <br><span class="address">{{auth::user()->user_type}}</span></p>
						    	</div>
						    	<div class="user_setting_content">
									@if(auth::user()->user_type == 'candidate')
									<a class="dropdown-item {{Request::is('dashboard') ? 'active' : ''}}" href="{{route('dashboard')}}"><span class="flaticon-dashboard"></span> Dashboard</a>
									<a class="dropdown-item {{Request::is('candidate/profile') ? 'active' : ''}}" href="{{route('candidateProfile')}}"><span class="flaticon-profile"></span> Profile</a>
									@php
										$candidate = \App\CandidateGeneralInfo::where('user_id', Auth::user()->id)->exists();
									@endphp
									@if($candidate)
									<a class="dropdown-item {{Request::is('view/resume') ? 'active' : ''}}" href="{{route('viewResume')}}"><span class="flaticon-resume"></span> View Resume</a>
									@endif
									<a class="dropdown-item {{Request::is('create/resume') || Request::is('edit/resume') ? 'active' : ''}}" href="{{route('createResume')}}"><span class="flaticon-resume"></span> @if($candidate) Edit Resume @else Create Resume @endif</a>
									<a class="dropdown-item {{Request::is('create/coverletter') || Request::is('create/new/coverletter') ? 'active' : ''}}" href="{{route('createCoverLetter')}}"><span class="flaticon-resume"></span> Create Cover Letter </a>
									<a class="dropdown-item" href="page-candidates-applied-jobs.html"><span class="flaticon-paper-plane"></span> Applied Jobs</a>
									<a class="dropdown-item" href="page-candidates-cv-manager.html"><span class="flaticon-analysis"></span> CV Manager</a>
									<a class="dropdown-item {{Request::is('shortListed/job') ? 'active' : ''}}" href="{{ route('viewShortListedJob') }}"><span class="flaticon-favorites"></span> Favourite Jobs</a>
									<a class="dropdown-item" href="page-candidates-message.html"><span class="flaticon-chat"></span> Messages</a>
									<a class="dropdown-item" href="page-candidates-review.html"><span class="flaticon-rating"></span> Reviews</a>
									<a class="dropdown-item" href="page-candidates-job-alert.html"><span class="flaticon-alarm"></span> Job Alerts</a>
									<a class="dropdown-item {{Request::is('candidate/changePassword') ? 'active' : ''}}" href="{{route('candidateChangePassword')}}"><span class="flaticon-locked"></span> Change Password</a>
									@endif
									@if(auth::user()->user_type == 'company')
									<a class="dropdown-item {{Request::is('dashboard') ? 'active' : ''}}" href="{{route('dashboard')}}"><span class="flaticon-dashboard"></span> Dashboard</a>
									<a class="dropdown-item {{Request::is('company/profile') ? 'active' : ''}}" href="{{route('companyProfile')}}"><span class="flaticon-profile"></span> Company Profile</a>
									<a class="dropdown-item {{Request::is('company/post/job') ? 'active' : ''}}" href="{{ route('postJob') }}"><span class="flaticon-resume"></span> Post a New Job</a>
									<a class="dropdown-item {{Request::is('company/manage/job') ? 'active' : ''}}" href="{{ route('manageJob') }}"><span class="flaticon-paper-plane"></span> Manage Jobs</a>
									<a class="dropdown-item" href="page-employer-resume.html"><span class="flaticon-analysis"></span> Shortlisted Resumes</a>
									<a class="dropdown-item {{Request::is('followed/by') ? 'active' : ''}}" href="{{ route('followedBy') }}"><span class="flaticon-alarm"></span> Followed By</a>
									<a class="dropdown-item" href="page-employer-transactions.html"><span class="flaticon-chat"></span> Transactions</a>
									<a class="dropdown-item {{Request::is('company/changePassword') ? 'active' : ''}}" href="{{route('companyChangePassword')}}"><span class="flaticon-locked"></span> Change Password</a>
									@endif
									<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
									document.getElementById('logout-form').submit();"><span class="flaticon-logout"></span> Logout</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
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
                		<a class="btn dropdown-toggle" href="#" data-toggle="dropdown"><img class="rounded-circle" src="{{asset(auth::user()->image)}}" alt="User Image" title="CreativeLayers"></a> 
					    <div class="dropdown-menu">
					    	<div class="user_set_header">
						    	<p>Hi, {{auth::user()->name}} <br><span class="address">{{auth::user()->user_type}}</span></p>
					    	</div>
					    	<div class="user_setting_content">
								@if(auth::user()->user_type == 'candidate')
								<a class="dropdown-item {{Request::is('dashboard') ? 'active' : ''}}" href="{{route('dashboard')}}"><span class="flaticon-dashboard"></span> Dashboard</a>
								<a class="dropdown-item {{Request::is('candidate/profile') ? 'active' : ''}}" href="{{route('candidateProfile')}}"><span class="flaticon-profile"></span> Profile</a>
								@php
									$candidate = \App\CandidateGeneralInfo::where('user_id', Auth::user()->id)->exists();
								@endphp
								@if($candidate)
									<a class="dropdown-item {{Request::is('view/resume') ? 'active' : ''}}" href="{{route('viewResume')}}"><span class="flaticon-resume"></span> View Resume</a>
								@endif
								<a class="dropdown-item {{Request::is('create/resume') || Request::is('edit/resume') ? 'active' : ''}}" href="{{route('createResume')}}"><span class="flaticon-resume"></span> @if($candidate) Edit Resume @else Create Resume @endif</a>
								<a class="dropdown-item {{Request::is('create/coverletter') || Request::is('create/new/coverletter') ? 'active' : ''}}" href="{{route('createCoverLetter')}}"><span class="flaticon-resume"></span> Create Cover Letter </a>
								<a class="dropdown-item" href="page-candidates-applied-jobs.html"><span class="flaticon-paper-plane"></span> Applied Jobs</a>
								<a class="dropdown-item" href="page-candidates-cv-manager.html"><span class="flaticon-analysis"></span> CV Manager</a>
								<a class="dropdown-item {{Request::is('shortListed/job') ? 'active' : ''}}" href="{{ route('viewShortListedJob') }}"><span class="flaticon-favorites"></span> Favourite Jobs</a>
								<a class="dropdown-item" href="page-candidates-message.html"><span class="flaticon-chat"></span> Messages</a>
								<a class="dropdown-item" href="page-candidates-review.html"><span class="flaticon-rating"></span> Reviews</a>
								<a class="dropdown-item" href="page-candidates-job-alert.html"><span class="flaticon-alarm"></span> Job Alerts</a>
								<a class="dropdown-item {{Request::is('candidate/changePassword') ? 'active' : ''}}" href="{{route('candidateChangePassword')}}"><span class="flaticon-locked"></span> Change Password</a>
								@endif
								@if(auth::user()->user_type == 'company')
								<a class="dropdown-item {{Request::is('dashboard') ? 'active' : ''}}" href="{{route('dashboard')}}"><span class="flaticon-dashboard"></span> Dashboard</a>
								<a class="dropdown-item {{Request::is('company/profile') ? 'active' : ''}}" href="{{route('companyProfile')}}"><span class="flaticon-profile"></span> Company Profile</a>
								<a class="dropdown-item {{Request::is('company/post/job') ? 'active' : ''}}" href="{{ route('postJob') }}"><span class="flaticon-resume"></span> Post a New Job</a>
								<a class="dropdown-item {{Request::is('company/manage/job') ? 'active' : ''}}" href="{{ route('manageJob') }}"><span class="flaticon-paper-plane"></span> Manage Jobs</a>
								<a class="dropdown-item" href="page-employer-resume.html"><span class="flaticon-analysis"></span> Shortlisted Resumes</a>
								<a class="dropdown-item {{Request::is('followed/by') ? 'active' : ''}}" href="{{ route('followedBy') }}"><span class="flaticon-alarm"></span> Followed By</a>
								<a class="dropdown-item" href="page-employer-transactions.html"><span class="flaticon-chat"></span> Transactions</a>
								<a class="dropdown-item {{Request::is('company/changePassword') ? 'active' : ''}}" href="{{route('companyChangePassword')}}"><span class="flaticon-locked"></span> Change Password</a>
								@endif
								<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
								document.getElementById('logout-form').submit();"><span class="flaticon-logout"></span> Logout</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
								<a class="dropdown-item" href="#"><span class="flaticon-rubbish-bin"></span> Delete Profile</a>
					    	</div>
					    </div>
					</div>
		        </li>
            </ul>
			<div class="header stylehome1 dashbord_mobile_logo">
	            <img class="nav_logo_img img-fluid float-left mt25" src="{{asset('candidate_company/assets/images/header-logo.png')}}" alt="header-logo.png">
				<a class="bg-thm" href="#menu"><span></span></a>
			</div>
		</div><!-- /.mobile-menu -->
		<nav id="menu" class="stylehome1">
			<ul>
				<li>
		            <a href="{{ url('/') }}">Home</a>
                    </li>
                    @if(auth::user()->user_type == 'candidate')
                    <li>
		                <a href="#"><span class="title">Find a Job</span></a>
					</li>
					@endif
					@if(auth::user()->user_type == 'company')
                    <li>
		                <a href="{{ route('postJob') }}"><span class="title">Post a Job</span></a>
					</li>
					@endif
                    <li>
		                <a href="#"><span class="title">Blog</span></a>
					</li>
					<li>
		                <a href="{{ route('aboutUs') }}"><span class="title">About Us</span></a>
					</li>
					<li>
		                <a href="{{ route('contactUs') }}"><span class="title">Contact Us</span></a>
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