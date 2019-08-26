<div class="col-sm-12 col-lg-4 col-xl-3 dn-smd">
					<div class="user_profile">
						<div class="media">
						  	<img src="{{asset(auth::user()->image)}}" class="align-self-start mr-3 rounded-circle" alt="User Image">
						  	<div class="media-body">
						    	<h5 class="mt-0">Hi, {{auth::user()->name}}</h5>
						    	<p>{{auth::user()->user_type}}</p>
							</div>
						</div>
					</div>
					<div class="dashbord_nav_list">
						<ul>
							@if(auth::user()->user_type == 'candidate')
							<li class="{{Request::is('dashboard') ? 'active' : ''}}"><a href="{{route('dashboard')}}"><span class="flaticon-dashboard"></span> Dashboard</a></li>
							<li class="{{Request::is('/candidate/profile') ? 'active' : ''}}"><a href="{{route('candidateProfile')}}"><span class="flaticon-profile"></span> Profile</a></li>
							<li><a href="page-candidates-my-resume.html"><span class="flaticon-resume"></span> Resume</a></li>
							<li><a href="page-candidates-applied-jobs.html"><span class="flaticon-paper-plane"></span> Applied Jobs</a></li>
							<li><a href="page-candidates-cv-manager.html"><span class="flaticon-analysis"></span> CV Manager</a></li>
							<li><a href="page-candidates-favourite-jobs.html"><span class="flaticon-favorites"></span> Favourite Jobs</a></li>
							<li><a href="page-candidates-message.html"><span class="flaticon-chat"></span> Messages</a></li>
							<li><a href="page-candidates-review.html"><span class="flaticon-rating"></span> Reviews</a></li>
							<li><a href="page-candidates-job-alert.html"><span class="flaticon-alarm"></span> Job Alerts</a></li>
							<li class="{{Request::is('/candidate/changePassword') ? 'active' : ''}}"><a href="{{route('changePassword')}}"><span class="flaticon-locked"></span> Change Password</a></li>
							<li><a href="page-log-reg.html"><span class="flaticon-logout"></span> Logout</a></li>
							<li><a href="#"><span class="flaticon-rubbish-bin"></span> Delete Profile</a></li>
							@endif
							@if(auth::user()->user_type == 'company')
							<li class="{{Request::is('dashboard') ? 'active' : ''}}"><a href="{{route('dashboard')}}"><span class="flaticon-dashboard"></span> Dashboard</a></li>
							<li class="{{Request::is('/company/profile') ? 'active' : ''}}"><a href="{{route('companyProfile')}}"><span class="flaticon-profile"></span> Company Profile</a></li>
							<li><a href="page-employer-post-job.html"><span class="flaticon-resume"></span> Post a New Job</a></li>
							<li><a href="page-employer-manage-job.html"><span class="flaticon-paper-plane"></span> Manage Jobs</a></li>
							<li><a href="page-employer-resume.html"><span class="flaticon-analysis"></span> Shortlisted Resumes</a></li>
							<li><a href="page-employer-packages.html"><span class="flaticon-favorites"></span> Packages</a></li>
							<li><a href="page-employer-transactions.html"><span class="flaticon-chat"></span> Transactions</a></li>
							<li class="{{Request::is('/company/changePassword') ? 'active' : ''}}"><a href="{{route('changePassword')}}"><span class="flaticon-locked"></span> Change Password</a></li>
							<li><a href="page-log-reg.html"><span class="flaticon-logout"></span> Logout</a></li>
							<li><a href="#"><span class="flaticon-rubbish-bin"></span> Delete Profile</a></li>
							@endif
						</ul>
					</div>
					@if(auth::user()->user_type == 'candidate')
					<div class="skill_sidebar_widget">
						<h4>Skills Percentage <span class="float-right font-weight-bold">85%</span></h4>
						<p>Put value for "Cover Image" field to increase your skill up to "15%"</p>
				        <ul class="skills">
				            <li class="progressbar3" data-width="85" data-target="85"></li>
				        </ul>
					</div>
					@endif
				</div>