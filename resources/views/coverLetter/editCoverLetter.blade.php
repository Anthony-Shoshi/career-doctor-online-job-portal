@extends('dashboard.layouts.master')
@section('myCss')
    <style>
        .required{
            color: red;
        }
    </style>
@endsection
@section('content')
    <div class="col-sm-12 col-lg-8 col-xl-9">
        <form action="{{ route('updateCoverLetter') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $coverLetter->id }}">
            <div class="my_profile_form_area">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="fz20 mb20">Edit Cover Letter</h4>
                    </div>
                    <div class="col-lg-12 mt30">
                        <div class="my_profile_thumb_edit"></div>
                    </div>
                    <div class="col-lg-12">
                        <div class="my_profile_input form-group">
                            <label>Title<span class="required"> *</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $coverLetter->title }}">
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
                                <label>Description<span class="required"> *</span></label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="summernote" name="description" rows="9">
                                {{ $coverLetter->description }}
                            </textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="my_profile_select_box form-group">
                            <label for="formGroupExampleInput1">Status<span class="required"> *</span></label><br>
                            <select class="form-control @error('status') is-invalid @enderror selectpicker" name="status">
                                <option value="DRAFT"{{ ($coverLetter->status == 'DRAFT') ? ' selected' : '' }}>Draft</option>
                                <option value="PUBLISHED"{{ ($coverLetter->status == 'PUBLISHED') ? ' selected' : '' }}>Published</option>
                            </select>
                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-12">
                        <div class="my_profile_input">
                            <button class="btn btn-lg btn-thm">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection