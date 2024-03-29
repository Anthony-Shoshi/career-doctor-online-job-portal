@extends('candidate.layouts.master')

@section('myCss')
<link rel="stylesheet" href="{{ asset('candidate_company/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('candidate_company/assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('candidate_company/assets/css/responsive.css') }}">
<link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
@endsection

@section('content')
<br><br><br>
<section class="our-log-reg bgc-fa">
		<div class="container">
			<div class="row">
<div class="col-sm-12 col-lg-12">
					<div class="sign_up_form">
						<div class="heading">
							<h3 class="text-center">Create New Account as a <span class="btn btn-info" style="color:white;">Company</span></h3>
						</div>
						<!-- <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Candidate</a>
							</li>
						</ul> -->
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								<form action="{{ route('saveRegisterCompany') }}" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="user_type" value="company">
                                    @csrf
									<h4>Account Information</h4>
									<hr>
									<div class="form-row">
									<div class="form-group col-md-6">
										<input type="text" name="name" id="username" tabindex="1" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Username" value="{{old('name')}}" autocomplete="name">
										@error('name')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
										</div>
									<div class="form-group col-md-6">
										<input type="text" name="email" id="email" tabindex="1" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" value="{{old('email')}}" autocomplete="email">
										@error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
										<input type="password" name="password" id="password" tabindex="2" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" autocomplete="new-password">
										@error('password')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
									<div class="form-group col-md-6">
										<input type="password" name="password_confirmation" id="password" tabindex="2" class="form-control" placeholder="Enter Password Confirmation" autocomplete="new-password">
									</div>
									</div>
									<h4>Company General Information</h4>
									<hr>
									<div class="form-row">
										<div class="form-group col-md-6">
										<input type="text" name="company_name" id="company_name" tabindex="2" class="form-control @error('company_name') is-invalid @enderror" placeholder="Enter Company Name" autocomplete="company_name" value="{{old('company_name')}}">
										@error('company_name')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
									<div class="form-group col-md-6">
										<textarea name="company_default_address" class="form-control @error('company_default_address') is-invalid @enderror" id="company_default_address" cols="30" rows="10" placeholder="Enter Company Address">{{old('company_default_address')}}</textarea>
										@error('company_default_address')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
									</div>
									<div class="form-row">
									<div class="form-group col-md-4">
									<select name="company_default_country_id" id="company_default_country_id" class="form-control @error('company_default_country_id') is-invalid @enderror">
											<option value=" " selected>Select Country</option>
											@foreach($countries as $country)
											<option value={{$country->id}}{{ old('company_default_country_id') == $country->id ? ' selected' : '' }}>{{$country->name}}</option>
											@endforeach
										</select>
										@error('company_default_country_id')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
										</div>
										<div class="form-group col-md-4">
										<select name="company_default_city_id" id="company_default_city_id" class="form-control @error('company_default_city_id') is-invalid @enderror">
											<option value=" " selected>Select City</option>
										</select>
										@error('company_default_city_id')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
									<div class="form-group col-md-4">
										<input type="company_default_postcode" name="company_default_postcode" id="company_default_postcode" tabindex="2" class="form-control @error('company_default_postcode') is-invalid @enderror" placeholder="Enter Postal Code" autocomplete="company_default_postcode" value="{{old('company_default_postcode')}}">
										@error('company_default_postcode')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<select name="industry_id" id="industry_id" class="form-control @error('industry_id') is-invalid @enderror">
												<option value=" " selected>Select Industry Type</option>
												@foreach($jobIndustries as $jobIndustry)
													<option value={{$jobIndustry->id}}{{ old('industry_id') == $jobIndustry->id ? ' selected' : ''}}>{{$jobIndustry->industry_name}}</option>
												@endforeach
											</select>
											@error('industry_id')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
									<div class="form-group col-md-6">
										<input type="file" class="form-control" name="company_banner">
									</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-3">
											<select name="team_size" class="form-control @error('team_size') is-invalid @enderror">
												<option value="" selected>Select Team Size</option>
												<option value="1 - 10"{{ old('team_size') == "1 - 10" ? ' selected' : ''}}>1 - 10</option>
												<option value="10 - 50"{{ old('team_size') == "10 - 50" ? ' selected' : ''}}>10 - 50</option>
												<option value="50 - 100"{{ old('team_size') == "50 - 100" ? ' selected' : ''}}>50 - 100</option>
												<option value="100 - 200"{{ old('team_size') == "100 - 200" ? ' selected' : ''}}>100 - 200</option>
												<option value="200 +"{{ old('team_size') == "200 +" ? ' selected' : ''}}>200 +</option>
											</select>
											@error('team_size')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
										<div class="form-group col-md-3">
											<input type="text" id="passingYear" class="form-control yearPicker @error('established') is-invalid @enderror" value="{{ old('established') }}" name="established" placeholder="Enter Established Year">
											@error('established')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
										<div class="form-group col-md-6">
											<input type="text" name="website" id="website" tabindex="2" class="form-control @error('website') is-invalid @enderror" placeholder="Enter Company Website" autocomplete="website" value="{{old('website')}}">
											@error('website')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-12">
											<textarea name="company_description" class="form-control" id="company_description" cols="30" rows="10" placeholder="Enter Company Description">{{ old('company_description') }}</textarea>
										</div>
									</div>
									<h4>Contact Information</h4>
									<hr>
									<div class="form-row">
									<div class="form-group col-md-6">
										<input type="text" name="contact_person_name" id="contact_person_name" tabindex="1" class="form-control @error('contact_person_name') is-invalid @enderror" placeholder="Enter Contact Person's Name" value="{{old('contact_person_name')}}" autocomplete="contact_person_name">
										@error('contact_person_name')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
										</div>
									<div class="form-group col-md-6">
										<input type="email" name="contact_person_email" id="contact_person_email" tabindex="1" class="form-control @error('contact_person_email') is-invalid @enderror" placeholder="Enter Contact Person's Email" value="{{old('contact_person_email')}}" autocomplete="contact_person_email">
										@error('contact_person_email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
										<input type="text" name="contact_person_position" id="contact_person_position" tabindex="2" class="form-control @error('contact_person_position') is-invalid @enderror" placeholder="Enter Contact Person's Position" autocomplete="contact_person_position" value="{{old('contact_person_position')}}">
										@error('contact_person_position')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
									<div class="form-group col-md-6">
										<input type="text" name="contact_person_phone" id="contact_person_phone" tabindex="2" class="form-control @error('contact_person_phone') is-invalid @enderror" placeholder="Enter Contact Person's Phone Number" autocomplete="contact_person_phone" value="{{old('contact_person_phone')}}">
										@error('contact_person_phone')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
									</div>
									<div id="app">
									<div class="form-group form-check">
										<input type="checkbox" v-model="checked" class="form-check-input" id="exampleCheck2">
										<label class="form-check-label" for="exampleCheck2">By Registering You Confirm That You Accept <a class="text-thm" href="{{ route('termsAndConditions') }}">Terms & Conditions</a> And <a class="text-thm" href="{{ route('privacyAndPolicy') }}">Privacy Policy</a></label>
									</div>
                                    <button :disabled="!checked" type="submit" class="btn btn-log btn-block btn-dark">Register</button>
                                    <p class="text-center">Already have a <strong>Career Doctor</strong> account? <a class="text-thm" href="{{route('login')}}">Sign In!</a></p>
									</div>
									<br>
                                </form>
							</div>
							
						</div>
					</div>
                </div>
</div>
</div>
</section>
@section('myJs')
<!-- <script src="{{asset('js/app.js')}}" ></script> -->
<script>
new Vue({
	el : '#app',
	data: {
	checked : false
	}
});
</script>
<script type="text/javascript">
	// Country City
	$(document).on('change','#company_default_country_id',function(){
		var countryID = $(this).val();
		if (countryID != ''){
			$.ajax({
				url: '{{ url('getCities') }}/' + countryID,
				type: 'GET',
				success:function(data){
					$('#company_default_city_id').html(data);
				}
			})
		}
		else {
			$('#company_default_city_id').html('<option value="">Select City</option>');
		}
	});
</script>
<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
<script>
	$('body').on('focus',".yearPicker", function(){
		if( $(this).hasClass('hasDatepicker') === false )  {
			$(this).datepicker({
				minViewMode: 2,
				format: 'yyyy',
				endDate: new Date()
			});
		}
	});
</script>
@endsection
@endsection