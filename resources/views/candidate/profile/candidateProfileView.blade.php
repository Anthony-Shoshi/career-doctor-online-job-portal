@extends('candidate.layouts.master')
@section('myCss')
    <link rel="stylesheet" href="{{ asset('css/myStyle.css') }}">
@endsection
@section('content')
    <!-- Candidate Personal Info-->
    <input type="hidden" id="candidate_id" value="{{ $candidateGeneralInfo->user_id }}">
    <section class="bgc-fa zi-1 mt65">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xl-8">
                    <div class="candidate_personal_info">
                        <div class="thumb">
                            <img class="img-fluid rounded-circle" src="{{ asset($user->image) }}" alt="cs2.jpg">
                            <div class="cpi_av_rating"><span>{{ $avgRating }}</span></div>
                        </div>
                        <div class="details">
                            <h3>{{ $user->name }} <small class="verified"><i class="fa fa-check-circle"></i></small></h3>
                            @if($candidateGeneralInfo->current_position != '')
                                <p>{{ $candidateGeneralInfo->current_position }}</p>
                            @endif
                            <ul class="address_list">
                                <li class="list-inline-item"><a href="#">{{ $city->name }}</a></li>
                                <li class="list-inline-item"><a href="#">{{ $country->name }}</a></li>
                            </ul>
                            <ul class="review_list">
                                @if( $avgRating == 1 || $avgRating < 1.5)
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                @elseif( $avgRating == 2 || $avgRating < 2.5)
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                @elseif( $avgRating == 3 || $avgRating < 3.5)
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                @elseif( $avgRating == 4 || $avgRating < 4.5)
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                @elseif( $avgRating == 5 || $avgRating >= 4.5)
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4" style="margin-top: 45px;">
                    <div class="candidate_personal_overview">
                        @if($checkShortListResume = \App\ShortListedResume::where('company', auth::user()->id)->where('candidate', $candidateGeneralInfo->user_id)->exists())
                            <button class="btn btn-block btn-thm"  onclick="event.preventDefault();
                            document.getElementById('RemoveShortListedResume').submit();"><span class="flaticon-favorites"></span> Remove Shortlist
                                <form action="{{ route('RemoveShortListedResume') }}" id="RemoveShortListedResume" method="POST" style="display: none;">
                                    @csrf
                                    <input type="hidden" name="candidate" value="{{ $candidateGeneralInfo->user_id }}">
                                </form>
                            </button>
                        @else
                            <button class="btn btn-block btn-thm" onclick="event.preventDefault();
                            document.getElementById('shortListResume').submit();"><span class="flaticon-favorites"></span> Shortlist
                                <form action="{{ route('shortListResume') }}" id="shortListResume" method="POST" style="display: none;">
                                    @csrf
                                    <input type="hidden" name="candidate" value="{{ $candidateGeneralInfo->user_id }}">
                                </form>
                            </button>
                        @endif
                        <button class="btn btn-block btn-thm"><span class="flaticon-ticket"></span> Make An Offer</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sticky Header -->
    <section class="sticky_heading bgc-f3 h80 p0">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="sticky-nav-tabs">
                        <div class="sticky-nav-tabs-container">
                            <li class="list-inline-item"><a class="sticky-nav-tab" href="#tab-1">About</a></li>
                            <li class="list-inline-item"><a class="sticky-nav-tab" href="#tab-2">Education</a></li>
                            <li class="list-inline-item"><a class="sticky-nav-tab" href="#tab-3">Work & Experience</a></li>
                            <li class="list-inline-item"><a class="sticky-nav-tab" href="#tab-5">Skills</a></li>
                            <li class="list-inline-item"><a class="sticky-nav-tab" href="#tab-6">Extra-Curricular Activities</a></li>
                            <li class="list-inline-item"><a class="sticky-nav-tab" href="#tab-7">Reviews</a></li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Candidate Personal Info Details-->
    <section class="bgc-white">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="row">
                        <div id="tab-1" class="col-lg-12">
                            <div class="candidate_about_info">
                                <h4 class="fz20 mb30">About Me</h4>
                                <p class="mb30">
                                    {!! $candidateGeneralInfo->short_description !!}
                                </p>
                            </div>
                        </div>
                        <div id="tab-2" class="col-lg-12">
                            <div class="my_resume_eduarea style2">
                                <h4 class="title">Education</h4>
                                @foreach($candidateEducations as $candidateEducation)
                                @php
                                    $degree = \App\EducationDegree::where('id', $candidateEducation->degree)->first();
                                @endphp
                                <div class="content">
                                    <div class="circle bgc-thm"></div>
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
                            <div id="tab-3" class="my_resume_eduarea style2">
                                <h4 class="title">Work & Experience</h4>
                                @foreach($candidateExperiences as $candidateExperience)
                                <div class="content">
                                    <div class="circle bgc-thm"></div>
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
                        <div id="tab-5" class="col-lg-12">
                            <div class="candidate_resume_skill">
                                <h4 class="title">Skills</h4>
                                <!--Progress Levels-->
                                <div class="progress-levels">
                                    <div class="progress-box wow" data-wow-delay="100ms" data-wow-duration="1500ms">
                                        <h5 class="box-title">Sketch App</h5>
                                        <div class="inner">
                                            <div class="bar">
                                                <div class="bar-innner"><div class="bar-fill ulockd-bgthm" data-percent="80"><div class="percent"></div></div></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-box wow" data-wow-delay="200ms" data-wow-duration="1500ms">
                                        <h5 class="box-title">Web Design</h5>
                                        <div class="inner">
                                            <div class="bar">
                                                <div class="bar-innner"><div class="bar-fill ulockd-bgthm" data-percent="90"><div class="percent"></div></div></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-box wow" data-wow-delay="200ms" data-wow-duration="1500ms">
                                        <h5 class="box-title">Mobile UI Design</h5>
                                        <div class="inner">
                                            <div class="bar">
                                                <div class="bar-innner"><div class="bar-fill ulockd-bgthm" data-percent="60"><div class="percent"></div></div></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div id="tab-6" class="my_resume_eduarea style2">
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
                        @php
                            $companyRating = \App\CandidateRating::where('candidate_id', $candidateGeneralInfo->user_id)->where('is_deleted', 0)->count();
                        @endphp
                        <div id="tab-7" class="col-lg-12">
                            <div class="candidate_review_posted style2 result">
                                <h4 class="title mb30" style="margin-top: 40px;">Candidate Reviews</h4>
                                @if($companyRating != 0)
                                    @php
                                        $limit = 3;
                                    @endphp
                                @if($candidateRating)
                                    @php
                                        $limit = 2;
                                    @endphp
                                <div class="details ratingBox">
                                            <img class="img-fluid rounded-circle float-left companyImage" src="{{ asset($candidateRating->image) }}" alt="1.jpg">
                                            <h4>{{ $candidateRating->review_title }}
                                                <ul class="review float-right">
                                                    <li class="list-inline-item"><a class="av_review" href="#">{{ $candidateRating->rating }}</a></li>
                                                    @if( $candidateRating->rating == 1)
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                    @elseif( $candidateRating->rating == 2)
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                    @elseif( $candidateRating->rating == 3)
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                    @elseif( $candidateRating->rating == 4)
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                    @else
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                    @endif
                                                </ul>
                                            </h4>
                                            <ul class="meta">
                                                <li class="list-inline-item"><a class="text-thm2" href="#">{{ $candidateRating->name }}</a></li>
                                                <li class="list-inline-item"><a href="#"><span class="flaticon-event"></span> {{ date_format(new DateTime($candidateRating->rating_created), 'M d, Y') }}</a></li>
                                            </ul>
                                            <p>
                                                {{ $candidateRating->review_content }}
                                            </p>
                                            @if($candidateRating->company_id == Auth::user()->id)
                                                <ul class="rating-edit-delete-candidate" style="display: none;">
                                                    <li class="list-inline-item" id="editButton"><a href="javascript:void(0);">edit</a></li>
                                                </ul>
                                            @endif
                                        </div>
                                @endif
                                @php
                                    $i = 0;
                                @endphp
                                @foreach($candidateRatings as $key => $data)
                                    @php
                                        if ($key == Auth::user()->id){
                                            continue;
                                        }
                                    @endphp
                                <div class="details ratingBox">
                                    <img class="img-fluid rounded-circle float-left companyImage" src="{{ asset($data->image) }}" alt="1.jpg">
                                    <h4>{{ $data->review_title }}
                                        <ul class="review float-right">
                                            <li class="list-inline-item"><a class="av_review" href="#">{{ $data->rating }}</a></li>
                                            @if( $data->rating == 1)
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            @elseif( $data->rating == 2)
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            @elseif( $data->rating == 3)
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            @elseif( $data->rating == 4)
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            @else
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            @endif
                                        </ul>
                                    </h4>
                                    <ul class="meta">
                                        <li class="list-inline-item"><a class="text-thm2" href="#">{{ $data->name }}</a></li>
                                        <li class="list-inline-item"><a href="#"><span class="flaticon-event"></span> {{ date_format(new DateTime($data->rating_created), 'M d, Y') }}</a></li>
                                    </ul>
                                    <p>
                                        {{ $data->review_content }}
                                    </p>
                                    @if($data->company_id == Auth::user()->id)
                                        <ul class="rating-edit-delete-candidate" style="display: none;">
                                            <li class="list-inline-item" id="editButton"><a href="javascript:void(0);">edit</a></li>
                                        </ul>
                                    @endif
                                </div>
                                    @php
                                        if(++$i >= $limit) break;
                                    @endphp
                                @endforeach
                                <a class="mt25 allReview" style="margin-left: 28px;" href="javascript:void(0);">View all Reviews<span class="flaticon-right-arrow pl10"></span></a>
                            </div>
                            <div id="updateForm">

                            </div>
                            @else
                                <div class="col-lg-12">
                                    <div class="job_shareing">
                                        <div class="candidate_social_widget bgc-fa">
                                            <div style="text-align: center">No Review!</div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        @php
                            $candidateRating = \App\CandidateRating::where('company_id', Auth::user()->id)->where('candidate_id', $candidateGeneralInfo->user_id)->where('is_deleted', 0)->first();
                        @endphp
                        @if(!$candidateRating)
                        <div class="col-lg-12">
                            <h4 class="title fz20">Leave Your Review</h4>
                            <div class="candidate_leave_review text-center">
                                <div class="detials">
                                    <form id="review-form" class="ulockd-mrgn630 rating" action="{{ route('submitCandidateRating') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="candidate_id" value="{{ $candidateGeneralInfo->user_id }}">
                                        <h4>What is it like to work with {{ $user->name }}</h4>
                                        <div class="star-rating">
                                            <input type="radio" name="rating" id="Overall_5" value="5" class="radio">
                                            <label for="Overall_5"></label>
                                            <input type="radio" name="rating" id="Overall_4" value="4" class="radio">
                                            <label for="Overall_4"></label>
                                            <input type="radio" name="rating" id="Overall_3" value="3" class="radio">
                                            <label for="Overall_3"></label>
                                            <input type="radio" name="rating" id="Overall_2" value="2" class="radio">
                                            <label for="Overall_2"></label>
                                            <input type="radio" name="rating" id="Overall_1" value="1" class="radio" checked>
                                            <label for="Overall_1"></label>
                                        </div>
                                        <div class="form-group text-left">
                                            <label class="title">Review Title</label>
                                            <input class="form-control" type="text" name="review_title" value="{{ old('review_title') }}" required>
                                        </div>
                                        <div class="form-group text-left">
                                            <label class="control-label title">Review Content</label>
                                            <textarea class="form-control" rows="5" name="review_content" required>{{ old('review_content') }}</textarea>
                                            <button type="submit" class="btn btn-lg btn-thm" style="margin-top: 15px;">Submit Review <span class="flaticon-right-arrow"></span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="candidate_working_widget bgc-fa">
                        <div class="icon text-thm"><span class="flaticon-controls"></span></div>
                        <div class="details">
                            <h4>Experience</h4>
                            <p>6-9 Years</p>
                        </div>
                        <div class="icon text-thm"><span class="flaticon-gender"></span></div>
                        <div class="details">
                            <h4>Gender</h4>
                            <p>{{ ucwords(strtolower($candidateGeneralInfo->gender)) }}</p>
                        </div>
                        @php
                            $dateOfBirth = $candidateGeneralInfo->date_of_birth;
                            $age = \Carbon\Carbon::parse($dateOfBirth)->age;
                        @endphp
                        <div class="icon text-thm"><span class="flaticon-old-age-man"></span></div>
                        <div class="details">
                            <h4>Age</h4>
                            <p>{{ $age }}</p>
                        </div>
                        <div class="icon text-thm"><span class="flaticon-paper"></span></div>
                        <div class="details">
                            <h4>Languages</h4>
                            <p>English, Turkish, Hindi</p>
                        </div>
                        <div class="icon text-thm"><span class="flaticon-mortarboard"></span></div>
                        <div class="details">
                            <h4>Education</h4>
                            <p>Certificate</p>
                        </div>
                        <div class="icon text-thm"><span class="flaticon-eye"></span></div>
                        <div class="details">
                            <p class="color-black22">Today Views</p>
                            <p>{{ $perDayViewer }}</p>
                        </div>
                        <div class="icon text-thm"><span class="flaticon-zoom-in"></span></div>
                        <div class="details">
                            <p class="color-black22">Total Views</p>
                            <p>{{ $totalViewer }}</p>
                        </div>
                    </div>
                    <div class="candidate_social_widget bgc-fa">
                        <ul>
                            <li>Social Profiles</li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <h4 class="fz20 mb30">Attachments</h4>
                    <div class="candidate_document_widget">
                        <div class="details">
                            <div class="icon"><span class="flaticon-doc"></span></div>
                            <h4 class="title">Cover Letter</h4>
                            <p>PDF</p>
                        </div>
                    </div>
                    <div class="candidate_document_widget">
                        <div class="icon"><span class="flaticon-doc"></span></div>
                        <div class="details">
                            <h4 class="title">Contrac</h4>
                            <p>DOCX</p>
                        </div>
                    </div>
                    <h4 class="fz20 mb30">Contact Martha Griffin</h4>
                    <div class="candidate_contact_form bgc-fa">
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Your Name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Your Email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Subject">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-block btn-thm">Send Now <span class="flaticon-right-arrow"></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('myJs')
    <script>

        $(document).on({
            mouseenter: function () {
                $('.rating-edit-delete-candidate').css('display', 'block');
            },
            mouseleave: function () {
                $('.rating-edit-delete-candidate').css('display', 'none');
            }
        }, ".ratingBox");

        $('.allReview').on('click',function () {
            var candidate_id = $('#candidate_id').val();
            $.ajax({
                url: '{{ url('all/candidate/review') }}/' + candidate_id,
                type: 'GET',
                success: function (data) {
                    $('.result').html(data);
                }
            });
        });

        $(document).on('click', '#editButton', function () {
            var candidate_id = $('#candidate_id').val();
            $.ajax({
                url: '{{ url('edit/candidate/rating') }}/' + candidate_id,
                type: 'GET',
                success: function (data) {
                    $(window).scrollTop($('#updateForm').offset().top-35);
                    $('#updateForm').html(data);
                    $('.rating-edit-delete-candidate li').css('display', 'none');
                }
            });
        });

    </script>
@endsection