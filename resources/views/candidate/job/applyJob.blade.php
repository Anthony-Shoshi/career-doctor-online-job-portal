@extends('dashboard.layouts.master')
@section('myCss')
    <style>
        .required{
            color: red;
        }
        .addCoverLetter {
            margin-top: 48px;
        }
        @media (max-width: 768px) {
            .addCoverLetter {
                margin-top: 15px !important;
            }
            .applyButton {
                margin-top: -41px !important;
                margin-left: 100px !important;
            }
            .refreshButton {
                margin-top: 10px !important;
            }
        }
        .btn-dark {
            border-radius: 4px;
            font-size: 15px;
        }
        .applyButton {
            margin-left: -75px;
        }
        .selected_card{
            border: 1px solid #ff0000;
        }
    </style>
@endsection
@section('content')
    <div class="col-sm-12 col-lg-8 col-xl-9">
        <form action="{{ route('saveApplyJob') }}" method="post">
            <input type="hidden" name="job_id" value="{{ $job->id }}">
            <input type="hidden" name="template" value="simple">
            @csrf
            <div class="my_profile_form_area">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="fz20 mb20">Apply for {{ $job->title }}</h4>
                    </div>
                    <div class="col-lg-12 mt30">
                        <div class="my_profile_thumb_edit"></div>
                    </div>

                    <div class="col-md-6 col-lg-6">
                        <div class="my_profile_select_box form-group">
                            <label for="formGroupExampleInput1">Cover Letter<span class="required"> *</span></label><br>
                            <select class="form-control @error('coverLetter') is-invalid @enderror selectpicker" name="coverLetter" id="coverLetter">
                                <option value="">Select Cover Letter</option>
                                @foreach($coverLetters as $coverLetter)
                                    <option value="{{ $coverLetter->id }}">{{ $coverLetter->title }}</option>
                                @endforeach
                            </select>
                            @error('coverLetter')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6">
                        <div class="addCoverLetter">
                            <a href="{{ route('createNewCoverLetter') }}" target="_blank">Add New <span class="flaticon-right-arrow"></span></a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12 pb-4">
                        <label style="color: #221f1f; padding-bottom: 10px;">Resume Template<span class="required"> *</span></label>
                        <br>
                        <div class="card mr-4 selected_card" style="width: 18rem; float: left;cursor: pointer;" data-template="simple">
                            <img src="http://localhost/CareerDoctor/upload/CV template/simple.png" class="card-img" alt="...">
                            <div class="card-body">
                                <h4>Simple</h4>
                            </div>
                        </div>
                        <div class="card mr-4" style="width: 18rem; float: left;cursor: pointer;" data-template="functional">
                            <img src="http://localhost/CareerDoctor/upload/CV template/functional.png" class="card-img" alt="...">
                            <div class="card-body">
                                <h4>Functional</h4>
                            </div>
                        </div>
                        <div class="card mr-4" style="width: 18rem; float: left; cursor: pointer;" data-template="professional">
                            <img src="http://localhost/CareerDoctor/upload/CV template/professional.png" class="card-img" alt="...">
                            <div class="card-body">
                                <h4>Professsional</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 col-lg-2">
                        <div class="my_profile_input refreshButton">
                            <button class="btn btn-lg btn-dark" type="button" id="reload">Reload</button>
                        </div>
                    </div>

                    <div class="col-md-2 col-lg-2">
                        <div class="my_profile_input applyButton">
                            <button class="btn btn-lg btn-thm">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('myJs')
    <script>
        $(document).on('click', '.card', function () {
            if($(this).hasClass('selected_card')){
                $(this).removeClass('selected_card');
                $('input[name=template]').val('simple');
            }else{
                $('.card').removeClass('selected_card');
                $(this).addClass('selected_card');
                $('input[name=template]').val($(this).data('template'));
            }
        });
        $(document).on('click', '#reload', function () {
            $.ajax({
                url: '{{ url('get/cover/letter') }}',
                type: 'GET',
                success:function(data){
                    $('#coverLetter').html(data).selectpicker('refresh');
                }
            })
        });


    </script>
@endsection