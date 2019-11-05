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
                        @php
                            $dateOfBirth = $candidateGeneralInfo->date_of_birth;
                            $age = \Carbon\Carbon::parse($dateOfBirth)->age;
                        @endphp
                        <li><strong>Name:</strong> {{ Auth::user()->name }}</li>
                        <li><strong>Gender:</strong> {{ ucwords(strtolower($candidateGeneralInfo->gender)) }}</li>
                        <li><strong>Age:</strong> {{$age }}</li>
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
                    @php
                        $degree = \App\EducationDegree::where('id', $candidateEducation->degree)->first();
                    @endphp
                    <div class="content">
                        <div class="circle"></div>
                        <p class="edu_center">{{ $candidateEducation->institute_name }}</p>
                        <h4 class="edu_stats">{{ $candidateEducation->degree_title }} ({{ $degree->degree_name }})
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
                    <input disabled type="text" data-role="tagsinput" value="{{ $skill_name }}" readonly>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="my_resume_eduarea">
                    <h4 class="title">Extra-Curricular Activities</h4>
                    @foreach($candidateAchievements as $candidateAchievement)
                    <div class="content">
                        <div class="circle"></div>
                        <p class="edu_center">{{ date('M d, Y', strtotime($candidateAchievement->date)) }}</p>
                        <strong>Type:</strong> {{ ucwords(strtolower($candidateAchievement->type)) }}
                        <h4 class="edu_stats">{{ $candidateAchievement->title }}
                        </h4>
                        @if( $candidateAchievement->description != '')
                        <p>{{ $candidateAchievement->description }}</p>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection