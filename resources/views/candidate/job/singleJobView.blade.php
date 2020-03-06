@extends('candidate.layouts.master')
@section('myCss')
    <style>
        ul {
            margin-left: 30px;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/myStyle.css') }}">
@endsection
@section('content')
    <!-- Candidate Personal Info-->
    @php
        $jobTpe = \App\JobType::where('id',$job->job_type)->first();
        $city = \App\City::where('id',$job->city_id)->first();
        $country = \App\Country::where('id',$job->country_id)->first();
        $currency = \App\Currency::where('id',$job->currency)->first();
        $company = \App\CompanyGeneralInfo::where('user_id',$job->company)->first();
        $jobIndustry = \App\JobIndustry::where('id',$job->job_industry)->first();
        $jobQualification = \App\JobQualification::where('id',$job->job_qualification)->first();
        $companyImage = \App\User::where('id',$job->company)->first()->image;

        $deadline = \Carbon\Carbon::parse($job->deadline);
        $now = \Carbon\Carbon::now();
        $diff = $deadline->diffInDays($now);
    @endphp
    <section class="bgc-fa pt80 mt80 mbt45">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xl-9">
                    <div class="candidate_personal_info style2">
                        <div class="thumb text-center">
                            <img class="img-fluid rounded" src="{{ asset($companyImage) }}" alt="cl1.jpg"><br><br>
                            <a class="mt25" href="{{ route('jobListView') }}" target="_blank">View all jobs <span class="flaticon-right-arrow pl10"></span></a>
                        </div>
                        <div class="details">
                            <small class="text-thm2">{{ $jobTpe->title }}</small>
                            <h3>{{ $job->title }}</h3>
                            <p>Posted : {{ date_format(new DateTime($job->created_at),'d M, Y') }} by <a class="text-thm" target="_blank" href="{{ route('companyProfileView',[$job->company]) }}">{{ $company->company_name }}</a></p>
                            <ul class="address_list">
                                <li class="list-inline-item"><span class="flaticon-location-pin"></span>{{ $city->name }}, {{ $country->name }}</li>
                                @if($job->is_negotiable == 1)
                                    <li class="list-inline-item"><span class="flaticon-price"></span> Negotiable</li>
                                @else
                                    <li class="list-inline-item"><span class="flaticon-price"></span> {{ $job->min_salary/1000 .'k' }} {{ $currency->code }} - {{ $job->max_salary/1000 .'k' }} {{ $currency->code }} @php $salary_terms = str_replace('_', ' ', $job->salary_terms) @endphp
                                        {{ ucwords(strtolower($salary_terms)) }}</li>
                                @endif
                            </ul>
                            <ul class="address_list">
                                @if($job->is_visa_sponsor == '1')
                                    <li class="list-inline-item"><span class="fa fa-dot-circle-o"></span> Visa Sponsored</li>
                                @endif
                                @if($job->is_relocation == 1)
                                    <li class="list-inline-item"><span class="fa fa-dot-circle-o"></span> Relocation</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3">
                    <div class="candidate_personal_overview style2">
                @auth
                    @php
                        $jobApplicationStatus = \App\CandidateJobApplicationStatus::where('user', Auth::user()->id)->where('job', $job->id)->first();
                    @endphp
                @if(\Illuminate\Support\Facades\Auth::user()->user_type != 'company')
                        @if($checkShortList = \App\ShortListedJob::where('candidate', auth::user()->id)->where('job',$job->id)->exists())
                            @if( $job->submission_type == 'EMAIL' )
                                <a class="btn btn-block btn-thm mb15" href="{{ (Auth::check()) ? 'mailto:'.$job->submission_type_value : route('login') }}"><span class="flaticon-open-envelope-with-letter"></span> Apply Now </a>
                            @elseif( $job->submission_type == 'LINK' )
                                <a class="btn btn-block btn-thm mb15" href="{{ (Auth::check()) ? $job->submission_type_value : route('login') }}" target="_blank"><span class="fa fa-external-link-square"></span> Apply Now </a>
                            @else
                                @if($jobApplicationStatus)
                                @if($jobApplicationStatus->status != 'APPLIED')
                                    <a class="btn btn-block btn-thm mb15" target="_blank" href="{{ route('applyJob',$job->id) }}">Apply Now <span class="flaticon-right-arrow pl10"></span></a>
                                @endif
                                @else
                                    <a class="btn btn-block btn-thm mb15" target="_blank" href="{{ route('applyJob',$job->id) }}">Apply Now <span class="flaticon-right-arrow pl10"></span></a>
                                @endif
                            @endif
                            <button class="btn btn-block btn-gray" onclick="event.preventDefault();
                                        document.getElementById('deListMain').submit();"><span class="flaticon-favorites pr10"></span> Remove
                                <form action="{{ route('deListJob') }}" id="deListMain" method="POST" style="display: none;">
                                    @csrf
                                    <input type="hidden" name="job" value="{{ $job->id }}">
                                </form>
                            </button>
                        @else
                            @if( $job->submission_type == 'EMAIL' )
                                <a class="btn btn-block btn-thm mb15" href="{{ (Auth::check()) ? 'mailto:'.$job->submission_type_value : route('login') }}"><span class="flaticon-open-envelope-with-letter"></span> Apply Now </a>
                            @elseif( $job->submission_type == 'LINK' )
                                <a class="btn btn-block btn-thm mb15" href="{{ (Auth::check()) ? $job->submission_type_value : route('login') }}" target="_blank"><span class="fa fa-external-link-square"></span> Apply Now </a>
                            @else
                                @if($jobApplicationStatus)
                                @if($jobApplicationStatus->status != 'APPLIED')
                                    <a class="btn btn-block btn-thm mb15" target="_blank" href="{{ route('applyJob',$job->id) }}">Apply Now <span class="flaticon-right-arrow pl10"></span></a>
                                @endif
                                @else
                                    <a class="btn btn-block btn-thm mb15" target="_blank" href="{{ route('applyJob',$job->id) }}">Apply Now <span class="flaticon-right-arrow pl10"></span></a>
                                @endif
                            @endif
                            <button class="btn btn-block btn-gray" onclick="event.preventDefault();
                                        document.getElementById('shortListMain').submit();"><span class="flaticon-favorites pr10"></span> Favourite
                                <form action="{{ route('shortListJob') }}" id="shortListMain" method="POST" style="display: none;">
                                    @csrf
                                    <input type="hidden" name="job" value="{{ $job->id }}">
                                </form>
                            </button>
                        @endif
                @endif
                @endauth
                @guest
                    @if( $job->submission_type == 'EMAIL' )
                        <a class="btn btn-block btn-thm mb15" href="{{ (Auth::check()) ? 'mailto:'.$job->submission_type_value : route('login') }}"><span class="flaticon-open-envelope-with-letter"></span> Apply Now </a>
                    @elseif( $job->submission_type == 'LINK' )
                        <a class="btn btn-block btn-thm mb15" href="{{ (Auth::check()) ? $job->submission_type_value : route('login') }}" target="_blank"><span class="fa fa-external-link-square"></span> Apply Now </a>
                    @else
                        <a class="btn btn-block btn-thm mb15" target="_blank" href="{{ route('applyJob',$job->id) }}">Apply Now <span class="flaticon-right-arrow pl10"></span></a>
                    @endif
                        <button class="btn btn-block btn-gray" onclick="event.preventDefault();
                                        document.getElementById('shortListMain').submit();"><span class="flaticon-favorites pr10"></span> Favourite
                            <form action="{{ route('shortListJob') }}" id="shortListMain" method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" name="job" value="{{ $job->id }}">
                            </form>
                        </button>
                @endguest
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Candidate Personal Info Details-->
    <section class="bgc-white pb30">
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
                                <hr>
                                @auth
                                @if(\Illuminate\Support\Facades\Auth::user()->user_type != 'company')
                                @if( $job->submission_type == 'EMAIL' )
                                    <a class="btn btn-lg btn-thm mb15" href="{{ (Auth::check()) ? 'mailto:'.$job->submission_type_value : route('login') }}"><span class="flaticon-open-envelope-with-letter"></span> Apply Now </a>
                                @elseif( $job->submission_type == 'LINK' )
                                    <a class="btn btn-lg btn-thm mb15" href="{{ (Auth::check()) ? $job->submission_type_value : route('login') }}" target="_blank"><span class="fa fa-external-link-square"></span> Apply Now </a>
                                @else
                                    @if($jobApplicationStatus)
                                    @if($jobApplicationStatus->status != 'APPLIED')
                                        <a class="btn btn-lg btn-thm mb15" target="_blank" href="{{ route('applyJob',$job->id) }}">Apply Now <span class="flaticon-right-arrow pl10"></span></a>
                                    @endif
                                    @else
                                        <a class="btn btn-lg btn-thm mb15" target="_blank" href="{{ route('applyJob',$job->id) }}">Apply Now <span class="flaticon-right-arrow pl10"></span></a>
                                    @endif
                                @endif

                                @endif
                                @endauth
                                @guest
                                    @if( $job->submission_type == 'EMAIL' )
                                        <a class="btn btn-lg btn-thm mb15" href="{{ (Auth::check()) ? 'mailto:'.$job->submission_type_value : route('login') }}"><span class="flaticon-open-envelope-with-letter"></span> Apply Now </a>
                                    @elseif( $job->submission_type == 'LINK' )
                                        <a class="btn btn-lg btn-thm mb15" href="{{ (Auth::check()) ? $job->submission_type_value : route('login') }}" target="_blank"><span class="fa fa-external-link-square"></span> Apply Now </a>
                                    @else
                                        <a class="btn btn-lg btn-thm mb15" target="_blank" href="{{ route('applyJob',$job->id) }}">Apply Now <span class="flaticon-right-arrow pl10"></span></a>
                                    @endif

                                @endguest
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="job_shareing">
                                <div class="candidate_social_widget bgc-fa">
                                    <ul>
                                        <li>Share This Job:</li>
                                        <li><a href="javascript:void(0)" data-social="facebook" class="share"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="javascript:void(0)" data-social="twitter" class="share" data-text="{{ $job->title }}"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="javascript:void(0)" data-social="linkedin" class="share"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="javascript:void(0)" data-social="pinterest" class="share" data-media="{{ get_logo() }}"><i class="fa fa-pinterest"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="my_resume_eduarea">
                                <h4 class="title">Recommended Job List</h4>
                            </div>
                        </div>
                        @if($recommendedJobs->count() > 0)
                        @foreach($recommendedJobs as $recommendedJob)
                            @php
                                $jobTpe = \App\JobType::where('id',$recommendedJob->job_type)->first();
                                $city = \App\City::where('id',$recommendedJob->city_id)->first();
                                $country = \App\Country::where('id',$recommendedJob->country_id)->first();
                                $currency = \App\Currency::where('id',$recommendedJob->currency)->first();
                                $company = \App\CompanyGeneralInfo::where('user_id',$recommendedJob->company)->first();
                                $companyImage = \App\User::where('id',$recommendedJob->company)->first()->image;
                            @endphp
                            <div class="col-lg-12">
                                <div class="fj_post style2">
                                    <div class="details">
                                        <h5 class="job_chedule text-thm mt0">{{ $jobTpe->title }}</h5>
                                        <div class="thumb fn-smd">
                                            <a href="{{ route('singleJobView',[$recommendedJob->id]) }}" target="_blank"><img class="img-fluid" src="{{ asset($companyImage) }}" alt="1.jpg"></a>
                                        </div>
                                        <a href="{{ route('singleJobView',[$recommendedJob->id]) }}" target="_blank"><h4>{{ $recommendedJob->title }}</h4></a>
                                        <p>Posted : {{ date_format(new DateTime($recommendedJob->created_at),'d M, Y') }} by <a class="text-thm" target="_blank" href="{{ route('companyProfileView',[$recommendedJob->company]) }}">{{ $company->company_name }}</a></p>
                                        <p>
                                            @if($recommendedJob->is_visa_sponsor == '1')
                                                <span class="fa fa-dot-circle-o"></span> Visa Sponsored
                                            @endif
                                            @if($recommendedJob->is_relocation == 1)
                                                <span class="fa fa-dot-circle-o"></span> Relocation
                                            @endif
                                        </p>
                                        <ul class="featurej_post">
                                            <li class="list-inline-item"><span class="flaticon-location-pin"></span> {{ $city->name }}, {{ $country->name }}</li>
                                            @if($recommendedJob->is_negotiable == 1)
                                                <li class="list-inline-item"><span class="flaticon-price pl20"></span> Negotiable</li>
                                            @else
                                                <li class="list-inline-item"><span class="flaticon-price pl20"></span> {{ $recommendedJob->min_salary/1000 .'k' }} {{ $currency->code }} - {{ $recommendedJob->max_salary/1000 .'k' }} {{ $currency->code }} @php $salary_terms = str_replace('_', ' ', $recommendedJob->salary_terms) @endphp {{ ucwords(strtolower($salary_terms)) }}</li>
                                            @endif
                                        </ul>
                                    </div>
                                    @auth
                                    @if(\Illuminate\Support\Facades\Auth::user()->user_type != 'company')
                                        @if($checkShortList = \App\ShortListedJob::where('candidate', auth::user()->id)->where('job',$recommendedJob->id)->exists())
                                            <a data-toggle="tooltip" data-placement="bottom" title="Remove" class="favorit" onclick="event.preventDefault();
                                            document.getElementById('deListSub').submit();"><span class="flaticon-favorites"></span>
                                                <form action="{{ route('deListJob') }}" id="deListSub" method="POST" style="display: none;">
                                                    @csrf
                                                    <input type="hidden" name="job" value="{{ $recommendedJob->id }}">
                                                </form>
                                            </a>
                                        @else
                                            <a data-toggle="tooltip" data-placement="bottom" title="Favourite" class="favorit" onclick="event.preventDefault();
                                            document.getElementById('shortListSub').submit();"><span class="flaticon-favorites"></span>
                                                <form action="{{ route('shortListJob') }}" id="shortListSub" method="POST" style="display: none;">
                                                    @csrf
                                                    <input type="hidden" name="job" value="{{ $recommendedJob->id }}">
                                                </form>
                                            </a>
                                        @endif
                                    @endif
                                    @endauth
                                    @guest
                                        <a data-toggle="tooltip" data-placement="bottom" title="Favourite" class="favorit" onclick="event.preventDefault();
                                        document.getElementById('shortListSub').submit();"><span class="flaticon-favorites"></span>
                                            <form action="{{ route('shortListJob') }}" id="shortListSub" method="POST" style="display: none;">
                                                @csrf
                                                <input type="hidden" name="job" value="{{ $job->id }}">
                                            </form>
                                        </a>
                                    @endguest
                                </div>
                            </div>
                        @endforeach
                        @else
                            <div class="col-lg-12">
                                <div class="job_shareing">
                                    <div class="candidate_social_widget bgc-fa">
                                        <div style="text-align: center">No jobs to recommend!</div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4">
                    <h4 class="fz20 mb30">Position Information</h4>
                    <div class="candidate_working_widget style2 bgc-fa">
                        <div class="icon text-thm"><span class="flaticon-money"></span></div>
                        <div class="details">
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
                        <div class="details">
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
                        <div class="details">
                            <p class="color-black22">Gender</p>
                            <p>{{ ucwords(strtolower($job->gender)) }}</p>
                        </div>
                        @if($job->min_age != '' && $job->max_age != '')
                            <div class="icon text-thm"><span class="flaticon-old-age-man"></span></div>
                            <div class="details">
                                <p class="color-black22">Age</p>
                                <p>{{ $job->min_age }} Years - {{ $job->max_age }} Years</p>
                            </div>
                        @endif
                        <div class="icon text-thm"><span class="flaticon-line-chart"></span></div>
                        <div class="details">
                            <p class="color-black22">Industry</p>
                            <p>{{ $jobIndustry->industry_name }}</p>
                        </div>
                        <div class="icon text-thm"><span class="flaticon-mortarboard"></span></div>
                        <div class="details">
                            <p class="color-black22">Experience</p>
                            <p>{{ $job->min_exp_year }} Years - {{ $job->max_exp_year }} Years</p>
                        </div>
                        <div class="icon text-thm"><span class="flaticon-paper"></span></div>
                        <div class="details">
                            <p class="color-black22">Qualification</p>
                            <p>{{ $jobQualification->qualification_name }}</p>
                        </div>
                        <div class="icon text-thm"><span class="flaticon-location-pin"></span></div>
                        <div class="details custom-details">
                            <p class="color-black22">Location</p>
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
                                <p>{{ $job->submission_type_value }}</p>
                            </div>
                        @endif
                        <div class="icon text-thm"><span class="flaticon-application"></span></div>
                        <div class="details custom-details">
                            <p class="color-black22">Application Deadline</p>
                            <p>{{ date('M d, Y', strtotime($job->deadline)) }}</p>
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
                            <li><span class="flaticon-24-hours-support text-thm2"></span> <span>{{ $diff }}</span> <span>@if($diff == 1) Day @else Days @endif Left</h5></li>
                            <li><span class="flaticon-eye text-thm2"></span> <span> {{ $perDayViewer }}</span> <span>Today Views</h5></li>
                            <li><span class="flaticon-zoom-in text-thm2"></span> <span> {{ $totalViewer }}</span> <span>Total Views</h5></li>
                        </ul>
                    </div>
{{--                    <div class="map_sidebar_widget">--}}
{{--                        <h4 class="fz20 mb30">Job Location</h4>--}}
{{--                        <div class="h300" id="map-canvas"></div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </section>
@endsection
@section('myJs')
    <script>
        $(document).ready(function () {
            //share url
            var share_url = '{{ route('singleJobView',$job->id) }}';

            $(document).on('click', '.share', function(){
                var status = false;

                if ($(this).data('social') == 'facebook') {
                    var status = true;
                    var url = 'http://www.facebook.com/sharer.php?u=' + share_url;
                }else if ($(this).data('social') == 'twitter') {
                    var status = true;
                    var url = 'http://twitter.com/share?text=' + $(this).data('text') + '&' + 'url=' + share_url;
                }else if ($(this).data('social') == 'linkedin') {
                    var status = true;
                    var url = 'http://www.linkedin.com/shareArticle?mini=true&url=' + share_url;
                }else if ($(this).data('social') == 'pinterest') {
                    var status = true;
                    var url = 'http://pinterest.com/pin/create/button/?url=' + share_url + '&media=' + $(this).data('media');
                }

                if(status == true){
                    window.open(url,'sharer','toolbar=0,status=0,width=648,height=395');
                    return true;
                }
            })
        });
    </script>
@endsection