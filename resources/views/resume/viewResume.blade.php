@extends('dashboard.layouts.master')
@section('content')
    <div class="col-sm-12 col-lg-8 col-xl-9">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="fz20 mb20">My Resume</h4>
            </div>
            <div class="col-lg-4">
                <div class="my_resume_eduarea">
                    <h4 class="title">General Information </h4>
                        <img src="{{ asset(Auth::user()->image) }}" alt="">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="my_resume_eduarea">
                    <h4 class="title">Personal Information </h4>
                    <ul style="list-style: none;">
                        <li><strong>Name:</strong> {{ Auth::user()->name }}</li>
                        @if( $candidateGeneralInfo->current_position != '')
                            <li><strong>Position:</strong> {{ $candidateGeneralInfo->current_position }}</li>
                        @endif
                        @if( $candidateGeneralInfo->short_description != '')
                            <p>" {{ $candidateGeneralInfo->short_description }} "</p>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="my_resume_eduarea">
                    <h4 class="title">Contact Information </h4>
                    <ul style="list-style: none;">
                        <li><strong>Email:</strong> {{ $candidateGeneralInfo->contact_email }}</li>
                        <li><strong>Mobile:</strong> {{ $candidateGeneralInfo->contact_phone }}</li>
                        <li><strong>Address:</strong> {{ $candidateGeneralInfo->current_address }}</li>
                        <li><strong>Location:</strong> {{ $city->name }}, {{ $country->name }}</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="my_resume_eduarea">
                    <h4 class="title">Education</h4>
                    @foreach($candidateEducations as $candidateEducation)
                    <div class="content">
                        <div class="circle"></div>
                        <p class="edu_center">{{ $candidateEducation->institute_name }}</p>
                        <h4 class="edu_stats">{{ $candidateEducation->degree_title }} ({{ $candidateEducation->degree }})
                        </h4>
                        <ul style="list-style: none;">
                            <li><strong>Passing Year:</strong> @if($candidateEducation->is_running == 1) Running @else {{ $candidateEducation->passing_year }} @endif</li>
                            <li><strong>Grade:</strong> {{ $candidateEducation->grade }}</li>
                            <li><strong>Location:</strong> {{ $candidateEducation->location }}</li>
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-12">
                <div class="my_resume_eduarea">
                    <h4 class="title">Work & Experience</h4>
                    @foreach($candidateExperiences as $candidateExperience)
                    <div class="content style2">
                        <div class="circle"></div>
                        <p class="edu_center">{{ $candidateExperience->company_name }} </p>
                        <h4 class="edu_stats">{{ $candidateExperience->position }}</h4>
                        From {{ date('M d, Y', strtotime($candidateExperience->start_date)) }} To @if($candidateExperience->is_current == 1) Current @else {{ date('M d, Y', strtotime($candidateExperience->end_date)) }} @endif
                        @if( $candidateExperience->experience_summary != '')
                        <br><strong>Summery:</strong> {{ $candidateExperience->experience_summary }}
                        @endif
                        @php
                            $city = \App\City::where('id', $candidateExperience->city)->first();
                            $country = \App\Country::where('id', $candidateExperience->country)->first();
                        @endphp
                        <br><strong>Location:</strong> {{ $city->name }}, {{ $country->name }}
                    </div>
                        @endforeach
                </div>
            </div>
            <div class="col-lg-12">
                <div class="my_resume_skill">
                    <h4 class="title">Skills</h4>
                    <input disabled type="text" data-role="tagsinput" value="Sketch App,User Interface Design,Graphic Design,Web Design">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="my_resume_eduarea">
                    <h4 class="title">Awards</h4>
                    <div class="content">
                        <div class="circle"></div>
                        <p class="edu_center">Jan 2018</p>
                        <h4 class="edu_stats">Perfect Attendance Programs
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                    </div>
                    <div class="content style2">
                        <div class="circle"></div>
                        <p class="edu_center">Dec 2019</p>
                        <h4 class="edu_stats">Top Performer Recognition
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection