@extends('dashboard.layouts.master')
@section('myCss')
    <link rel="stylesheet" href="{{asset('css/stepForm.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/typeaheadjs.css')}}">
    <style>
        @media (max-width: 768px) {
            .custom-checkbox{
                padding-top: 15px !important;
                padding-left: 25px !important;
            }
            #customCheckbox {
                padding-left: 6px !important;
                padding-top: 13px !important;
            }
        }
        .required {
            color: red;
        }
    </style>
@endsection
@section('content')
    <div class="col-sm-12 col-lg-8 col-xl-9">
        <div class="container">
            <div class="stepwizard">
                <div class="stepwizard-row setup-panel">
                    <div class="stepwizard-step col-xs-2">
                        <a href="#step-1" type="button" class="btn btn-success my-btn">1</a>
                        <p><small>General Information</small></p>
                    </div>
                    <div class="stepwizard-step col-xs-2">
                        <a href="#step-2" type="button" class="btn btn-success my-btn disabled">2</a>
                        <p><small>Experience</small></p>
                    </div>
                    <div class="stepwizard-step col-xs-2">
                        <a href="#step-3" type="button" class="btn btn-success my-btn disabled">3</a>
                        <p><small>Education</small></p>
                    </div>
                    <div class="stepwizard-step col-xs-2">
                        <a href="#step-4" type="button" class="btn btn-success my-btn disabled">4</a>
                        <p><small>Extra-curricular</small></p>
                    </div>

                </div>
            </div>

            <form role="form" action="{{route('saveCandidateResume')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="panel panel-primary setup-content" id="step-1">
                    <div class="panel-heading">
                        <h3 class="panel-title">General Information</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <div class="avatar-upload mb30 profileAvatar">
                                    <div class="avatar-edit profileAvatarEdit">
                                        <input class="btn btn-thm" type="file" name="image" id="imageUpload" accept=".png, .jpg, .jpeg">
                                        <label for="imageUpload"></label>
                                    </div>
                                    <div class="avatar-preview profileAvatarPriview">
                                        <div id="imagePreview"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Contact Email <span class="required">*</span></label>
                                <input type="email" class="form-control" value="{{old('contact_email')}}" name="contact_email" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Contact Phone Number <span class="required">*</span></label>
                                <input type="number" class="form-control" value="{{old('contact_phone')}}" name="contact_phone" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Gender <span class="required">*</span></label>
                                <select class="form-control" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="MALE">Male</option>
                                    <option value="FEMALE">Female</option>
                                    <option value="OTHER">Others</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Date of Birth <span class="required">*</span></label>
                                <input type="date" class="form-control" value="{{ old('date_of_birth') }}" name="date_of_birth" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Short Description</label>
                                <textarea class="form-control" name="short_description">{{ old('short_description') }}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Current Country <span class="required">*</span></label>
                                <select class="form-control" name="current_country_id" id="country" required>
                                    <option value="">Select Country</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Current City <span class="required">*</span></label>
                                <select class="form-control" name="current_city_id" id="city" required>
                                    <option value="">Select City</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Current Address <span class="required">*</span></label>
                                <textarea class="form-control" name="current_address" required></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Industry <span class="required">*</span></label>
                                <select name="industry_id" id="fullname" class="form-control @error('industry_id') is-invalid @enderror" required>
                                    <option value="">Select Industry</option>
                                    @foreach($jobIndustries as $jobIndustry)
                                        <option value="{{$jobIndustry->id}}">{{$jobIndustry->industry_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Current Postal Code <span class="required">*</span></label>
                                <input type="text" class="form-control" value="{{old('current_postcode')}}" name="current_postcode" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Status <span class="required">*</span></label>
                                <select name="current_status" id="fullname" class="form-control @error('current_status') is-invalid @enderror" required>
                                    <option value="">Select Current Status</option>
                                    <option value="1">Actively looking rigth now</option>
                                    <option value="2">Open, but not actively looking</option>
                                    <option value="3">Not interested in jobs</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Current Position</label>
                                <input type="text" class="form-control" value="{{old('current_position')}}" name="current_position">
                                <i class="fa fa-check-circle" style="color:green;"></i> <span style="color: green;">This field will helps employers find you more frequently.</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Current Employer</label>
                                <input type="text" class="form-control" value="{{old('current_employer')}}" name="current_employer">
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                    </div>
                </div>

                <div class="panel panel-primary setup-content" id="step-2">
                    <div class="panel-heading">
                        <h3 class="panel-title">Experience</h3>
                    </div>
                    <div class="panel-body">
                        <div class="experienceFieldGroup">
                            <h4>Experience 1</h4>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Position <span class="required">*</span></label>
                                    <input type="text" class="form-control" value="{{old('position')}}" name="position[]" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Company Name <span class="required">*</span></label>
                                    <input type="text" class="form-control" value="{{old('company_name')}}" name="company_name[]" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Country <span class="required">*</span></label>
                                    <select class="form-control" name="country[]" id="country" required>
                                        <option value="">Select Country</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>City <span class="required">*</span></label>
                                    <select class="form-control" name="city[]" id="city" required>
                                        <option value="">Select City</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label>Start Date <span class="required">*</span></label>
                                    <input type="date" class="form-control startDateId" value="{{old('start_date')}}" name="start_date[]" required>
                                </div>
                                <div class="form-group col-md-5">
                                    <label>End Date <span class="required">*</span></label>
                                    <input type="date" class="form-control" id="endDate" value="{{old('end_date')}}" name="end_date[]" required>
                                </div>
                                <div class="form-check col-md-2" id="customCheckbox" style="padding-top: 25px;padding-left: 20px;">
                                    <input type="checkbox" name="is_current[]" class="myCheckBoxInput" id="isCurrentExperience" value="1">
                                    <input type="hidden" name="is_current[]" id="isCurrentHiddenValue" value="0">
                                    <label class="myCheckBoxLabel">Current</label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div class="my_resume_skill">
                                        <label>Skills <span class="required">*</span></label>
                                        <input type="text" id="skill_name" name="skill_name[]" data-role="tagsinput" placeholder="Add Skills">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Experience Summery</label>
                                    <textarea type="text" class="form-control" name="experience_summary[]"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success btn-sm float-left" id="experienceAddMore"><i class="fa fa-plus"></i></button>
                        <br>
                        <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                    </div>
                </div>

                <div class="panel panel-primary setup-content" id="step-3">
                    <div class="panel-heading">
                        <h3 class="panel-title">Education</h3>
                    </div>
                    <div class="panel-body">
                        <div class="education_field_group">
                            <h4>Academic 1</h4>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Degree <span class="required">*</span></label>
                                    <select class="form-control" name="degree[]" required>
                                        <option value="">Select Degree</option>
                                        @foreach($educationDegrees as $educationDegree)
                                            <option value="{{$educationDegree->id}}">{{$educationDegree->degree_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Degree Title <span class="required">*</span></label>
                                    <input type="text" class="form-control" value="{{ old('degree_title') }}" name="degree_title[]" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Institue Name <span class="required">*</span></label>
                                    <input type="text" class="form-control" value="{{ old('institute_name') }}" name="institute_name[]" required>

                                </div>
                                <div class="form-group col-md-6">
                                    <label>Location <span class="required">*</span></label>
                                    <input type="text" class="form-control" value="{{ old('location') }}" name="location[]" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label>Grade/CGPA <span class="required">*</span></label>
                                    <input type="text" class="form-control" value="{{ old('grade') }}" name="grade[]" required>
                                </div>
                                <div class="form-group col-md-5">
                                    <label>Passing Year <span class="required">*</span></label>
                                    <input type="text" id="passingYear" class="form-control yearPicker" value="{{ old('passing_year') }}" name="passing_year[]" required>
                                </div>
                                <div class="form-check col-md-2" id="customCheckbox" style="padding-top: 25px;padding-left: 20px;">
                                    <input type="checkbox" name="is_running[]" class="myCheckBoxInput" id="isRuningEducation" value="1">
                                    <input type="hidden" name="is_running[]" id="hiddenValue" value="0">
                                    <label class="myCheckBoxLabel">Running</label>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success btn-sm float-left" id="educationAddMore"><i class="fa fa-plus"></i></button>
                        <br>
                        <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                    </div>
                </div>

                <div class="panel panel-primary setup-content" id="step-4">
                    <div class="panel-heading">
                        <h3 class="panel-title">Extra-curricular</h3>
                    </div>
                    <div class="panel-body">
                        <div class="extraCurriCularFieldGroup">
                        <h4>Extra-curricular 1</h4>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label> Title <span class="required">*</span></label>
                                <input type="text" class="form-control" value="{{ old('title') }}" name="title[]" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Description</label>
                                <textarea type="text" class="form-control" name="description[]"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Type <span class="required">*</span></label>
                                <select class="form-control" name="type[]" required>
                                    <option value="">Select Type</option>
                                    <option value="1">Award</option>
                                    <option value="2">Course</option>
                                    <option value="3">Activity</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Date <span class="required">*</span></label>
                                <input type="date" class="form-control startDateId" value="{{old('date')}}" name="date[]" required>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success btn-sm float-left" id="extraCurricularAddMore"><i class="fa fa-plus"></i></button>
                        <br>
                        <button class="btn btn-primary nextBtn pull-right" type="submit">Save</button>
                    </div>
                    </div>
                </div>
            </form>
            {{--        Education--}}
            <div class="education_field_group educationRepeat" style="display: none;">
                <h4>Academic <span id="academicNumber"></span> <button class="btn btn-danger btn-sm float-right" type="button" id="educationRemove"><i class="fa fa-minus"></i></button></h4>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Degree <span class="required">*</span></label>
                        <select class="form-control" name="degree[]">
                            <option value="">Select Degree</option>
                            @foreach($educationDegrees as $educationDegree)
                                <option value="{{$educationDegree->id}}">{{$educationDegree->degree_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Degree Title <span class="required">*</span></label>
                        <input type="text" class="form-control" value="{{ old('degree_title') }}" name="degree_title[]">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Institue Name <span class="required">*</span></label>
                        <input type="text" class="form-control" value="{{ old('institute_name') }}" name="institute_name[]">

                    </div>
                    <div class="form-group col-md-6">
                        <label>Location <span class="required">*</span></label>
                        <input type="text" class="form-control" value="{{ old('location') }}" name="location[]">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label>Grade/CGPA <span class="required">*</span></label>
                        <input type="text" class="form-control" value="{{ old('grade') }}" name="grade[]">
                    </div>
                    <div class="form-group col-md-5">
                        <label>Passing Year <span class="required">*</span></label>
                        <input type="text" id="passingYear" class="form-control yearPicker" value="{{ old('passing_year') }}" name="passing_year[]">
                    </div>
                    <div class="form-check col-md-2" id="customCheckbox" style="padding-top: 25px;padding-left: 20px;">
                        <input type="checkbox" name="is_running[]" class="myCheckBoxInput" id="isRuningEducation" value="1">
                        <input type="hidden" name="is_running[]" id="hiddenValue" value="0">
                        <label class="myCheckBoxLabel">Running</label>
                    </div>
                </div>
            </div>
            {{--        Experience--}}
            <div class="experienceFieldGroup experienceRepeat" style="display: none;">
                <h4>Experience <span id="experienceNumber"></span><button class="btn btn-danger btn-sm float-right" type="button" id="experienceRemove"><i class="fa fa-minus"></i></button></h4>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Position <span class="required">*</span></label>
                        <input type="text" class="form-control" value="{{old('position')}}" name="position[]">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Company Name <span class="required">*</span></label>
                        <input type="text" class="form-control" value="{{old('company_name')}}" name="company_name[]">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Country <span class="required">*</span></label>
                        <select class="form-control" name="country[]" id="country">
                            <option value="">Select Country</option>
                            @foreach($countries as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>City <span class="required">*</span></label>
                        <select class="form-control" name="city[]" id="city">
                            <option value="">Select City</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label>Start Date <span class="required">*</span></label>
                        <input type="date" class="form-control startDateId" value="{{old('start_date')}}" name="start_date[]">
                    </div>
                    <div class="form-group col-md-5">
                        <label>End Date <span class="required">*</span></label>
                        <input type="date" class="form-control" id="endDate" value="{{old('end_date')}}" name="end_date[]">
                    </div>
                    <div class="form-check col-md-2" id="customCheckbox" style="padding-top: 25px;padding-left: 20px;">
                        <input type="checkbox" name="is_current[]" class="myCheckBoxInput" id="isCurrentExperience" value="1">
                        <input type="hidden" name="is_current[]" id="isCurrentHiddenValue" value="0">
                        <label class="myCheckBoxLabel">Current</label>
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="my_resume_skill">
                        <label>Skills</label>
                        <input type="text" name="skill_name[]" id="tags" placeholder="Add Skills">
                    </div>
                </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Experience Summery</label>
                        <textarea type="text" class="form-control" name="experience_summary[]"></textarea>
                    </div>
                </div>
            </div>
            {{--        ExtraCurriCular--}}
            <div class="extraCurriCularFieldGroup extraRepeat" style="display: none;">
                <h4>Extra-curricular <span id="extraNumber"></span><button class="btn btn-danger btn-sm float-right" type="button" id="extraRemove"><i class="fa fa-minus"></i></button></h4>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label> Title <span class="required">*</span></label>
                        <input type="text" class="form-control" value="{{ old('title') }}" name="title[]">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Description</label>
                        <textarea type="text" class="form-control" name="description[]"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label> Type <span class="required">*</span></label>
                        <select class="form-control" name="type[]">
                            <option value="">Select Type</option>
                            <option value="1">Award</option>
                            <option value="2">Course</option>
                            <option value="3">Activity</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label> Date <span class="required">*</span></label>
                        <input type="date" class="form-control startDateId" value="{{old('date')}}" name="date[]">
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('myJs')
    <script src="{{asset('js/stepForm.js')}}"></script>
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
        // Check education running or not
        $(document).on('click','#isRuningEducation',function () {
            if ($(this).is(':checked') == true){
                $(this).parent().find('#hiddenValue').attr('disabled', true);
                $(this).parent().parent().find('#passingYear').attr('disabled', true);
                //console.log(value);
            } else {
                $(this).parent().find('#hiddenValue').attr('disabled', false);
                $(this).parent().parent().find('#passingYear').attr('disabled', false);
                //console.log('unchecked');
            }
        });
        // Check experience running or not
        $(document).on('click','#isCurrentExperience',function () {
            if ($(this).is(':checked') == true){
                $(this).parent().find('#isCurrentHiddenValue').attr('disabled', true);
                $(this).parent().parent().find('#endDate').attr('disabled', true);
                //console.log(value);
            } else {
                $(this).parent().find('#isCurrentHiddenValue').attr('disabled', false);
                $(this).parent().parent().find('#endDate').attr('disabled', false);
                //console.log('unchecked');
            }
        });
        // experience
        var experienceI = 2;
        $('#experienceAddMore').on('click',function () {
            var form = $('.experienceRepeat').clone().removeClass('experienceRepeat').css('display','block');
            form.find('#experienceNumber').text(experienceI);
            form.find('select').val('');
            form.find('#tags').tagsinput({
                typeaheadjs: {
                    name:'skill_name',
                    source: skill_name.ttAdapter()
                }
            });
            //form.find('input').val('');
            $('#experienceAddMore').before(form);
            experienceI++;
        });
        $(document).on('click','#experienceRemove',function () {
            $(this).parent().parent().remove();
        });
        // education
        var i = 2;
        $('#educationAddMore').on('click',function(){
            var form = $('.educationRepeat').clone().removeClass('educationRepeat').css('display', 'block');
            form.find('#academicNumber').text(i);
            $("#educationAddMore").before(form);
            i++;
        });
        $(document).on('click','#educationRemove',function(){
            $(this).parent().parent().remove();
        });
        //extracurricular
        var i = 2;
        $('#extraCurricularAddMore').on('click',function(){
            var form = $('.extraRepeat').clone().removeClass('extraRepeat').css('display', 'block');
            form.find('#extraNumber').text(i);
            $("#extraCurricularAddMore").before(form);
            i++;
        });
        $(document).on('click','#extraRemove',function(){
            $(this).parent().parent().remove();
        });
        // Country City
        $(document).on('change','#country',function(){
            var dis = $(this);
            var countryID = dis.val();
            if (countryID != ''){
                $.ajax({
                    url: '{{ url('getCities') }}/' + countryID,
                    type: 'GET',
                    success:function(data){
                        dis.parent().parent().find('#city').html(data);
                    }
                })
            }
            else {
                dis.parent().parent().find('#city').html('<option value="">Select City</option>');
            }
        });
    </script>
    <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('js/typeahead.bundle.js')}}"></script>
    <script type="text/javascript">
        $('body').on('focus',".yearPicker", function(){
            if( $(this).hasClass('hasDatepicker') === false )  {
                $(this).datepicker({
                    minViewMode: 2,
                    format: 'yyyy',
                    endDate: new Date()
                });
            }
        });

        $(function(){
            $('[type="date"]').prop('max', function(){
                return new Date().toJSON().split('T')[0];
            });
        });

    </script>

    <script>
            var skill_name = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                prefetch: {
                    url: "{{url('getSkillsTag')}}",
                    cache: false
                }
            });

            skill_name.initialize();

            $('#skill_name').tagsinput({
               typeaheadjs: {
                   name:'skill_name',
                   source: skill_name.ttAdapter()
               }
            });
    </script>
@endsection
@endsection