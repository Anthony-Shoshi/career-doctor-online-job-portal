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
						<form class="form-inline" target="_blank" method="POST" action="{{ route('jobListView') }}">
							@csrf
							<div class="search_option_one">
							    <div class="form-group">
							    	<label for="exampleInputName"><span class="flaticon-search"></span></label>
							    	<input type="text" name="keyword" class="form-control h70" id="exampleInputName" placeholder="Job Title or Keywords">
							    </div>
							</div>
							<div class="search_option_two">
							    <div class="form-group">
							    	<label for="exampleInputEmail"><span class="flaticon-location-pin"></span></label>
							    	<input type="text" name="location" class="form-control h70" id="exampleInputEmail" placeholder="Location">
							    </div>
							</div>
							<div class="search_option_button">
							    <button type="submit" class="btn btn-thm btn-secondary h70">Search</button>								
							</div>
						</form>
					</div>
					<p class="color-silver"><span class="color-white">Trending Keywords:</span> DesignCer,  Developer,  Web,  IOS,  PHP,  Senior,  Engineer</p>
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
							<div class="icon"><span class="flaticon-pen"></span></div>
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
								@endphp
								<h5 class="job_chedule text-thm mt0">{{ $jobTpe->title }}</h5>
								<div class="thumb fn-smd">
									<img class="img-fluid" src="{{ asset($companyImage) }}" alt="1.jpg" height ="100px" width="120px">
								</div>
								<h4>{{ $job->title }}</h4>
								<p>Posted : {{ date_format(new DateTime($job->created_at),'d M, Y') }} by <a class="text-thm" target="_blank" href="{{route('companyProfileView',[$job->company])}}">{{ $company->company_name }}</a></p>
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

	<!-- Expert Freelancer List -->
	<section class="expert-freelancer bgc-fa">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="ulockd-main-title">
						<h3 class="mt0">Hire Expert Freelancer</h3>
						<a class="text-thm float-right" href="#">Browse All Freelancers <i class="flaticon-right-arrow pl15"></i></a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="ef_slider">
						<div class="item">
							<div class="ef_post">
								<div class="ef_header">
									<h4 class="hr_rate"><span class="text-thm">$150</span> <small>/hr</small></h4>
									<a class="ef_bookmark" href="#" title="BookMark Freelancer"><span class="flaticon-bookmark"></span></a>
								</div>
								<div class="thumb text-center">
									<img class="img-fluid" src="images/team/1.jpg" alt="1.jpg">
								</div>
								<div class="freelancer_review">
									<div class="everage_rating">4.5</div>
									<ul class="rating_list">
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star-o"></span></a></li>
									</ul>
									<h4 class="title">Ali TUFAN</h4>
									<p>App Designer</p>
								</div>
								<div class="details">
									<div class="job_locate">
										<p>Location</p>
										<ul class="float-right">
											<li class="list-inline-item m0"><p>Turkey</p></li>
											<li class="list-inline-item m0"><img class="img-fluid pl5" src="images/resource/turkey.png" alt="turkey.png"></li>
										</ul>
									</div>
									<div class="job_srate">
										<p>Job Success</p>
										<p class="float-right">100%</p>
									</div>
									<div class="ef_prf_link mt10">
										<a class="btn btn-block btn-transparent" href="#">View Profile <i class="flaticon-right-arrow pl10"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="ef_post">
								<div class="ef_header">
									<h4 class="hr_rate"><span class="text-thm">$85</span> <small>/hr</small></h4>
									<a class="ef_bookmark" href="#" title="BookMark Freelancer"><span class="flaticon-bookmark"></span></a>
								</div>
								<div class="thumb text-center">
									<img class="img-fluid" src="images/team/2.jpg" alt="2.jpg">
								</div>
								<div class="freelancer_review">
									<div class="everage_rating">4.5</div>
									<ul class="rating_list">
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star-o"></span></a></li>
									</ul>
									<h4 class="title">Dominikus YURI</h4>
									<p>Front-end Developer</p>
								</div>
								<div class="details">
									<div class="job_locate">
										<p>Location</p>
										<ul class="float-right">
											<li class="list-inline-item m0"><p>United States</p></li>
											<li class="list-inline-item m0"><img class="img-fluid pl5" src="images/resource/usa.png" alt="usa.png"></li>
										</ul>
										
									</div>
									<div class="job_srate">
										<p>Job Success</p>
										<p class="float-right">100%</p>
									</div>
									<div class="ef_prf_link mt10">
										<a class="btn btn-block btn-transparent" href="#">View Profile <i class="flaticon-right-arrow pl10"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="ef_post">
								<div class="ef_header">
									<h4 class="hr_rate"><span class="text-thm">$200</span> <small>/hr</small></h4>
									<a class="ef_bookmark" href="#" title="BookMark Freelancer"><span class="flaticon-bookmark"></span></a>
								</div>
								<div class="thumb text-center">
									<img class="img-fluid" src="images/team/3.jpg" alt="3.jpg">
								</div>
								<div class="freelancer_review">
									<div class="everage_rating">4.5</div>
									<ul class="rating_list">
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star-o"></span></a></li>
									</ul>
									<h4 class="title">Deanna ROSE</h4>
									<p>UI - UX Designer</p>
								</div>
								<div class="details">
									<div class="job_locate">
										<p>Location</p>
										<ul class="float-right">
											<li class="list-inline-item m0"><p>Brazil</p></li>
											<li class="list-inline-item m0"><img class="img-fluid pl5" src="images/resource/brazil.png" alt="brazil.png"></li>
										</ul>
										
									</div>
									<div class="job_srate">
										<p>Job Success</p>
										<p class="float-right">100%</p>
									</div>
									<div class="ef_prf_link mt10">
										<a class="btn btn-block btn-transparent" href="#">View Profile <i class="flaticon-right-arrow pl10"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="ef_post">
								<div class="ef_header">
									<h4 class="hr_rate"><span class="text-thm">$150</span> <small>/hr</small></h4>
									<a class="ef_bookmark" href="#" title="BookMark Freelancer"><span class="flaticon-bookmark"></span></a>
								</div>
								<div class="thumb text-center">
									<img class="img-fluid" src="images/team/4.jpg" alt="4.jpg">
								</div>
								<div class="freelancer_review">
									<div class="everage_rating">4.5</div>
									<ul class="rating_list">
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star-o"></span></a></li>
									</ul>
									<h4 class="title">Lori Ramos</h4>
									<p>UX/UI Designer</p>
								</div>
								<div class="details">
									<div class="job_locate">
										<p>Location</p>
										<ul class="float-right">
											<li class="list-inline-item m0"><p>Turkey</p></li>
											<li class="list-inline-item m0"><img class="img-fluid pl5" src="images/resource/turkey.png" alt="turkey.png"></li>
										</ul>
									</div>
									<div class="job_srate">
										<p>Job Success</p>
										<p class="float-right">88%</p>
									</div>
									<div class="ef_prf_link mt10">
										<a class="btn btn-block btn-transparent" href="#">View Profile <i class="flaticon-right-arrow pl10"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="ef_post">
								<div class="ef_header">
									<h4 class="hr_rate"><span class="text-thm">$150</span> <small>/hr</small></h4>
									<a class="ef_bookmark" href="#" title="BookMark Freelancer"><span class="flaticon-bookmark"></span></a>
								</div>
								<div class="thumb text-center">
									<img class="img-fluid" src="images/team/5.jpg" alt="5.jpg">
								</div>
								<div class="freelancer_review">
									<div class="everage_rating">4.5</div>
									<ul class="rating_list">
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star-o"></span></a></li>
									</ul>
									<h4 class="title">Michele Snyder</h4>
									<p>Front-End Developer</p>
								</div>
								<div class="details">
									<div class="job_locate">
										<p>Location</p>
										<ul class="float-right">
											<li class="list-inline-item m0"><p>Turkey</p></li>
											<li class="list-inline-item m0"><img class="img-fluid pl5" src="images/resource/turkey.png" alt="turkey.png"></li>
										</ul>
									</div>
									<div class="job_srate">
										<p>Job Success</p>
										<p class="float-right">88%</p>
									</div>
									<div class="ef_prf_link mt10">
										<a class="btn btn-block btn-transparent" href="#">View Profile <i class="flaticon-right-arrow pl10"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="ef_post">
								<div class="ef_header">
									<h4 class="hr_rate"><span class="text-thm">$150</span> <small>/hr</small></h4>
									<a class="ef_bookmark" href="#" title="BookMark Freelancer"><span class="flaticon-bookmark"></span></a>
								</div>
								<div class="thumb text-center">
									<img class="img-fluid" src="images/team/6.jpg" alt="6.jpg">
								</div>
								<div class="freelancer_review">
									<div class="everage_rating">4.5</div>
									<ul class="rating_list">
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star-o"></span></a></li>
									</ul>
									<h4 class="title">Randall Warren</h4>
									<p>Graphics Designer</p>
								</div>
								<div class="details">
									<div class="job_locate">
										<p>Location</p>
										<ul class="float-right">
											<li class="list-inline-item m0"><p>Turkey</p></li>
											<li class="list-inline-item m0"><img class="img-fluid pl5" src="images/resource/turkey.png" alt="turkey.png"></li>
										</ul>
									</div>
									<div class="job_srate">
										<p>Job Success</p>
										<p class="float-right">88%</p>
									</div>
									<div class="ef_prf_link mt10">
										<a class="btn btn-block btn-transparent" href="#">View Profile <i class="flaticon-right-arrow pl10"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="ef_post">
								<div class="ef_header">
									<h4 class="hr_rate"><span class="text-thm">$150</span> <small>/hr</small></h4>
									<a class="ef_bookmark" href="#" title="BookMark Freelancer"><span class="flaticon-bookmark"></span></a>
								</div>
								<div class="thumb text-center">
									<img class="img-fluid" src="images/team/7.jpg" alt="7.jpg">
								</div>
								<div class="freelancer_review">
									<div class="everage_rating">4.5</div>
									<ul class="rating_list">
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star-o"></span></a></li>
									</ul>
									<h4 class="title">Peter Hawkins</h4>
									<p>Magento Certified Developer</p>
								</div>
								<div class="details">
									<div class="job_locate">
										<p>Location</p>
										<ul class="float-right">
											<li class="list-inline-item m0"><p>Turkey</p></li>
											<li class="list-inline-item m0"><img class="img-fluid pl5" src="images/resource/turkey.png" alt="turkey.png"></li>
										</ul>
									</div>
									<div class="job_srate">
										<p>Job Success</p>
										<p class="float-right">88%</p>
									</div>
									<div class="ef_prf_link mt10">
										<a class="btn btn-block btn-transparent" href="#">View Profile <i class="flaticon-right-arrow pl10"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="ef_post">
								<div class="ef_header">
									<h4 class="hr_rate"><span class="text-thm">$150</span> <small>/hr</small></h4>
									<a class="ef_bookmark" href="#" title="BookMark Freelancer"><span class="flaticon-bookmark"></span></a>
								</div>
								<div class="thumb text-center">
									<img class="img-fluid" src="images/team/8.jpg" alt="8.jpg">
								</div>
								<div class="freelancer_review">
									<div class="everage_rating">4.5</div>
									<ul class="rating_list">
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star-o"></span></a></li>
									</ul>
									<h4 class="title">Martha Griffin</h4>
									<p>Medical Professed</p>
								</div>
								<div class="details">
									<div class="job_locate">
										<p>Location</p>
										<ul class="float-right">
											<li class="list-inline-item m0"><p>Turkey</p></li>
											<li class="list-inline-item m0"><img class="img-fluid pl5" src="images/resource/turkey.png" alt="turkey.png"></li>
										</ul>
									</div>
									<div class="job_srate">
										<p>Job Success</p>
										<p class="float-right">88%</p>
									</div>
									<div class="ef_prf_link mt10">
										<a class="btn btn-block btn-transparent" href="#">View Profile <i class="flaticon-right-arrow pl10"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="ef_post">
								<div class="ef_header">
									<h4 class="hr_rate"><span class="text-thm">$150</span> <small>/hr</small></h4>
									<a class="ef_bookmark" href="#" title="BookMark Freelancer"><span class="flaticon-bookmark"></span></a>
								</div>
								<div class="thumb text-center">
									<img class="img-fluid" src="images/team/9.jpg" alt="9.jpg">
								</div>
								<div class="freelancer_review">
									<div class="everage_rating">4.5</div>
									<ul class="rating_list">
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star color-golden"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="fa fa-star-o"></span></a></li>
									</ul>
									<h4 class="title">Kathleen Moreno</h4>
									<p>Marketing Expert</p>
								</div>
								<div class="details">
									<div class="job_locate">
										<p>Location</p>
										<ul class="float-right">
											<li class="list-inline-item m0"><p>Turkey</p></li>
											<li class="list-inline-item m0"><img class="img-fluid pl5" src="images/resource/turkey.png" alt="turkey.png"></li>
										</ul>
									</div>
									<div class="job_srate">
										<p>Job Success</p>
										<p class="float-right">88%</p>
									</div>
									<div class="ef_prf_link mt10">
										<a class="btn btn-block btn-transparent" href="#">View Profile <i class="flaticon-right-arrow pl10"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


@endsection