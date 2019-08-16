@extends('candidate.layouts.master')

@section('myCss')
<link rel="stylesheet" href="{{ asset('candidate_company/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('candidate_company/assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('candidate_company/assets/css/responsive.css') }}">
@endsection

@section('content')

<!-- main login registration area -->
<br><br><br>
    <section class="our-log-reg bgc-fa">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-lg-6">
					<div class="my_form">
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
				<div class="col-sm-12 col-lg-6">
					<div class="sign_up_form">
						<div class="heading">
							<h3 class="text-center">Login</h3>
						</div>
						<ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Candidate</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Company</a>
							</li>
						</ul>
						<!-- candidate -->
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								<form action="{{ route('login') }}" method="post">
								@csrf
							 <div class="form-group">
								<input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter email">
								 @error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<div class="form-group">
								<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Enter Password">
								 @error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<div class="form-group form-check">
								<input type="checkbox" class="form-check-input" name="remember" id="remember"  {{ old('remember') ? 'checked' : '' }}>
								<label class="form-check-label" for="exampleCheck1">Remember me</label>
								@if (Route::has('password.request'))
								<a class="tdu text-thm float-right" href="{{ route('password.request') }}">Forgot Password?</a>
								@endif
							</div>
							<button type="submit" class="btn btn-log btn-block btn-thm">Login</button>
							<p class="text-center">Don't have a <strong>Career Doctor</strong> account? <a class="text-thm" href="{{ route('register') }}">Sign Up!</a></p>
							<hr>
							<div class="row mt40">
								<div class="col-lg">
									<a href="#" style="border-radius: 4px;height: 50px;margin-bottom: 40px;" class="btn btn-block color-white bgc-fb"><i class="fa fa-facebook float-left mt5"></i> Facebook</a>
								</div>
								<div class="col-lg">
									<a href="{{ route('redirect') }}" style="border-radius: 4px;height: 50px;margin-bottom: 40px;" class="btn btn-block color-white bgc-gogle"><i class="fa fa-google float-left mt5"></i> Google</a>
								</div>
							</div>
								</form>
							</div>
							<!-- company -->
							<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
								<form action="{{ route('login') }}" method="post">
								@csrf
							 <div class="form-group">
						    	<input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter email">
								 @error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<div class="form-group">
						    	<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Enter Password">
								 @error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<div class="form-group form-check">
								<input type="checkbox" class="form-check-input" name="remember" id="remember"  {{ old('remember') ? 'checked' : '' }}>
								<label class="form-check-label" for="exampleCheck1">Remember me</label>
								@if (Route::has('password.request'))
								<a class="tdu text-thm float-right" href="{{ route('password.request') }}">Forgot Password?</a>
								@endif
							</div>
							<button type="submit" class="btn btn-log btn-block btn-thm">Login</button>
							<p class="text-center">Don't have a <strong>Career Doctor</strong> account? <a class="text-thm" href="{{ route('registerCompany') }}">Sign Up!</a></p>
							<hr>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection