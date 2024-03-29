<section class="footer_top_area p0">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-lg-2 pb25 pt25">
					<div class="logo-widget">
						<img class="img-fluid" src="{{ get_logo() }}" alt="header-logo.png">
					</div>
				</div>
				@php
					$candidates = \App\User::where('user_type', 'candidate')->count();
					$companies = \App\User::where('user_type', 'company')->count();
					$postedJobs = \App\Job::all()->count();
					$openJobs = \App\Job::where('is_published', 1)->count();
				@endphp
				<div class="col-sm-12 col-lg-6 pb25 pt25 pl60 pr40 brdr_left_right">
					<div class="row">
						<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
							<div class="funfact_one">
								<div class="timer">{{ $openJobs }}</div>
								<p>Open Jobs</p>
							</div>
						</div>
						<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
							<div class="funfact_one">
								<div class="timer">{{ $postedJobs }}</div>
								<p>Jobs Posted</p>
							</div>
						</div>
						<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
							<div class="funfact_one">
								<div class="timer">{{ $companies }}</div>
								<p>Companies</p>
							</div>
						</div>
						<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
							<div class="funfact_one">
								<div class="timer">{{ $candidates }}</div>
								<p>Candidates</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-lg-4 pb25 pt25 pl30">
					<div class="footer_social_widget mt15">
						<p class="float-left mt10">Follow Us</p>
						<ul>
							<li class="list-inline-item"><a href="{{ get_option('facebook_link') }}"><i class="fa fa-facebook"></i></a></li>
							<li class="list-inline-item"><a href="{{ get_option('linkedin_link') }}"><i class="fa fa-linkedin"></i></a></li>
							<li class="list-inline-item"><a href="{{ get_option('twitter_link') }}"><i class="fa fa-twitter"></i></a></li>
							<li class="list-inline-item"><a href="{{ get_option('instagram_link') }}"><i class="fa fa-instagram"></i></a></li>
							<li class="list-inline-item"><a href="{{ get_option('pinterest_link') }}"><i class="fa fa-pinterest"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Our Footer -->
	<section class="footer_one">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-md-3 col-lg-2">
					<div class="quick_link_widget">
						<h4>Quick Links</h4>
						<ul class="list-unstyled">
							<li><a href="{{ route('jobListView') }}">Find Jobs</a></li>
							<li><a href="{{ route('postJob') }}">Post New Job</a></li>
							<li><a href="{{ route('jobListView') }}">Jobs Listing</a></li>
							<li><a href="{{ route('candidateListView') }}">Find Candidate</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-md-3 col-lg-3">
					<div class="candidate_widget">
						<h4>For Candidates</h4>
						<ul class="list-unstyled">
							<li><a href="{{ route('dashboard') }}">User Dashboard</a></li>
							<li><a href="{{ route('createResume') }}">Create Resume</a></li>
							<li><a href="{{ route('candidateListView') }}">Candidate Listing</a></li>
							<li><a href="{{ route('viewShortListedJob') }}">Favorite Jobs</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-4 col-md-4 col-md-3 col-lg-3">
					<div class="employe_widget">
						<h4>For Employers</h4>
						<ul class="list-unstyled">
							<li><a href="{{ route('postJob') }}">Post New Job</a></li>
							<li><a href="{{ route('manageJob') }}">Manage Job</a></li>
							<li><a href="{{ route('shortListedResumes') }}">Shortlisted Resumes</a></li>
							<li><a href="{{ route('jobApplication') }}">Manage Applications</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Our Footer Bottom Area -->
	<section class="footer_bottom_area p0">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 pb10 pt10">
					<div class="copyright-widget tac-smd mt20" style="width: 101%;">
						<p>{{ get_option('footer_text') }}</p>
					</div>
				</div>
				<div class="col-lg-8 pb10 pt10">
					<div class="footer_menu text-right mt10">
						<ul>
							<li class="list-inline-item"><a href="{{ route('privacyAndPolicy') }}">Privacy Policy</a></li>
							<li class="list-inline-item"><a href="{{ route('termsAndConditions') }}">Terms of Service</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>