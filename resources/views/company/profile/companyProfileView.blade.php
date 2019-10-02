@extends('candidate.layouts.master')
@section('myCss')
    <link rel="stylesheet" href="{{ asset('css/myStyle.css') }}">
@endsection
@section('content')
    <!-- Candidate Personal Info-->
    <section class="bgc-fa mt70 pt40 mt50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-xl-9">
                    <div class="candidate_personal_info style3">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ asset($companyImage) }}" alt="Company Banner">
                            <div class="cpi_av_rating"><span>{{ $avgRating }}</span></div>
                        </div>
                        <div class="details">
                            <h3>{{ $company->company_name }}</h3>
                            <p class="text-thm2">
                                {{ $industry->industry_name }}
                            </p>
                            <ul class="address_list">
                                @if($company->website != '')<li class="list-inline-item"><a href="{{ $company->website }}" target="_blank"><span class="flaticon-link text-thm2"></span> {{ $company->website }} </a></li>@endif
                                @if($company->contact_person_phone != '')<li class="list-inline-item"><a href="#"><span class="flaticon-phone-call text-thm2"></span> {{ $company->contact_person_phone }} </a></li>@endif
                                <li class="list-inline-item"><a href="#"><span class="flaticon-mail text-thm2"></span>{{ $company->contact_person_email }}</a></li>
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
                <div class="col-lg-3 col-xl-3">
                    <div class="candidate_personal_overview style2">
                        @auth
                        @if(Auth::user()->user_type != 'company')
                        @if($checkFollwer = \App\CompanyFollower::where('candidate', auth::user()->id)->where('company',$company->user_id)->exists())
                        <button class="btn btn-block btn-thm mb15 submit">Unfollow</button>
                        <input type="hidden" id="company" value="{{$company->user_id}}">
                        <button class="btn btn-block btn-gray"><span class="flaticon-consulting-message pr10"></span> Add a Review</button>
                        @else
                        <button class="btn btn-block btn-thm mb15 submit"> Follow Us</button>
                        <input type="hidden" id="company" value="{{$company->user_id}}">
                        <button class="btn btn-block btn-gray"><span class="flaticon-consulting-message pr10"></span> Add a Review</button>
                        @endif
                        @endif
                        @endauth
                        @guest
                        <button class="btn btn-block btn-thm mb15 submit"> Follow Us</button>
                        <input type="hidden" id="company" value="{{$company->user_id}}">
                        <button class="btn btn-block btn-gray"><span class="flaticon-consulting-message pr10"></span> Add a Review</button>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Candidate Personal Info Details-->
    <section class="employe_details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="row">
                        @if($company->company_description != '')
                        <div class="col-lg-12">
                            <div class="candidate_about_info style2">
                                <h4 class="fz20 mb30">Job Details</h4>
                                {!! $company->company_description !!}
                            </div>
                        </div>
                        @endif
                        <div class="col-lg-12">
                            <div class="job_shareing">
                                <div class="candidate_social_widget bgc-fa">
                                    <ul>
                                        <li>Share This Company:</li>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="my_resume_eduarea">
                                <h4 class="title mb30">Open Jobs of this Company</h4>
                                @if($jobsPostedByThisCompany->count() != 0)
                                <a class="mt25" href="{{ route('jobListOfThisCompany',[$company->user_id]) }}" target="_blank">View all jobs of this company<span class="flaticon-right-arrow pl10"></span></a>
                                @endif
                            </div>
                        </div>
                            @if($jobsPostedByThisCompany->count() != 0)
                            @foreach($jobsPostedByThisCompany as $jobPostedByThisCompany)
                                @php
                                    $jobTpe = \App\JobType::where('id',$jobPostedByThisCompany->job_type)->first();
                                    $city = \App\City::where('id',$jobPostedByThisCompany->city_id)->first();
                                    $country = \App\Country::where('id',$jobPostedByThisCompany->country_id)->first();
                                    $currency = \App\Currency::where('id',$jobPostedByThisCompany->currency)->first();
                                    $company = \App\CompanyGeneralInfo::where('user_id',$jobPostedByThisCompany->company)->first();
                                    $companyImage = \App\User::where('id',$jobPostedByThisCompany->company)->first()->image;
                                @endphp
                                <div class="col-lg-12">
                                    <div class="fj_post style2">
                                        <div class="details">
                                            <h5 class="job_chedule text-thm mt0">{{ $jobTpe->title }}</h5>
                                            <div class="thumb fn-smd">
                                                <a href="{{ route('singleJobView',[$jobPostedByThisCompany->id]) }}" target="_blank"><img class="img-fluid" src="{{ asset($companyImage) }}" alt="1.jpg"></a>
                                            </div>
                                            <a href="{{ route('singleJobView',[$jobPostedByThisCompany->id]) }}" target="_blank"><h4>{{ $jobPostedByThisCompany->title }}</h4></a>
                                            <p>Posted : {{ date_format(new DateTime($jobPostedByThisCompany->created_at),'d M, Y') }} by <a class="text-thm" target="_blank" href="{{ route('companyProfileView',[$jobPostedByThisCompany->company]) }}">{{ $company->company_name }}</a></p>
                                            <p>
                                                @if($jobPostedByThisCompany->is_visa_sponsor == '1')
                                                    <span class="fa fa-dot-circle-o"></span> Visa Sponsored
                                                @endif
                                                @if($jobPostedByThisCompany->is_relocation == 1)
                                                    <span class="fa fa-dot-circle-o"></span> Relocation
                                                @endif
                                            </p>
                                            <ul class="featurej_post">
                                                <li class="list-inline-item"><span class="flaticon-location-pin"></span> {{ $city->name }}, {{ $country->name }}</li>
                                                @if($jobPostedByThisCompany->is_negotiable == 1)
                                                    <li class="list-inline-item"><span class="flaticon-price pl20"></span> Negotiable</li>
                                                @else
                                                    <li class="list-inline-item"><span class="flaticon-price pl20"></span> {{ $jobPostedByThisCompany->min_salary/1000 .'k' }} {{ $currency->code }} - {{ $jobPostedByThisCompany->max_salary/1000 .'k' }} {{ $currency->code }}</li>
                                                @endif
                                            </ul>
                                        </div>
                                        @auth
                                            @if(Auth::user()->user_type != 'company')
                                                @if($checkShortList = \App\ShortListedJob::where('candidate', auth::user()->id)->where('job',$jobPostedByThisCompany->id)->exists())
                                                    <a data-toggle="tooltip" data-placement="bottom" title="Remove" class="favorit" onclick="event.preventDefault();
                                                        document.getElementById('deListSub').submit();"><span class="flaticon-favorites"></span>
                                                        <form action="{{ route('deListJob') }}" id="deListSub" method="POST" style="display: none;">
                                                            @csrf
                                                            <input type="hidden" name="job" value="{{ $jobPostedByThisCompany->id }}">
                                                        </form>
                                                    </a>
                                                @else
                                                    <a data-toggle="tooltip" data-placement="bottom" title="Favourite" class="favorit" onclick="event.preventDefault();
                                                        document.getElementById('shortListSub').submit();"><span class="flaticon-favorites"></span>
                                                        <form action="{{ route('shortListJob') }}" id="shortListSub" method="POST" style="display: none;">
                                                            @csrf
                                                            <input type="hidden" name="job" value="{{ $jobPostedByThisCompany->id }}">
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
                                                    <input type="hidden" name="job" value="{{ $jobPostedByThisCompany->id }}">
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
                                            <div style="text-align: center">No jobs posted!</div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @php
                                $candidateRating = \App\CompanyRating::where('company_id', $company->user_id)->where('is_deleted', 0)->count();
                            @endphp
                        <div class="col-lg-12">
                            <div class="candidate_review_posted style2 result">
                                <h4 class="title mb30">Company Review</h4>
                                @if($candidateRating != 0)
                                @php
                                    $limit = 3;
                                @endphp
                                @auth
                                @if($companyRating)
                                        @php
                                            $limit = 2;
                                        @endphp
                                    <div class="details ratingBox">
                                        <img class="img-fluid rounded-circle float-left" src="{{ asset($companyRating->image) }}" alt="1.jpg">
                                        <h4>{{ $companyRating->review_title }}
                                            <ul class="review float-right">
                                                <li class="list-inline-item"><a class="av_review" href="#">{{ $companyRating->rating }}</a></li>
                                                @if( $companyRating->rating == 1)
                                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                @elseif( $companyRating->rating == 2)
                                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                @elseif( $companyRating->rating == 3)
                                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                @elseif( $companyRating->rating == 4)
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
                                            <li class="list-inline-item"><a class="text-thm2" href="#">{{ $companyRating->name }}</a></li>
                                            <li class="list-inline-item"><a href="#"><span class="flaticon-event"></span> {{ date_format(new DateTime($companyRating->rating_created), 'M d, Y') }}</a></li>
                                        </ul>
                                        <p>{{ $companyRating->review_content }}</p>
                                        @auth
                                            @if($companyRating->candidate_id == Auth::user()->id)
                                                <ul class="rating-edit-delete" style="display: none;">
                                                    <li class="list-inline-item" id="editButton"><a href="javascript:void(0);">edit</a></li>
                                                </ul>
                                            @endif
                                        @endauth
                                    </div>
                                @endif
                                @endauth
                                @php
                                    $i = 0;
                                @endphp
                                @foreach($companyRatings as $key => $data)
                                    @auth
                                        @php
                                            if ($key == Auth::user()->id){
                                                continue;
                                            }
                                        @endphp
                                        @endauth
                                    <div class="details ratingBox">
                                    <img class="img-fluid rounded-circle float-left" src="{{ asset($data->image) }}" alt="1.jpg">
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
                                    <p>{{ $data->review_content }}</p>
                                    @auth
                                        @if($data->candidate_id == Auth::user()->id)
                                            <ul class="rating-edit-delete" style="display: none;">
                                                <li class="list-inline-item" id="editButton"><a href="javascript:void(0);">edit</a></li>
                                            </ul>
                                        @endif
                                    @endauth
                                </div>
                                    @php
                                        if(++$i >= $limit) break;
                                    @endphp
                                @endforeach
                                <a class="mt25 allReview" href="javascript:void(0);">View all Reviews<span class="flaticon-right-arrow pl10"></span></a>
                            </div>
                            <div id="updateForm">

                            </div>
                            @else
                                <div class="col-lg-12">
                                    <div class="job_shareing">
                                        <div class="candidate_social_widget bgc-fa">
                                            <div style="text-align: center">No Rating!</div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        @auth
                        @php
                            $candidateRating = \App\CompanyRating::where('candidate_id', Auth::user()->id)->where('company_id', $company->user_id)->where('is_deleted', 0)->first();
                        @endphp
                        @if(!$candidateRating)
                        <div class="col-lg-12">
                            <h4 class="title" style="font-size: 20px;">Leave Your Review</h4>
                            <div class="candidate_leave_review text-center">
                                <div class="detials">
                                    <form id="review-form" class="ulockd-mrgn630 rating" action="{{ route('submitRating') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="company_id" value="{{ $company->user_id }}">
                                        <h4>What is it like to work at {{ $company->company_name }}</h4>
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
                        @endauth
                        @guest
                                <div class="col-lg-12">
                                    <h4 class="title" style="font-size: 20px;">Leave Your Review</h4>
                                    <div class="candidate_leave_review text-center">
                                        <div class="detials">
                                            <form id="review-form" class="ulockd-mrgn630 rating" action="{{ route('submitRating') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="company_id" value="{{ $company->user_id }}">
                                                <h4>What is it like to work at {{ $company->company_name }}</h4>
                                                <div class="star-rating">
                                                    <input type="radio" name="rating" id="Overall_5" value="5" class="radio">
                                                    <label for="Overall_5"></label>
                                                    <input type="radio" name="rating" id="Overall_4" value="4" class="radio">
                                                    <label for="Overall_4"></label>
                                                    <input type="radio" name="rating" id="Overall_3" value="3" class="radio">
                                                    <label for="Overall_3"></label>
                                                    <input type="radio" name="rating" id="Overall_2" value="2" class="radio">
                                                    <label for="Overall_2"></label>
                                                    <input type="radio" name="rating" id="Overall_1" value="1" class="radio">
                                                    <label for="Overall_1"></label>
                                                </div>
                                                <div class="form-group text-left">
                                                    <label class="title">Review Title</label>
                                                    <input class="form-control @error('review_title') is-invalid @enderror" type="text" name="review_title" value="{{ old('review_title') }}">
                                                    @error('review_title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group text-left">
                                                    <label class="control-label title">Review Content</label>
                                                    <textarea class="form-control @error('review_content') is-invalid @enderror" rows="5" name="review_content">{{ old('review_content') }}</textarea>
                                                    @error('review_content')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    <button type="submit" class="btn btn-lg btn-thm" style="margin-top: 15px;">Submit Review <span class="flaticon-right-arrow"></span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        @endguest
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="map_sidebar_widget mb30">
                        <h4 class="fz20 mb30">Job Location</h4>
                        <div class="h300" id="map-canvas"></div>
                    </div>
                    <h4 class="fz20 mb30">Company Information</h4>
                    <div class="candidate_working_widget style2 bgc-fa">
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
                        <div class="icon text-thm"><span class="flaticon-label"></span></div>
                        <div class="details">
                            <p class="color-black22">Posted Jobs</p>
                            <p>{{ $jobsPosted }}</p>
                        </div>
                        <div class="icon text-thm"><span class="flaticon-paper-plane"></span></div>
                        <div class="details">
                            <p class="color-black22">Locations</p>
                            <p>{{ $city->name }}, {{ $country->name }}</p>
                        </div>
                        <div class="icon text-thm"><span class="flaticon-2-squares"></span></div>
                        <div class="details">
                            <p class="color-black22">Industry</p>
                            <p>{{ $industry->industry_name }}</p>
                        </div>
                        <div class="icon text-thm"><span class="flaticon-timeline"></span></div>
                        <div class="details">
                            <p class="color-black22">Since</p>
                            <p>{{ $company->established }}</p>
                        </div>
                        <div class="icon text-thm"><span class="flaticon-team"></span></div>
                        <div class="details">
                            <p class="color-black22">Team Size</p>
                            <p>{{ $company->team_size }}</p>
                        </div>
                        <div class="icon text-thm"><span class="flaticon-user"></span></div>
                        <div class="details">
                            <p class="color-black22">Followers</p>
                            <p>{{ $companyFollower }}</p>
                        </div>
                    </div>
                    <h4 class="fz20 mb30">Contact Qiwo</h4>
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
        $(document).on('click', '.submit', function () {
            var company = $('#company').val();
            var dis = $(this);
            if (dis.text() != 'Unfollow'){
                $.ajax({
                    url: '{{ url('company/follow') }}/' + company,
                    type: 'GET',
                    success: function (data) {
                        dis.text("Unfollow");
                    },
                    error: function(xhr, status, error) {
                        window.location.href = '{{ url('/login') }}';
                    }
                });
            } else {
                $.ajax({
                    url: '{{ url('company/unFollow') }}/' + company,
                    type: 'GET',
                    success: function (data) {
                        dis.text("Follow");
                    },
                    error: function(xhr, status, error) {
                        window.location.href = '{{ url('/login') }}';
                    }
                });
            }
        });

        // $(document).hover(function () {
        //    $('.rating-edit-delete').css('display', 'block');
        // }, function () {
        //     $('.rating-edit-delete').css('display', 'none');
        // }, '.ratingBox');

        $(document).on({
            mouseenter: function () {
                $('.rating-edit-delete').css('display', 'block');
            },
            mouseleave: function () {
                $('.rating-edit-delete').css('display', 'none');
            }
        }, ".ratingBox");

        $('.allReview').on('click',function () {
            var company_id = $('#company').val();
            $.ajax({
                url: '{{ url('all/review') }}/' + company_id,
                type: 'GET',
                success: function (data) {
                    $('.result').html(data);
                }
            });
        });

        $(document).on('click', '#editButton', function () {
            var company_id = $('#company').val();
            $.ajax({
                url: '{{ url('edit/rating') }}/' + company_id,
                type: 'GET',
                success: function (data) {
                    $(window).scrollTop($('#updateForm').offset().top-35);
                    $('#updateForm').html(data);
                    $('.rating-edit-delete li').css('display', 'none');
                }
            });
        });

    </script>
@endsection