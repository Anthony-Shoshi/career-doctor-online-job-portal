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

	$companyID = Auth::user()->id;
	$recentAppliedCandidates = \App\CandidateJobApplicationStatus::select('*', 'candidate_job_application_statuses.id AS id', 'candidate_job_application_statuses.created_at AS appliedDate')
															->join('users', 'users.id', 'candidate_job_application_statuses.user')
															->join('candidate_general_infos', 'candidate_general_infos.user_id', 'candidate_job_application_statuses.user')
															->join('jobs', 'jobs.id', 'candidate_job_application_statuses.job')
															->where('jobs.company', $companyID)
															->orderBy('candidate_job_application_statuses.created_at', 'DESC')
															->paginate(3);
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
								<h4>Job Post Statistics</h4>
								<div class="c_container"></div>
							</div>
						</div>
						@php
							$now = \Carbon\Carbon::today();
							$todaysViewer = \App\ViewCompany::where('company', Auth::user()->id)->whereDate('created_at', $now)->count();
							$totalViewer = \App\ViewCompany::where('company', Auth::user()->id)->count();
						@endphp
						<div class="col-xl-4">
							<div class="recent_job_trafic">
								<h4>Profile View Statistics</h4>
								<div class="trafic_details">
									<div class="circlechart" data-percentage="{{ $todaysViewer }}">{{ $todaysViewer }}</div>
									<ul class="trafic_list float-left">
										<li>{{ $totalViewer }}</li>
										<li class="list-inline-item"><span class="bgc-fb"></span></li>
										<li class="list-inline-item">Total View</li>
									</ul>
									<ul class="trafic_list">
										<li>{{ $todaysViewer }}</li>
										<li class="list-inline-item"><span class="bgc-gogle"></span></li>
										<li class="list-inline-item">Today's View</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-xl-8">
							<div class="recent_job_apply">
								<h4 class="title">Recent Applicants</h4>
								@if($recentAppliedCandidates->count() != 0)
								@foreach($recentAppliedCandidates as $recentAppliedCandidate)
									@php
										$city = \App\City::where('id',$recentAppliedCandidate->current_city_id)->first();
                                        $country = \App\Country::where('id',$recentAppliedCandidate->current_country_id)->first();
                                        $totalRaters = \App\CandidateRating::where('candidate_id', $recentAppliedCandidate->user)->where('candidate_ratings.is_deleted', 0)->count();
                                        $totalRating = \App\CandidateRating::where('candidate_id', $recentAppliedCandidate->user)->where('candidate_ratings.is_deleted', 0)->sum('rating');
                                        $avgRating = 0;
                                        if ($totalRaters > 0) {
                                            $avgRating = round($totalRating / $totalRaters, 1);
                                        }
									@endphp
								<div class="candidate_list_view style3 mb50">
									<div class="thumb">
										<img class="img-fluid rounded-circle" src="{{ asset($recentAppliedCandidate->image) }}" alt="1.jpg">
										<div class="cpi_av_rating"><span>{{ $avgRating }}</span></div>
									</div>
									<div class="content">
										<h4 class="title">{{ $recentAppliedCandidate->name }}<span class="verified text-thm pl10"><i class="fa fa-check-circle"></i></span></h4>
										@if($recentAppliedCandidate->current_position != '')
											<p>{{ $recentAppliedCandidate->current_position }}</p>
										@endif
										<ul class="review_list">
											@if( $avgRating == 1 || $avgRating < 1.5)
												<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
												<li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
												<li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
												<li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
												<li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
											@elseif( $avgRating == 2 || $avgRating < 2.5)
												<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
												<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
												<li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
												<li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
												<li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
											@elseif( $avgRating == 3 || $avgRating < 3.5)
												<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
												<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
												<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
												<li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
												<li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
											@elseif( $avgRating == 4 || $avgRating < 4.5)
												<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
												<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
												<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
												<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
												<li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
											@elseif( $avgRating == 5 || $avgRating >= 4.5)
												<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
												<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
												<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
												<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
												<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
											@endif
										</ul>
									</div>
					    			<ul class="freelancer_place mt25 float-right fn-xsd tac-xsd">
										<li class="list-inline-item"><a href="#"><span class="flaticon-location-pin"></span> {{ $city->name }}, {{ $country->name }}</a></li>
										<li class="list-inline-item"><a target="_blank" href="{{ route('candidateProfileView', $recentAppliedCandidate->user) }}"><button class="btn btn-thm">View</button></a></li>
					    			</ul>
								</div>
								@endforeach
								@else
									<div class="text-center">No Recent Applicants!</div>
								@endif
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
@section('myJs')
	<script>
		function createConfig() {
			return {
				type: 'line',
				data: {
					labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
					datasets: [{
						label: 'Number of Job',
						borderColor: 'rgb(110,255,181)',
						backgroundColor: 'rgb(3,0,255)',
						data: {{ $perMonthJob }},
						fill: false,
					}]
				},
				options: {
					responsive: true,
					title: {
						display: true,
						text: 'Sample tooltip with border'
					},
					tooltips: {
						position: 'nearest',
						mode: 'index',
						intersect: false,
						yPadding: 10,
						xPadding: 10,
						caretSize: 8,
						backgroundColor: 'rgb(252,255,232)',
						titleFontColor: 'rgb(0,1,6)',
						bodyFontColor: window.chartColors.black,
						borderColor: 'rgba(0,0,0,1)',
						borderWidth: 4
					},
				}
			};
		}

		window.onload = function() {
			var c_container = document.querySelector('.c_container');
			var div = document.createElement('div');
			div.classList.add('chart-container');

			var canvas = document.createElement('canvas');
			div.appendChild(canvas);
			c_container.appendChild(div);

			var ctx = canvas.getContext('2d');
			var config = createConfig();
			new Chart(ctx, config);
		};
	</script>
@endsection