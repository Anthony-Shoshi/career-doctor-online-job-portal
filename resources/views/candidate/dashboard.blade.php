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
	$appliedJobsCount = \App\CandidateJobApplicationStatus::where('user', Auth::user()->id)->count();
	$coverLetterCount = \App\CandidateCoverLetter::where('user', Auth::user()->id)->count();
	$favouriteJobs = \App\ShortListedJob::where('candidate', Auth::user()->id)->count();
	$reviews = \App\CandidateRating::where('candidate_id', Auth::user()->id)->count();
	$candidate = Auth::user()->id;
	$appliedJobs = \App\CandidateJobApplicationStatus::select('*', 'candidate_job_application_statuses.id AS id')
					->join('jobs', 'jobs.id', 'candidate_job_application_statuses.job')
					->where('user', $candidate)
					->orderBy('candidate_job_application_statuses.created_at', 'DESC')
					->paginate(3);
@endphp
<div class="col-lg-8 col-xl-9">
					<div class="row">
						<div class="col-lg-12">
							<h4 class="mb30">Dashboard</h4>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="ff_one">
								<div class="icon"><span class="flaticon-paper-plane"></span></div>
								<div class="detais">
									<div class="timer">{{ $appliedJobsCount }}</div>
									<p>Applied Jobs</p>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="ff_one style2">
								<div class="icon"><span class="flaticon-favorites"></span></div>
								<div class="detais">
									<div class="timer">{{ $favouriteJobs }}</div>
									<p>Favorite Jobs</p>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="ff_one style3">
								<div class="icon"><span class="flaticon-letter"></span></div>
								<div class="detais">
									<div class="timer">{{ $coverLetterCount }}</div>
									<p>Cover Letters</p>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="ff_one style4">
								<div class="icon"><span class="flaticon-rating"></span></div>
								<div class="detais">
									<div class="timer">{{ $reviews }}</div>
									<p>Reviews</p>
								</div>
							</div>
						</div>
						<div class="col-xl-8">
							<div class="application_statics">
								<h4>Applications Statistics</h4>
								<div class="c_container"></div>
							</div>
						</div>
						@php
							$now = \Carbon\Carbon::today();
							$todaysViewer = \App\ViewCandidate::where('candidate', Auth::user()->id)->whereDate('created_at', $now)->count();
							$totalViewer = \App\ViewCandidate::where('candidate', Auth::user()->id)->count();
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
						<div class="col-xl-12">
							<div class="recent_job_apply">
								<h4 class="title">Recent Apply Jobs <a class="text-thm float-right" target="_blank" href="{{ route('jobListView') }}">Browse All Jobs <span class="flaticon-right-arrow"></span></a></h4>
								@if($appliedJobs->count() != 0)
								@foreach($appliedJobs as $appliedJob)
									@php
										$jobTpe = \App\JobType::where('id',$appliedJob->job_type)->first();
										$city = \App\City::where('id',$appliedJob->city_id)->first();
										$country = \App\Country::where('id',$appliedJob->country_id)->first();
										$currency = \App\Currency::where('id',$appliedJob->currency)->first();
										$company = \App\CompanyGeneralInfo::where('user_id',$appliedJob->company)->first();
										$companyImage = \App\User::where('id',$appliedJob->company)->first()->image;
									@endphp
								<div class="rj_grid">
									<h4 class="sub_title">{{ $appliedJob->title }}</h4>
									<p class="float-left">{{ date_format(new DateTime($appliedJob->created_at),'d M, Y') }} by <a class="text-thm" target="_blank" href="{{route('companyProfileView',[$appliedJob->company])}}">{{ $company->company_name }}</a></p>
									<ul class="rj_post_address float-right">
										<li class="list-inline-item"><a href="#"><span class="flaticon-location-pin"></span></a></li>
										<li class="list-inline-item"><a href="#">{{ $city->name }}, {{ $country->name }}</a></li>
										<li class="list-inline-item"><a target="_blank" href="{{ route('singleJobView', [$appliedJob->job]) }}" data-toggle="tooltip" data-placement="top" title="View Job"><span class="flaticon-eye"></span></a></li>
									</ul>
								</div>
								@endforeach
								@else
									<div class="text-center">No Recent Job Apply!</div>
								@endif
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
						label: 'Number of Application',
						borderColor: 'rgb(110,255,181)',
						backgroundColor: 'rgb(3,0,255)',
						data: {{ $perMonthApplication }},
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