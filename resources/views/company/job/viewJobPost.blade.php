@extends('dashboard.layouts.master')
@section('myCss')
    <style>
        @media only screen and (max-width: 767.98px){
            section {
                padding: 45px 0 !important;
            }
        }
    </style>
@endsection
@section('content')
    <div class="col-sm-12 col-lg-8 col-xl-9">
            <section class="bgc-white pb30" style="margin-top: -60px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-xl-8">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="candidate_about_info style2">
                                        <h4 class="fz20 mb30">Job Description</h4>
                                        {!! $job->description !!}
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="candidate_about_info style2">
                                        <br>
                                        @if($job->submission_instruction != '')
                                        <h4 class="fz20 mb30">Submission Instructions</h4>
                                        {!! $job->submission_instruction !!}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-xl-4">
                            <h4 class="fz20 mb30">Position Information</h4>
                            <div class="candidate_working_widget style2 bgc-fa">
                                <div class="icon text-thm"><span class="flaticon-money"></span></div>
                                <div class="details custom-details">
                                    @if($job->is_negotiable == 1)
                                    <p class="color-black22">Offerd Salary</p>
                                    <p>Negotiable</p>
                                    @else
                                    <p class="color-black22">Offerd Salary</p>
                                    @php
                                        $currency = \App\Currency::where('id',$job->currency)->first();
                                    @endphp
                                    <p>{{ $job->min_salary/1000 .'k' }} {{ $currency->code }} - {{ $job->max_salary/1000 .'k' }} {{ $currency->code }}</p>
                                    @endif
                                </div>
                                <div class="icon text-thm"><span class="flaticon-controls"></span></div>
                                <div class="details custom-details">
                                    <p class="color-black22">Salary Terms</p>
                                    <p>@php $salary_terms = str_replace('_', ' ', $job->salary_terms) @endphp
                                        {{ ucwords(strtolower($salary_terms)) }}
                                    </p>
                                </div>
                                <div class="icon text-thm"><span class="flaticon-job"></span></div>
                                <div class="details custom-details">
                                    <p class="color-black22">Vacancy</p>
                                    <p>{{ $job->position_count }}</p>
                                </div>
                                <div class="icon text-thm"><span class="flaticon-gender"></span></div>
                                <div class="details custom-details">
                                    <p class="color-black22">Gender</p>
                                    <p>{{ ucwords(strtolower($job->gender)) }}</p>
                                </div>
                                @if($job->min_age != '' && $job->max_age != '')
                                <div class="icon text-thm"><span class="flaticon-old-age-man"></span></div>
                                <div class="details custom-details">
                                    <p class="color-black22">Age</p>
                                    <p>{{ $job->min_age }} Years - {{ $job->max_age }} Years</p>
                                </div>
                                @endif
                                <div class="icon text-thm"><span class="flaticon-line-chart"></span></div>
                                <div class="details custom-details">
                                    <p class="color-black22">Industry</p>
                                    @php
                                        $jobIndustry = \App\JobIndustry::where('id',$job->job_industry)->first();
                                    @endphp
                                    <p>{{ $jobIndustry->industry_name }}</p>
                                </div>
                                <div class="icon text-thm"><span class="flaticon-career"></span></div>
                                <div class="details custom-details">
                                    <p class="color-black22">Job Type</p>
                                    @php
                                        $jobTpe = \App\JobType::where('id',$job->job_type)->first();
                                    @endphp
                                    <p>{{ $jobTpe->title }}</p>
                                </div>
                                <div class="icon text-thm"><span class="flaticon-mortarboard"></span></div>
                                <div class="details custom-details">
                                    <p class="color-black22">Experience</p>
                                    <p>{{ $job->min_exp_year }} Years - {{ $job->max_exp_year }} Years</p>
                                </div>
                                <div class="icon text-thm"><span class="flaticon-paper"></span></div>
                                <div class="details custom-details">
                                    <p class="color-black22">Qualification</p>
                                    @php
                                        $jobQualification = \App\JobQualification::where('id',$job->job_qualification)->first();
                                    @endphp
                                    <p>{{ $jobQualification->qualification_name }}</p>
                                </div>
                                <div class="icon text-thm"><span class="flaticon-location-pin"></span></div>
                                <div class="details custom-details">
                                    <p class="color-black22">Location</p>
                                    @php
                                        $city = \App\City::where('id',$job->city_id)->first();
                                        $country = \App\Country::where('id',$job->country_id)->first();
                                        $deadline = \Carbon\Carbon::parse($job->deadline);
                                        $now = \Carbon\Carbon::now();
                                        $diff = $deadline->diffInDays($now);
                                    @endphp
                                    <p>{{ $city->name }}, {{ $country->name }}</p>
                                </div>
                                <div class="icon text-thm"><span class="flaticon-cv"></span></div>
                                <div class="details custom-details">
                                    <p class="color-black22">Submission Type</p>
                                    <p>{{ ucwords(strtolower($job->submission_type)) }}</p>
                                </div>
                                @if($job->submission_type_value != '')
                                <div class="icon text-thm"><span class="flaticon-open-envelope-with-letter"></span></div>
                                    <div class="details custom-details">
                                        <p class="color-black22">Submit Here</p>
                                        <p>{{ ucwords(strtolower($job->submission_type_value)) }}</p>
                                    </div>
                                @endif
                                <div class="icon text-thm"><span class="flaticon-application"></span></div>
                                <div class="details custom-details">
                                    <p class="color-black22">Application Deadline</p>
                                    <p>{{ date_format(new DateTime($job->deadlin),'d M Y') }}</p>
                                </div>
                                @if($job->is_visa_sponsor == '1')
                                <div class="icon text-thm"><span class="fa fa-dot-circle-o"></span></div>
                                    <p class="color-black22" style="padding-top: 9px;">Visa Sponsored</p>
                                @endif
                                @if($job->is_relocation == '1')
                                    <div class="icon text-thm"><span class="fa fa-dot-circle-o"></span></div>
                                    <p class="color-black22" style="padding-top: 9px;">Relocation</p>
                                @endif
                            </div>
                            <div class="job_info_widget">
                                <ul style="list-style: none;">
                                    <li><span class="flaticon-24-hours-support text-thm2"></span> <span>{{ $diff }}</span> <span>Day</span></li>
                                    <li><span class="flaticon-zoom-in text-thm2"></span> <span>35697</span> <span>Displayed</span></li>
                                    <li><span class="flaticon-businessman-paper-of-the-application-for-a-job text-thm2"></span> <span>300-500</span> <span>Application</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </div>
@endsection