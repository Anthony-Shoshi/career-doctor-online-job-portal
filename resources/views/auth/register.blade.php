@extends('candidate.layouts.master')

@section('myCss')
<link rel="stylesheet" href="{{ asset('candidate_company/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('candidate_company/assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('candidate_company/assets/css/responsive.css') }}">
@endsection

@section('content')
<br><br><br>
<section class="our-log-reg bgc-fa">
		<div class="container">
			<div class="row">
<div class="col-sm-12 col-lg-6">
					<div class="sign_up_form">
						<div class="heading">
							<h3 class="text-center">Create New Account as a <span class="btn btn-info" style="color:white;">Candidate</span></h3>
						</div>
						<!-- <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Candidate</a>
							</li>
						</ul> -->
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								<form action="{{ route('register') }}" method="post">
                                    <input type="hidden" name="user_type" value="candidate">
                                    @csrf
									<div class="form-group">
										<input type="text" name="name" id="username" tabindex="1" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Username" value="{{old('name')}}" autocomplete="name" autofocus>
										@error('name')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="2" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" autocomplete="email" value="{{old('email')}}">
										@error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" autocomplete="new-password">
										@error('password')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
									<div class="form-group">
										<input type="password" name="password_confirmation" id="password" tabindex="2" class="form-control" placeholder="Enter Password Confirmation" autocomplete="new-password">
									</div>
									<div class="form-group form-check">
										<input type="checkbox" class="form-check-input" id="exampleCheck2">
										<label class="form-check-label" for="exampleCheck2">By Registering You Confirm That You Accept <a class="text-thm" href="page-terms-and-policies.html">Terms & Conditions</a> And <a class="text-thm" href="page-terms-and-policies.html">Privacy Policy</a></label>
									</div>
                                    <button type="submit" class="btn btn-log btn-block btn-dark">Register</button>
                                    <p class="text-center">Already have a <strong>Career Doctor</strong> account? <a class="text-thm" href="{{route('login')}}">Sign In!</a></p>
                                <br>
                                </form>
							</div>
							
						</div>
					</div>
                </div>
                <div class="col-sm-12 col-lg-6">
					<div class="my_form_two">
						<h3>Shortlisted Jobs & other Features</h3>
						Save yourself from unwanted hassle!
						<hr>
						Use Shortlisted Jobs feature to save preferred jobs and get back to it easily.
						<hr>
						Stay up-to-date with statistical report of job activities.
                        <hr>
                        Save yourself from unwanted hassle!
						<hr>
						Use Shortlisted Jobs feature to save preferred jobs and get back to it easily.
						<hr>
						Stay up-to-date with statistical report of job activities.
						<hr>
						</div>
				</div>
</div>
</div>
</section>

@endsection