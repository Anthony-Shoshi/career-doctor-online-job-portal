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
    </style>
@endsection
@section('content')
    <div class="col-sm-12 col-lg-8 col-xl-9">
        <form action="{{ route('saveApplyJob') }}" method="post">
            <input type="hidden" name="job_id" value="{{ $job->id }}">
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