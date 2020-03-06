@extends('candidate.layouts.master')
@section('content')
<!-- Inner Page Breadcrumb -->
	<section class="inner_page_breadcrumb bgc-f0 pt30 pb30" aria-label="breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="breadcrumb_title float-left">About Us</h4>
					<ol class="breadcrumb float-right">
					    <li class="breadcrumb-item"><a href="#">Home</a></li>
					    <li class="breadcrumb-item active" aria-current="page">About Us</li>
					</ol>
				</div>
			</div>
		</div>
    </section>

    <!-- About Text Content -->
	<section class="about-section bgc-fa">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="about_content">
						<h3>About {{ get_option('website_name') }}</h3>
						<p class="color-black22 mt30">Every single one of our jobs has some kind of flexibility option - such as telecommuting a part-time schedule or a flexible or flextime schedule.</p>
						<p>Track your results on the local or global market , depending on your needs. You can track everything in the most popular search engines - Google, Bing, Yahoo and Yandex. Improve your search performance and increase traffic with our turn-key.</p>
						<p class="mt30">Positionly is the only solution on the market that provides a simple and transparent way to monitor.the effectiveness.</p>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="about_thumb mt50">
						<img class="img-fluid" src="{{asset('candidate_company/assets/images/about/1.png')}}" alt="1.png">
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
    
    <!-- Testimonials -->
	<section class="testimonial-section bgc-fa">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="ulockd-main-title">
						<h3 class="mt0">What Our Clients Say About Us</h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="testimonial_slider">
						<div class="item">
							<div class="t_icon"><span class="flaticon-quotation-mark text-thm"></span></div>
							<div class="testimonial_post text-center">
								<div class="thumb">
									<img class="img-fluid" src="{{asset('candidate_company/assets/images/team/1.jpg')}}" alt="1.jpg">
								</div>
								<div class="client_info">
									<h4>Alex Gibson</h4>
									<p class="text-thm">Telemarketer</p>
								</div>
								<div class="details">
									<p>“I'm wondering why I never contacted these guys sooner! Seriously, they all have commendable talent in their respective fields and knocked my concept out of the ballpark. Thanks for an amazing experience!” </p>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="t_icon"><span class="flaticon-quotation-mark text-thm"></span></div>
							<div class="testimonial_post text-center">
								<div class="thumb">
									<img class="img-fluid" src="{{asset('candidate_company/assets/images/team/2.jpg')}}" alt="2.jpg">
								</div>
								<div class="client_info">
									<h4>Jack Graham</h4>
									<p class="text-thm">Co Founder, Coffee Inc</p>
								</div>
								<div class="details">
									<p>“I'm wondering why I never contacted these guys sooner! Seriously, they all have commendable talent in their respective fields and knocked my concept out of the ballpark. Thanks for an amazing experience!” </p>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="t_icon"><span class="flaticon-quotation-mark text-thm"></span></div>
							<div class="testimonial_post text-center">
								<div class="thumb">
									<img class="img-fluid" src="{{asset('candidate_company/assets/images/team/3.jpg')}}" alt="3.jpg">
								</div>
								<div class="client_info">
									<h4>Alex Gibson</h4>
									<p class="text-thm">Telemarketer</p>
								</div>
								<div class="details">
									<p>“I'm wondering why I never contacted these guys sooner! Seriously, they all have commendable talent in their respective fields and knocked my concept out of the ballpark. Thanks for an amazing experience!” </p>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="t_icon"><span class="flaticon-quotation-mark text-thm"></span></div>
							<div class="testimonial_post text-center">
								<div class="thumb">
									<img class="img-fluid" src="{{asset('candidate_company/assets/images/team/4.jpg')}}" alt="4.jpg">
								</div>
								<div class="client_info">
									<h4>Jack Graham</h4>
									<p class="text-thm">Co Founder, Coffee Inc</p>
								</div>
								<div class="details">
									<p>“I'm wondering why I never contacted these guys sooner! Seriously, they all have commendable talent in their respective fields and knocked my concept out of the ballpark. Thanks for an amazing experience!” </p>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="t_icon"><span class="flaticon-quotation-mark text-thm"></span></div>
							<div class="testimonial_post text-center">
								<div class="thumb">
									<img class="img-fluid" src="{{asset('candidate_company/assets/images/team/5.jpg')}}" alt="5.jpg">
								</div>
								<div class="client_info">
									<h4>Alex Gibson</h4>
									<p class="text-thm">Telemarketer</p>
								</div>
								<div class="details">
									<p>“I'm wondering why I never contacted these guys sooner! Seriously, they all have commendable talent in their respective fields and knocked my concept out of the ballpark. Thanks for an amazing experience!” </p>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="t_icon"><span class="flaticon-quotation-mark text-thm"></span></div>
							<div class="testimonial_post text-center">
								<div class="thumb">
									<img class="img-fluid" src="{{asset('candidate_company/assets/images/team/3.jpg')}}" alt="3.jpg">
								</div>
								<div class="client_info">
									<h4>Alex Gibson</h4>
									<p class="text-thm">Telemarketer</p>
								</div>
								<div class="details">
									<p>“I'm wondering why I never contacted these guys sooner! Seriously, they all have commendable talent in their respective fields and knocked my concept out of the ballpark. Thanks for an amazing experience!” </p>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="t_icon"><span class="flaticon-quotation-mark text-thm"></span></div>
							<div class="testimonial_post text-center">
								<div class="thumb">
									<img class="img-fluid" src="{{asset('candidate_company/assets/images/team/4.jpg')}}" alt="4.jpg">
								</div>
								<div class="client_info">
									<h4>Jack Graham</h4>
									<p class="text-thm">Co Founder, Coffee Inc</p>
								</div>
								<div class="details">
									<p>“I'm wondering why I never contacted these guys sooner! Seriously, they all have commendable talent in their respective fields and knocked my concept out of the ballpark. Thanks for an amazing experience!” </p>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="t_icon"><span class="flaticon-quotation-mark text-thm"></span></div>
							<div class="testimonial_post text-center">
								<div class="thumb">
									<img class="img-fluid" src="{{asset('candidate_company/assets/images/team/3.jpg')}}" alt="3.jpg">
								</div>
								<div class="client_info">
									<h4>Alex Gibson</h4>
									<p class="text-thm">Telemarketer</p>
								</div>
								<div class="details">
									<p>“I'm wondering why I never contacted these guys sooner! Seriously, they all have commendable talent in their respective fields and knocked my concept out of the ballpark. Thanks for an amazing experience!” </p>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="t_icon"><span class="flaticon-quotation-mark text-thm"></span></div>
							<div class="testimonial_post text-center">
								<div class="thumb">
									<img class="img-fluid" src="{{asset('candidate_company/assets/images/team/4.jpg')}}" alt="4.jpg">
								</div>
								<div class="client_info">
									<h4>Jack Graham</h4>
									<p class="text-thm">Co Founder, Coffee Inc</p>
								</div>
								<div class="details">
									<p>“I'm wondering why I never contacted these guys sooner! Seriously, they all have commendable talent in their respective fields and knocked my concept out of the ballpark. Thanks for an amazing experience!” </p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Our Team Members -->
	<section class="our-team">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="ulockd-main-title mb50">
						<h3 class="mt0">Our Creative Team</h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="team_slider">
						<div class="item">
							<div class="team_member">
								<div class="tm_thumb">
									<img class="img-fluid" src="{{asset('candidate_company/assets/images/team/10.jpg')}}" alt="10.jpg">
								</div>
								<div class="overlay">
									<div class="tm_social_icon">
										<ul>
											<li class="list-inline-item"><a href="#"><i class="fa fa-facebook-square"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="details">
									<h4>Martha Giriffin</h4>
									<h5>Marketing Expert</h5>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="team_member">
								<div class="tm_thumb">
									<img class="img-fluid" src="{{asset('candidate_company/assets/images/team/11.jpg')}}" alt="11.jpg">
								</div>
								<div class="overlay">
									<div class="tm_social_icon">
										<ul>
											<li class="list-inline-item"><a href="#"><i class="fa fa-facebook-square"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="details">
									<h4>Martha Giriffin</h4>
									<h5>Marketing Expert</h5>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="team_member">
								<div class="tm_thumb">
									<img class="img-fluid" src="{{asset('candidate_company/assets/images/team/12.jpg')}}" alt="12.jpg">
								</div>
								<div class="overlay">
									<div class="tm_social_icon">
										<ul>
											<li class="list-inline-item"><a href="#"><i class="fa fa-facebook-square"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="details">
									<h4>Martha Giriffin</h4>
									<h5>Marketing Expert</h5>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="team_member">
								<div class="tm_thumb">
									<img class="img-fluid" src="{{asset('candidate_company/assets/images/team/13.jpg')}}" alt="13.jpg">
								</div>
								<div class="overlay">
									<div class="tm_social_icon">
										<ul>
											<li class="list-inline-item"><a href="#"><i class="fa fa-facebook-square"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="details">
									<h4>Martha Giriffin</h4>
									<h5>Marketing Expert</h5>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection