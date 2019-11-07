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
	$appliedJobs = \App\CandidateJobApplicationStatus::where('user', Auth::user()->id)->count();
	$favouriteJobs = \App\ShortListedJob::where('candidate', Auth::user()->id)->count();
	$reviews = \App\CandidateRating::where('candidate_id', Auth::user()->id)->count();
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
									<div class="timer">{{ $appliedJobs }}</div>
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
								<div class="icon"><span class="flaticon-alarm"></span></div>
								<div class="detais">
									<div class="timer">11</div>
									<p>Job Alerts</p>
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