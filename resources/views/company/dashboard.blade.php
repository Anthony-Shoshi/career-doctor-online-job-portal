@extends('dashboard.layouts.master')

@section('content')
@section('myCss')
	<style>
		ul{
			list-style: none;
		}
	</style>
@endsection
@php
	$postedJobs = \App\Job::where('company', Auth::user()->id)->count();
	$followers = \App\CompanyFollower::where('company', Auth::user()->id)->count();
	$shortListedResumes = \App\ShortListedResume::where('company', Auth::user()->id)->count();
	$applications = \App\CandidateJobApplicationStatus::select('*')
                                                        ->join('jobs', 'jobs.id', 'candidate_job_application_statuses.job')
                                                        ->where('jobs.company', Auth::user()->id)
                                                        ->orderBy('candidate_job_application_statuses.created_at', 'DESC')
                                                        ->count();
@endphp
<div class="col-sm-12 col-lg-8 col-xl-9">
					<div class="row">
						<div class="col-lg-12">
							<h4 class="mb30">Dashboard</h4>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="ff_one">
								<div class="icon"><span class="flaticon-paper-plane"></span></div>
								<div class="detais">
									<div class="timer">{{ $postedJobs }}</div>
									<p>Posted Jobs</p>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="ff_one style2">
								<div class="icon"><span class="flaticon-user"></span></div>
								<div class="detais">
									<div class="timer">{{ $followers }}</div>
									<p>Followers</p>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="ff_one style3">
								<div class="icon"><span class="flaticon-alarm"></span></div>
								<div class="detais">
									<div class="timer">{{ $shortListedResumes }}</div>
									<p>Shortlisted</p>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="ff_one style4">
								<div class="icon"><span class="flaticon-open-envelope-with-letter"></span></div>
								<div class="detais">
									<div class="timer">{{ $applications }}</div>
									<p>Applications</p>
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
								<h4 class="title">Recent Applicants</h4>
								<div class="candidate_list_view style3 mb50">
									<div class="thumb">
										<img class="img-fluid rounded-circle" src="images/team/1.jpg" alt="1.jpg">
										<div class="cpi_av_rating"><span>4.5</span></div>
									</div>
									<div class="content">
										<h4 class="title">Ali TUFAN<span class="verified text-thm pl10"><i class="fa fa-check-circle"></i></span></h4>
										<p>App Designer</p>
										<ul class="review_list">
											<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</div>
					    			<ul class="freelancer_place mt25 float-right fn-xsd tac-xsd">
										<li class="list-inline-item"><a href="#"><span class="flaticon-location-pin"></span> Istanbul</a></li>
										<li class="list-inline-item"><a href="#"><button class="btn btn-thm">Hire</button></a></li>
					    			</ul>
								</div>
								<div class="candidate_list_view style3 mb50">
									<div class="thumb">
										<img class="img-fluid rounded-circle" src="images/team/c4.jpg" alt="c4.jpg">
										<div class="cpi_av_rating"><span>4.5</span></div>
									</div>
									<div class="content">
										<h4 class="title">Peter KING<span class="verified text-thm pl10"><i class="fa fa-check-circle"></i></span></h4>
										<p>iOS Expert + Node Dev</p>
										<ul class="review_list">
											<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</div>
					    			<ul class="freelancer_place mt25 float-right fn-xsd tac-xsd">
										<li class="list-inline-item"><a href="#"><span class="flaticon-location-pin"></span> Istanbul</a></li>
										<li class="list-inline-item"><a href="#"><button class="btn btn-thm">Hire</button></a></li>
					    			</ul>
								</div>
								<div class="candidate_list_view style3">
									<div class="thumb">
										<img class="img-fluid rounded-circle" src="images/team/c2.jpg" alt="c2.jpg">
										<div class="cpi_av_rating"><span>4.5</span></div>
									</div>
									<div class="content">
										<h4 class="title">Nateila JOHN<span class="verified text-thm pl10"><i class="fa fa-check-circle"></i></span></h4>
										<p>Front-End Developer</p>
										<ul class="review_list">
											<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</div>
					    			<ul class="freelancer_place mt25 float-right fn-xsd tac-xsd">
										<li class="list-inline-item"><a href="#"><span class="flaticon-location-pin"></span> Istanbul</a></li>
										<li class="list-inline-item"><a href="#"><button class="btn btn-thm">Hire</button></a></li>
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

@endsection