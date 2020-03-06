@extends('candidate.layouts.master')

@section('content')

<section class="home-one parallax ulockd_bgih1" data-stellar-background-ratio="0.3">
		<div class="container">
			<div class="row home-content">
				<div class="col-lg-8">
					<div class="home-text">
						<h2 class="fz40">{{ get_option('slogan') }}</h2>
						<p class="color-silver">Each month, more than 7 million jobseekers turn to website in their search for work, making over 160,000 applications every day.</p>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="home-job-search-box mt20 mb20">
						<form class="form-inline" method="POST" action="{{ route('candidateListView') }}">
							@csrf
							<div class="search_option_one">
							    <div class="form-group">
							    	<label for="exampleInputName"><span class="flaticon-search"></span></label>
							    	<input type="text" name="candidate" class="form-control h70" id="keyword" placeholder="E.g John Smith or Keywords">
							    </div>
							</div>
							<div class="search_option_two">
							    <div class="form-group">
							    	<label for="exampleInputEmail"><span class="flaticon-location-pin"></span></label>
							    	<input type="text" name="candidate_location" class="form-control h70" id="exampleInputEmail" placeholder="Location">
							    </div>
							</div>
							<div class="search_option_button">
							    <button type="submit" class="btn btn-thm btn-secondary h70">Search</button>								
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Popular Job Categories -->
	<section class="popular-job bgc-fa">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="ulockd-main-title">
						<h3 class="mt0">Popular Job Categories</h3>
					</div>
				</div>
			</div>
			<div class="row">
				@php
					$jobCategories = \App\JobCategory::all()->random(8);
				@endphp
				@foreach($jobCategories as $jobCategory)
				@php
					$countOpenJobs = \App\Job::where('job_category', $jobCategory->id)->where('is_published', 1)->count();
				@endphp
				<div class="col-sm-6 col-lg-3">
					<a href="#" class="icon_hvr_img_box sbbg1" style="background-image: url(images/service/1.jpg);">
						<div class="overlay">
							<div class="icon"><span class="{{ $jobCategory->category_icon }}"></span></div>
							<div class="details">
								<h5>{{ $jobCategory->category_name }}</h5>
								<p>{{ $countOpenJobs }}</p>
							</div>
						</div>
					</a>
				</div>
				@endforeach
				<div class="col-lg-6 offset-lg-3">
					<div class="pjc_all_btn text-center">
						<a class="btn btn-transparent" href="#">Browse All Categories <span class="flaticon-right-arrow pl10"></span></a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- How It's Work -->
	<section class="popular-job">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="ulockd-main-title">
						<h3 class="mt0">How It Works?</h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-lg-4 prpl5">
					<div class="icon_box_hiw">
						<div class="icon"><div class="list_tag float-right"><p>1</p></div><span class="flaticon-unlocked"></span></div>
						<div class="details">
							<h4>Create An Account</h4>
							<p>Post a job to tell us about your project. We'll quickly match you with the right freelancers.</p>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-4 prpl5 mt20-xxsd">
					<div class="icon_box_hiw">
						<div class="icon middle"><div class="list_tag float-right"><p>2</p></div><span class="flaticon-job"></span></div>
						<div class="details">
							<h4>Search Jobs</h4>
							<p>Browse profiles, reviews, and proposals then interview top candidates.</p>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-4 prpl5 mt20-xxsd">
					<div class="icon_box_hiw">
						<div class="icon"><div class="list_tag float-right"><p>3</p></div><span class="flaticon-trophy"></span></div>
						<div class="details">
							<h4>Save & Apply</h4>
							<p>Use the Upwork platform to chat, share files, and collaborate from your desktop or on the go.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Features Job List Design -->
	<section class="popular-job bgc-fa pb30">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="ulockd-main-title">
						<h3 class="mt0">Featured Jobs</h3>
						<a class="text-thm float-right" href="{{ route('jobListView') }}" target="_blank">Browse All Jobs <i class="flaticon-right-arrow pl15"></i></a>
					</div>
				</div>
			</div>
			<div class="row">
				@foreach($jobs as $job)
					<div class="col-sm-12 col-lg-12">
						<div class="fj_post">
							<div class="details">
								@php
									$jobTpe = \App\JobType::where('id',$job->job_type)->first();
                                    $city = \App\City::where('id',$job->city_id)->first();
                                    $country = \App\Country::where('id',$job->country_id)->first();
                                    $currency = \App\Currency::where('id',$job->currency)->first();
                                    $company = \App\CompanyGeneralInfo::where('user_id',$job->company)->first();
									$companyImage = \App\User::where('id',$job->company)->first()->image;
									$total_job = \App\job::where('company', $job->company)->count();
								@endphp
								<h5 class="job_chedule text-thm mt0">{{ $jobTpe->title }}</h5>
								<div class="thumb fn-smd">
									<img class="img-fluid" src="{{ asset($companyImage) }}" alt="1.jpg" height ="100px" width="120px">
								</div>
								<h4>{{ $job->title }}</h4>
								<p>Posted : {{ date_format(new DateTime($job->created_at),'d M, Y') }} by
									<a class="text-thm" target="_blank" href="{{route('companyProfileView',[$job->company])}}">{{ $company->company_name }}</a></p>
									@if($total_job >= 1)
										<i style="color:white;padding: 3px;background: orange;border-radius: 100%;" title="Active Company" class="fa fa-star-o" aria-hidden="true"></i>
									@endif
								<ul class="featurej_post">
									<li class="list-inline-item"><span class="flaticon-location-pin"></span> {{ $city->name }}, {{ $country->name }}</li>
									@if($job->is_negotiable == 1)
										<li class="list-inline-item"><span class="flaticon-price pl20"></span> Negotiable</li>
									@else
										<li class="list-inline-item"><span class="flaticon-price pl20"></span> {{ $job->min_salary/1000 .'k' }} {{ $currency->code }} - {{ $job->max_salary/1000 .'k' }} {{ $currency->code }} @php $salary_terms = str_replace('_', ' ', $job->salary_terms) @endphp {{ ucwords(strtolower($salary_terms)) }}</li>
									@endif
								</ul>
							</div>
							<a class="btn btn-md btn-transparent float-right fn-smd" href="{{ route('singleJobView',[$job->id]) }}" target="_blank">Browse Job</a>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</section>

	<!-- Browse Local Jobs -->
	<section class="job-location pb30">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="ulockd-main-title">
						<h3 class="mt0">Browse Local Jobs</h3>
						<a class="text-thm float-right" href="#">Browse All Local Jobs <i class="flaticon-right-arrow pl15"></i></a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-lg-4">
					<a href="#" class="job_loc_img_box">
						<div class="thumb"><img class="img-fluid" src="{{ asset('candidate_company/assets/images/service/9.jpg') }}" alt="9.jpg"></div>
						<div class="details">
							<h4>London</h4>
							<h5>152,141</h5>
						</div>
					</a>
				</div>
				<div class="col-sm-6 col-lg-4">
					<a href="#" class="job_loc_img_box">
						<div class="thumb"><img class="img-fluid" src="{{ asset('candidate_company/assets/images/service/10.jpg') }}" alt="10.jpg"></div>
						<div class="details">
							<h4>Manchester</h4>
							<h5>586,478</h5>
						</div>
					</a>
				</div>
				<div class="col-sm-6 col-lg-4">
					<a href="#" class="job_loc_img_box">
						<div class="thumb"><img class="img-fluid" src="{{ asset('candidate_company/assets/images/service/11.jpg') }}" alt="11.jpg"></div>
						<div class="details">
							<h4>Liverpool</h4>
							<h5>15,258</h5>
						</div>
					</a>
				</div>
				<div class="col-sm-6 col-lg-4">
					<a href="#" class="job_loc_img_box">
						<div class="thumb"><img class="img-fluid" src="{{ asset('candidate_company/assets/images/service/12.jpg') }}" alt="12.jpg"></div>
						<div class="details">
							<h4>Istanbul</h4>
							<h5>152,141</h5>
						</div>
					</a>
				</div>
				<div class="col-sm-6 col-lg-4">
					<a href="#" class="job_loc_img_box">
						<div class="thumb"><img class="img-fluid" src="{{ asset('candidate_company/assets/images/service/13.jpg') }}" alt="13.jpg"></div>
						<div class="details">
							<h4>New York</h4>
							<h5>586,478</h5>
						</div>
					</a>
				</div>
				<div class="col-sm-6 col-lg-4">
					<a href="#" class="job_loc_img_box">
						<div class="thumb"><img class="img-fluid" src="{{ asset('candidate_company/assets/images/service/14.jpg') }}" alt="14.jpg"></div>
						<div class="details">
							<h4>Los Angeles</h4>
							<h5>15,258</h5>
						</div>
					</a>
				</div>
			</div>
		</div>
	</section>


@endsection

@section('myJs')

	<script>
		$(document).ready(function() {
			$( "#keyword" ).autocomplete({

				source: function(request, response) {
					$.ajax({
						url: "{{route('autocompleteCandidate')}}",
						data: {
							term : request.term
						},
						dataType: "json",
						success: function(data){
							var resp = $.map(data,function(obj){
								//console.log(obj.city_name);
								return obj.name;
							});

							response(resp);
						}
					});
				},
				minLength: 1
			});
		});

	</script>
@endsection