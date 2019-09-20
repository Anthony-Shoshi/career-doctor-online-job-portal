@extends('dashboard.layouts.master')
@section('content')
@section('myCss')
    <link rel="stylesheet" href="{{ asset('css/myStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/summernote-bs4.css') }}">
    <style>
        @media (max-width: 768px) {
            .custom-switch {
                padding-left: 2.25rem !important;
                margin-top: 12px !important;
            }
            .custom-checkbox{
                padding-top: 15px !important;
                padding-left: 25px !important;
            }
            .is-visa {
                padding-top: 65px !important;
            }
            .is-relocation{
                padding-top: 63px !important;
            }
            .btn-thm{
                margin-top: 20px !important;
            }
            .mb20 {
                margin-bottom: 5px !important;
                margin-top: 12px !important;
            }
        }
        .custom-switch {
            padding-left: 37px;
            padding-bottom: 10px;
        }
        .custom-control-input:checked~.custom-control-label::before {
            color: #fff;
            border-color: #79b530;
            background-color: #79b530;
        }
        .custom-checkbox{
            padding-top: 50px;
            padding-left: 30px;
        }
        .hiddenField {
            display: none;
        }
        .required {
            color: red;
        }
    </style>
@endsection
    <div class="col-sm-12 col-lg-8 col-xl-9">
        <form action="{{ route('savePostJob') }}" method="post">
            @csrf
        <div class="my_profile_form_area">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="fz20 mb20">Post a New Job</h4>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                    <div class="icon_boxs">
                        <div class="icon"><span class="flaticon-work"></span></div>
                        <div class="details"><h4>2 Job Posted</h4></div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                    <div class="icon_boxs">
                        <div class="icon style2"><span class="flaticon-resume"></span></div>
                        <div class="details"><h4>3 Applications</h4></div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                    <div class="icon_boxs">
                        <div class="icon style3"><span class="flaticon-work"></span></div>
                        <div class="details"><h4>1 Active Jobs</h4></div>
                    </div>
                </div>
                <div class="col-lg-12 mt30">
                    <div class="my_profile_thumb_edit"></div>
                </div>
                <div class="col-lg-12">
                    <div class="my_profile_input form-group">
                        <label>Job Title<span class="required"> *</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="my_resume_textarea">
                        <div class="form-group">
                            <label>Job Description<span class="required"> *</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="summernote" name="description" rows="9">
                                {{ old('description') }}
                            </textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="my_profile_input form-group">
                        <label>Application Deadline Date<span class="required"> *</span></label>
                        <input type="date" class="form-control @error('deadline') is-invalid @enderror" name="deadline" value="{{ old('deadline') }}">
                        @error('deadline')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="my_profile_select_box form-group">
                        <label>Job Type<span class="required"> *</span></label><br>
                        <select class="form-control @error('job_type') is-invalid @enderror selectpicker"  name="job_type">
                            <option value="">Select Job Type</option>
                            @foreach($jobTypes as $jobType)
                            <option value="{{ $jobType->id }}"  {{ (old("job_type") == $jobType->id ? "selected":"") }}>{{ $jobType->title }}</option>
                            @endforeach
                        </select>
                        @error('job_type')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="my_profile_input form-group">
                        <label>Minimum Experience<span class="required"> *</span></label><br>
                        <input type="number" min="0" class="form-control @error('min_exp_year') is-invalid @enderror" name="min_exp_year" value="{{ old('min_exp_year') }}">
                        @error('min_exp_year')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="my_profile_input form-group">
                        <label>Maximum Experience<span class="required"> *</span></label><br>
                        <input type="number" min="0" class="form-control @error('max_exp_year') is-invalid @enderror" name="max_exp_year" value="{{ old('max_exp_year') }}">
                        @error('max_exp_year')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="my_profile_input form-group">
                        <label>Minimum Salary<span class="required"> *</span></label><br>
                        <input type="number" min="0" id="minSalary" class="form-control @error('min_salary') is-invalid @enderror" name="min_salary" value="{{ old('min_salary') }}" {{ old('is_negotiable') == '1' ? 'disabled' : '' }}>
                        @error('min_salary')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="my_profile_input form-group">
                        <label>Maximum Salary<span class="required"> *</span></label><br>
                        <input type="number" min="0" id="maxSalary" class="form-control @error('max_salary') is-invalid @enderror" name="max_salary" value="{{ old('max_salary') }}" {{ old('is_negotiable') == '1' ? 'disabled' : '' }}>
                        @error('max_salary')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-lg-2">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="is_negotiable" value="1" {{ old('is_negotiable') == '1' ? 'checked' : ''}}>
                        <input type="hidden" id="hiddenNegotiable" name="is_negotiable" value="0" {{ old('is_negotiable') == '1' ? 'disabled' : '' }}>
                        <label class="custom-control-label" for="customCheck1">Negotiable</label>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="my_profile_select_box form-group">
                        <label>Salary Terms<span class="required"> *</span></label><br>
                        <select class="form-control @error('salary_terms') is-invalid @enderror selectpicker" name="salary_terms" id="salaryTerms" {{ old('is_negotiable') == '1' ? 'disabled' : '' }}>
                            <option value="">Select Salary Terms</option>
                            <option value="PER_YEAR" {{ (old("salary_terms") == 'PER_YEAR' ? "selected":"") }}>Per Year</option>
                            <option value="PER_MONTH" {{ (old("salary_terms") == 'PER_MONTH' ? "selected":"") }}>Per Month</option>
                        </select>
                        @error('salary_terms')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="my_profile_select_box form-group">
                        <label>Currency<span class="required"> *</span></label><br>
                        <select class="form-control @error('currency') is-invalid @enderror selectpicker" name="currency" id="currency" {{ old('is_negotiable') == '1' ? 'disabled' : '' }}>
                            <option value="">Select Currency</option>
                            @foreach($currencies as $currency)
                            <option value="{{ $currency->id }}" {{ (old("currency") == $currency->id ? "selected":"") }}>{{ $currency->name }} ({{ $currency->code }})</option>
                            @endforeach
                        </select>
                        @error('currency')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="my_profile_select_box form-group">
                        <label for="formGroupExampleInput1">Category<span class="required"> *</span></label><br>
                        <select class="form-control @error('job_category') is-invalid @enderror selectpicker" name="job_category">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ (old("job_category") == $category->id ? "selected":"") }}>{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        @error('job_category')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="my_profile_select_box form-group">
                        <label for="formGroupExampleInput1">Industry<span class="required"> *</span></label><br>
                        <select class="form-control @error('job_industry') is-invalid @enderror selectpicker" name="job_industry">
                            <option value="">Select Industry</option>
                            @foreach($industries as $industry)
                            <option value="{{ $industry->id }}" {{ (old("job_industry") == $industry->id ? "selected":"") }}>{{ $industry->industry_name }}</option>
                            @endforeach
                        </select>
                        @error('job_industry')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="my_profile_select_box form-group">
                        <label for="formGroupExampleInput1">Qualification<span class="required"> *</span></label><br>
                        <select class="form-control @error('job_qualification') is-invalid @enderror selectpicker" name="job_qualification">
                            <option value="">Select Qualification</option>
                            @foreach($jobQualifications as $jobQualification)
                                <option value="{{ $jobQualification->id }}" {{ (old("job_qualification") == $jobQualification->id ? "selected":"") }}>{{ $jobQualification->qualification_name }}</option>
                            @endforeach
                        </select>
                        @error('job_qualification')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="my_profile_select_box form-group">
                        <label for="formGroupExampleInput1">Gender</label><br>
                        <select class="form-control @error('gender') is-invalid @enderror selectpicker" name="gender">
                            <option value="">Select Gender</option>
                            <option value="MALE" {{ (old("gender") == 'MALE' ? "selected":"") }}>Male</option>
                            <option value="FEMALE" {{ (old("gender") == 'FEMALE' ? "selected":"") }}>Female</option>
                            <option value="OTHER" {{ (old("gender") == 'OTHER' ? "selected":"") }}>Other</option>
                        </select>
                        @error('gender')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="my_profile_input form-group">
                        <label>Minimum Age</label><br>
                        <input type="number" class="form-control" name="min_age" min="0" value="{{ old('min_age') }}">
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="my_profile_input form-group">
                        <label>Maximum Age</label><br>
                        <input type="number" class="form-control" name="max_age" min="0" value="{{ old('max_age') }}">
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="my_profile_input form-group">
                        <label>Vacancy<span class="required"> *</span></label>
                        <input type="number" min="0" class="form-control @error('position_count') is-invalid @enderror" name="position_count" value="{{ old('position_count') }}">
                        @error('position_count')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="my_profile_select_box form-group">
                        <label for="formGroupExampleInput1">Apply Method<span class="required"> *</span></label><br>
                        <select class="selectpicker" id="applyMethod" name="submission_type">
                            <option value="INTERNAL" selected>Internal System</option>
                            <option value="EMAIL">Email</option>
                            <option value="LINK">External Link</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-lg-12">
                    <div class="my_profile_input form-group">
                        <label class="email {{ (old('submission_type') != 'EMAIL') ? 'hiddenField' : '' }}">Email<span class="required"> *</span></label>
                        <input type="email" value="{{ old('submission_type_value') }}" class="form-control email{{ (old('submission_type') != 'EMAIL') ? ' hiddenField' : '' }}" name="submission_type_value" {{ (old('submission_type') != 'EMAIL') ? 'disabled' : '' }}>
                        <label class="link {{ (old('submission_type') != 'LINK') ? 'hiddenField' : '' }}">External Link<span class="required"> *</span></label>
                        <input type="email" value="{{ old('submission_type_value') }}" class="form-control @error('submission_type_value') is-invalid @enderror link{{ (old('submission_type') != 'LINK') ? ' hiddenField' : '' }}" name="submission_type_value" {{ (old('submission_type') != 'LINK') ? 'disabled' : '' }}>
                        @error('submission_type_value')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="custom-control custom-checkbox is-visa" style="margin-top: -48px;">
                        <input type="checkbox" class="custom-control-input" id="customCheck2" name="is_visa_sponsor" value="1" {{ (old('is_visa_sponsor') == '1') ? 'checked' : '' }}>
                        <input type="hidden" id="hiddenVisa" name="is_visa_sponsor" value="0" {{ (old('is_visa_sponsor') == '1') ? 'disabled' : '' }}>
                        <label class="custom-control-label" for="customCheck2">Visa Sponsor</label>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="custom-control custom-checkbox is-relocation" style="margin-top: -48px;">
                        <input type="checkbox" class="custom-control-input" id="customCheck3" name="is_relocation" value="1" {{ (old('is_relocation') == '1') ? 'checked' : '' }}>
                        <input type="hidden" id="hiddenRelocation" name="is_relocation" value="0" {{ (old('is_relocation') == '1') ? 'disabled' : '' }}>
                        <label class="custom-control-label" for="customCheck3">Relocation</label>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customSwitch4" name="is_published" value="1" {{ (old('is_published') == '1') ? 'checked' : '' }}>
                    <input type="hidden" id="hiddenPublished" name="is_published" value="0" {{ (old('is_published') == '1') ? 'disabled' : '' }}>
                    <label class="custom-control-label" for="customSwitch4" style="color: black;">Publish</label>
                </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="my_profile_select_box form-group">
                        <label for="exampleFormControlInput9">Country<span class="required"> *</span></label><br>
                        <select class="form-control @error('country_id') is-invalid @enderror selectpicker" id="country" name="country_id">
                            <option value="">Select Country</option>
                            @foreach($countries as $country)
                            <option value="{{ $country->id }}" {{ (old("country_id") == $country->id ? "selected":"") }}>{{ $country->name }}</option>
                            @endforeach
                        </select>
                        @error('country_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="my_profile_select_box form-group">
                        <label for="exampleFormControlInput9">City<span class="required"> *</span></label><br>
                        <select class="form-control @error('city_id') is-invalid @enderror selectpicker" id="city" name="city_id">
                            <option value="">Select City</option>
                        </select>
                        @error('city_id')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="my_resume_textarea">
                        <div class="form-group">
                            <label>Submission Instruction</label>
                            <textarea class="form-control" rows="9" name="submission_instruction">{{ old('submission_instruction') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="my_profile_input">
                        <button class="btn btn-lg btn-thm">Save</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
@section('myJs')
    <script src="{{ asset('js/summernote-bs4.js') }}"></script>
    <script>
        $('#summernote').summernote({
            height: 200,
            popover: {
                image: [],
                link: [],
                air: []
            },
            fontSizes: ['8', '9', '10', '11', '12', '14', '18', '24', '36', '48' , '64', '82', '150'],
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['view', ['fullscreen', 'codeview']],
                ['help', ['help']]
            ],
            dialogsInBody: true
        });
    </script>
    <script>
        $(document).on('change','#country',function () {
            var countryId = $(this).val();
            if (countryId != '') {
                $.ajax({
                    url: '{{ url('getCities') }}/' + countryId,
                    type: 'GET',
                    success: function (data) {
                        $('#city').html(data).selectpicker("refresh");
                    }
                })
            } else {
                $('#city').html('<option value="">Select City</option>').selectpicker("refresh");
            }

        });

        $(document).on('change','#applyMethod',function () {
           var applyMethod = $(this).val();
           //var selectedValue = $(this).children("option:selected").val();
           if (applyMethod == 'INTERNAL'){
               $('.email').css('display', 'none').attr('disabled',true);
               $('.link').css('display', 'none').attr('disabled',true);
           } else if (applyMethod == 'EMAIL'){
               $('.email').css('display', 'block').attr('disabled',false);
               $('.link').css('display', 'none').attr('disabled',true);
           } else if(applyMethod == 'LINK') {
               $('.link').css('display', 'block').attr('disabled',false);
               $('.email').css('display', 'none').attr('disabled',true);
           }
        });

        $(document).on('click','#customCheck1',function () {
            if ($(this).is(':checked') == true){
                $('#hiddenNegotiable').attr('disabled', true);
                $('#minSalary').attr('disabled', true);
                $('#hiddenMinSalary').attr('disabled', false);
                $('#maxSalary').attr('disabled', true);
                $('#hiddenMaxSalary').attr('disabled', false);
                $('#currency').prop('disabled','disabled').selectpicker("refresh");
                $('#salaryTerms').attr('disabled', true).selectpicker("refresh");
            } else {
                $('#hiddenNegotiable').attr('disabled', false);
                $('#minSalary').attr('disabled', false);
                $('#hiddenMinSalary').attr('disabled', true);
                $('#maxSalary').attr('disabled', false);
                $('#hiddenMaxSalary').attr('disabled', true);
                $('#currency').removeAttr('disabled').selectpicker("refresh");
                $('#salaryTerms').attr('disabled', false).selectpicker("refresh");
            }
        });
        $(document).on('click','#customCheck2',function () {
            if ($(this).is(':checked') == true){
                $('#hiddenVisa').attr('disabled', true);
            } else {
                $('#hiddenVisa').attr('disabled', false);
            }
        });
        $(document).on('click','#customCheck3',function () {
            if ($(this).is(':checked') == true){
                $('#hiddenRelocation').attr('disabled', true);
            } else {
                $('#hiddenRelocation').attr('disabled', false);
            }
        });
        $(document).on('change','#customSwitch4',function () {
            if ($(this).is(':checked') == true){
                $('#hiddenPublished').attr('disabled', true);
            } else {
                $('#hiddenPublished').attr('disabled', false);
            }
        });

        $(function(){
            $('[type="date"]').prop('min', function(){
                return new Date().toJSON().split('T')[0];
            });
        });

        @if(old('submission_type') != ''){
            $('#applyMethod').val('{{ old('submission_type') }}');
        }
        @endif
    </script>

@endsection
@endsection