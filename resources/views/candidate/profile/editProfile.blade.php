@extends('dashboard.layouts.master')

@section('content')

<div class="col-sm-12 col-lg-8 col-xl-9">
					<form action="{{ route('updateCandidateProfile') }}" method="post" enctype="multipart/form-data" class="my_profile_form_area employer_profile">
						<div class="row">
							<div class="col-lg-12">
								<h4 class="fz20 mb20">Update Profile</h4>
              				</div>
              @csrf
              <input type="hidden" name="id" value="{{$candidateGeneralInfo->id}}"> 
              	<div class="col-lg-6">
							    <div class="avatar-upload mb30">
							        <div class="avatar-edit">
							            <input class="btn btn-thm" name="image" type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
							            <label for="imageUpload"></label>
							        </div>
									<label style="color:#221f1f;margin-bottom: 4%;"> Update Profile Image</label>
							        <div class="avatar-preview">
							            <div id="imagePreview"></div>
							        </div>
							    </div>
							</div>
							<div class="col-lg-6">
							<div class="avatar-upload mb30" style="margin-top: -4%;">
								<label style="color:#221f1f;margin-bottom: 4%;"> Current Profile Image</label>
								<div class="avatar-preview">
                        <!-- <label for="fullname"> Current Image</label> -->
                        		<img src="{{asset($candidateImage)}}" alt="Profile Image" style="height: 100%;width: 100%;">
							        </div>
							    </div>
							</div>
							<div class="col-lg-12">
								<div class="my_profile_thumb_edit"></div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="my_profile_input form-group">
							    	<label for="fullname"> Current Position</label>
                    <input type="text" name="current_position" value="{{$candidateGeneralInfo->current_position}}" id="fullname" class="form-control">
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="my_profile_input form-group">
							    	<label for="fullname">Current Employer</label>
                    				<input type="text" id="fullname" name="current_employer" value="{{$candidateGeneralInfo->current_employer}}" class="form-control">
								</div>
							</div>
							<div class="col-md-6 col-lg-12">
								<div class="my_profile_input form-group">
							    	<label for="fullname"> Short Description</label>
                  				<textarea class="form-control" name="short_description" rows="5">{{$candidateGeneralInfo->short_description}}</textarea>
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="my_profile_input form-group">
							    	<label for="fullname">Contact Email</label>
									<input type="email" name="contact_email" value="{{$candidateGeneralInfo->contact_email}}" class="form-control @error('contact_email') is-invalid @enderror">
									@error('contact_email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="my_profile_input form-group">
							    	<label for="fullname">Contact Phone</label>
									<input type="text" id="fullname" name="contact_phone" value="{{$candidateGeneralInfo->contact_phone}}" class="form-control @error('contact_phone') is-invalid @enderror">
									@error('contact_phone')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-md-6 col-lg-12">
								<div class="my_profile_input form-group">
							    	<label for="fullname"> Current Address</label>
									<textarea name="current_address" id="fullname" class="form-control @error('current_address') is-invalid @enderror">{{$candidateGeneralInfo->current_address}}</textarea>
									@error('current_address')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<!-- <div class="col-md-6 col-lg-6">
								<div class="my_profile_select_box form-group">
							    	<label for="exampleFormControlInput4">Current Country</label><br>
							    	<select name="current_country_id" class="form-control @error('current_country_id') is-invalid @enderror">
										<option value="">Select Country</option>
									</select>
									@error('current_country_id')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div> -->
							<div class="col-md-6 col-lg-6">
								<div class="my_profile_input form-group">
							    	<label for="fullname"> Current Country</label>
									<select name="current_country_id" id="fullname" class="form-control @error('current_country_id') is-invalid @enderror">
									<option value="{{$candidateGeneralInfo->country->id}}">{{$candidateGeneralInfo->country->name}}</option>
									@foreach($countries as $country)
									<option value="{{$country->id}}">{{$country->name}}</option>
									@endforeach
									<select>
									@error('current_country_id')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="my_profile_input form-group">
							    	<label for="fullname"> Current City</label>
									<select name="current_city_id" id="fullname" class="form-control @error('current_city_id') is-invalid @enderror">
									<option value="{{$candidateGeneralInfo->city->id}}">{{$candidateGeneralInfo->city->name}}</option>
									<select>
									@error('current_city_id')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-md-6 col-lg-4">
								<div class="my_profile_input form-group">
							    	<label for="fullname"> Select your skill from following list</label>
									<select name="industry_id" id="fullname" class="form-control @error('industry_id') is-invalid @enderror">
									<option value="{{$candidateGeneralInfo->industry->id}}">{{$candidateGeneralInfo->industry->industry_name}}</option>
									@foreach($jobIndustries as $jobIndustry)
									<option value="{{$jobIndustry->id}}">{{$jobIndustry->industry_name}}</option>
									@endforeach
									<select>
									@error('industry_id')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-md-6 col-lg-4">
								<div class="my_profile_input form-group">
							    	<label for="fullname"> Current Postal Code</label>
									<input type="text" name="current_postcode" value="{{$candidateGeneralInfo->current_postcode}}" id="fullname" class="form-control @error('current_postcode') is-invalid @enderror">
									@error('current_postcode')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-md-6 col-lg-4">
								<div class="my_profile_input form-group">
							    	<label for="fullname">Status</label>
									<input type="text" id="fullname" name="current_status" value="{{$candidateGeneralInfo->current_status}}" class="form-control @error('current_status') is-invalid @enderror">
									@error('current_status')
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
							<!-- </form> -->
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
    jQuery(document).ready(function ()
    {
            jQuery('select[name="current_country_id"]').on('change',function(){
               var countryID = jQuery(this).val();
               if(countryID)
               {
                  jQuery.ajax({
                     url : '/CareerDoctor/public/getCities/' +countryID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[name="current_city_id"]').empty();
                        jQuery.each(data, function(key,value){
                           $('select[name="current_city_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="current_city_id"]').empty();
               }
            });
    });
</script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyABqK-5ngi3F1hrEsk7-mCcBPsjHM5_Gj0"></script>
<script type="text/javascript" src="{{ asset('candidate_company/assets/js/googlemaps1.js') }}"></script>
@endsection
@endsection