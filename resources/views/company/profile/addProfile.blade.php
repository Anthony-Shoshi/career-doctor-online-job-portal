@extends('dashboard.layouts.master')

@section('content')

<div class="col-sm-12 col-lg-8 col-xl-9">
					<form action="{{ route('updateCompanyProfile') }}" method="post" enctype="multipart/form-data" class="my_profile_form_area employer_profile">
						<div class="row">
							<div class="col-lg-12">
								<h4 class="fz20 mb20">Company Profile</h4>
              				</div>
							@csrf
              <input type="hidden" name="id" value="{{$companyGeneralInfo->id}}">
              		<div class="col-lg-6">
							    <div class="avatar-upload mb30">
							        <div class="avatar-edit">
							            <input class="btn btn-thm" name="company_banner" type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
							            <label for="imageUpload"></label>
							        </div>
                      <label style="color:#221f1f;margin-bottom: 4%;"> Update Company Banner</label>
							        <div class="avatar-preview">
							            <div id="imagePreview"></div>
							        </div>
							    </div>
							</div>
              <div class="col-lg-6">
							<div class="avatar-upload mb30">
								<label style="color:#221f1f;margin-bottom: 4%;"> Current Company Banner</label>
								<div class="avatar-preview">
								@if($companyGeneralInfo->company_banner != '')
                        		<img src="{{asset($companyGeneralInfo->company_banner)}}" alt="Banner Image" style="height: 100%;width: 100%;">
								@endif
							        </div>
							    </div>
							</div>
							<div class="col-lg-12">
								<div class="my_profile_thumb_edit"></div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="my_profile_input form-group">
							    	<label for="fullname"> Company Name</label>
                    <input type="text" name="company_name" id="company_name" tabindex="2" class="form-control @error('company_name') is-invalid @enderror" autocomplete="company_name" value="{{$companyGeneralInfo->company_name}}">
										@error('company_name')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="my_profile_input form-group">
							    	<label for="fullname">Company Address</label>
                    <textarea name="company_default_address" class="form-control @error('company_default_address') is-invalid @enderror" id="company_default_address" cols="30" rows="10">{{$companyGeneralInfo->company_default_address}}</textarea>
										@error('company_default_address')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
								</div>
							</div>
              <div class="col-md-6 col-lg-6">
								<div class="my_profile_input form-group">
							    	<label for="fullname"> Current Country</label>
									<select name="company_default_country_id" id="company_default_country_id" class="form-control @error('company_default_country_id') is-invalid @enderror">
									@foreach($countries as $country)
										<option value="{{$country->id}}"{{ ($companyGeneralInfo->company_default_country_id == $country->id ? ' selected' : '' ) }}>{{$country->name}}</option>
									@endforeach
									<select>
									@error('company_default_country_id')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="my_profile_input form-group">
							    	<label for="fullname"> Current City</label>
									<select name="company_default_city_id" id="company_default_city_id" class="form-control @error('company_default_city_id') is-invalid @enderror">
										@foreach($cities as $city)
											<option value="{{ $city->id }}"{{ ($companyGeneralInfo->company_default_city_id == $city->id) ? ' selected' : '' }}>{{ $city->name }}</option>
										@endforeach
									<select>
									@error('company_default_city_id')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="my_profile_input form-group">
							    	<label for="fullname"> Industry Type</label>
                  	<select name="industry_id" id="industry_id" class="form-control @error('industry_id') is-invalid @enderror">
											<option value="{{$companyGeneralInfo->industry->id}}" selected>{{$companyGeneralInfo->industry->industry_name}}</option>
											@foreach($jobIndustries as $jobIndustry)
											<option value={{$jobIndustry->id}}>{{$jobIndustry->industry_name}}</option>
											@endforeach
										</select>
										@error('industry_id')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="my_profile_input form-group">
							    <label for="fullname"> Postal Code</label>
									<input type="company_default_postcode" name="company_default_postcode" id="company_default_postcode" tabindex="2" class="form-control @error('company_default_postcode') is-invalid @enderror" autocomplete="company_default_postcode" value="{{$companyGeneralInfo->company_default_postcode}}">
										@error('company_default_postcode')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
								</div>
							</div>
							<div class="col-md-6 col-lg-12">
								<div class="my_profile_input form-group">
							    <label for="fullname">Company Description </label>
									<textarea name="company_description" class="form-control" id="company_description" cols="30" rows="10">{{$companyGeneralInfo->company_description}}</textarea>
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="my_profile_input form-group">
							    <label for="fullname"> Contact Person's Name</label>
									<input type="text" name="contact_person_name" id="contact_person_name" tabindex="1" class="form-control @error('contact_person_name') is-invalid @enderror" value="{{$companyGeneralInfo->contact_person_name}}" autocomplete="contact_person_name" autofocus>
										@error('contact_person_name')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="my_profile_input form-group">
							    	<label for="fullname"> Contact Person's Email</label>
									<input type="email" name="contact_person_email" id="contact_person_email" tabindex="1" class="form-control @error('contact_person_email') is-invalid @enderror" value="{{$companyGeneralInfo->contact_person_email}}" autocomplete="contact_person_email" autofocus>
										@error('contact_person_email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="my_profile_input form-group">
							    <label for="fullname">Contact Person's Position</label>
								  <input type="text" name="contact_person_position" id="contact_person_position" tabindex="2" class="form-control @error('contact_person_position') is-invalid @enderror" autocomplete="contact_person_position" value="{{$companyGeneralInfo->contact_person_position}}">
										@error('contact_person_position')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
								</div>
							</div>
              <div class="col-md-6 col-lg-6">
								<div class="my_profile_input form-group">
							    <label for="fullname">Contact Person's Phone Number</label>
								  <input type="text" name="contact_person_phone" id="contact_person_phone" tabindex="2" class="form-control @error('contact_person_phone') is-invalid @enderror" autocomplete="contact_person_phone" value="{{$companyGeneralInfo->contact_person_phone}}">
										@error('contact_person_phone')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my_profile_input">
									<button class="btn btn-lg btn-thm">Update</button>									
								</div>
							</div>
						</div>
</form>
				</div>
@section('myJs')
<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
	}
}
$("#imageUpload").change(function() {
    readURL(this);
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
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyABqK-5ngi3F1hrEsk7-mCcBPsjHM5_Gj0"></script>
<script type="text/javascript" src="{{ asset('candidate_company/assets/js/googlemaps1.js') }}"></script>
@endsection
@endsection