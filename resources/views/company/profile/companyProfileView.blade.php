@extends('candidate.layouts.master')
@section('content')
    <!-- Candidate Personal Info-->
    <section class="bgc-fa mt70 pt40 mt50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-xl-9">
                    <div class="candidate_personal_info style3">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ asset($company->company_banner) }}" alt="Company Banner">
                            <div class="cpi_av_rating"><span>4.5</span></div>
                        </div>
                        <div class="details">
                            <h3>{{ $company->company_name }}</h3>
                            <p class="text-thm2">
                                {{ $industry->industry_name }}
                            </p>
                            <ul class="address_list">
                                <li class="list-inline-item"><a href="#"><span class="flaticon-link text-thm2"></span> www.themeforest.com</a></li>
                                <li class="list-inline-item"><a href="#"><span class="flaticon-phone-call text-thm2"></span>{{ $company->contact_person_phone }}</a></li>
                                <li class="list-inline-item"><a href="#"><span class="flaticon-mail text-thm2"></span>{{ $company->contact_person_email }}</a></li>
                            </ul>
                            <ul class="review_list">
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xl-3">
                    <div class="candidate_personal_overview style2">
                        <button class="btn btn-block btn-thm mb15"><span class="flaticon-alarm pr10"></span> Follow Us</button>
                        <button class="btn btn-block btn-gray"><span class="flaticon-consulting-message pr10"></span> Add a Review</button>
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
                                @endphp
                                <div class="col-lg-12">
                                    <div class="fj_post style2">
                                        <div class="details">
                                            <h5 class="job_chedule text-thm mt0">{{ $jobTpe->title }}</h5>
                                            <div class="thumb fn-smd">
                                                <a href="{{ route('singleJobView',[$jobPostedByThisCompany->id]) }}" target="_blank"><img class="img-fluid" src="{{ asset($company->company_banner) }}" alt="1.jpg"></a>
                                            </div>
                                            <a href="{{ route('singleJobView',[$jobPostedByThisCompany->id]) }}" target="_blank"><h4>{{ $jobPostedByThisCompany->title }}</h4></a>
                                            <p>Posted : {{ date_format(new DateTime($jobPostedByThisCompany->created_at),'d M, Y') }} by <a class="text-thm" target="_blank" href="{{ route('companyProfileView',[$jobPostedByThisCompany->company]) }}">{{ $company->company_name }}</a></p>
                                            <ul class="featurej_post">
                                                <li class="list-inline-item"><span class="flaticon-location-pin"></span> {{ $city->name }}, {{ $country->name }}</li>
                                                @if($jobPostedByThisCompany->is_negotiable == 1)
                                                    <li class="list-inline-item"><span class="flaticon-price pl20"></span> Negotiable</li>
                                                @else
                                                    <li class="list-inline-item"><span class="flaticon-price pl20"></span> {{ $jobPostedByThisCompany->min_salary/1000 .'k' }} {{ $currency->code }} - {{ $jobPostedByThisCompany->max_salary/1000 .'k' }} {{ $currency->code }}</li>
                                                @endif
                                            </ul>
                                        </div>
                                        <a class="favorit" href="#"><span class="flaticon-favorites"></span></a>
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
                        <div class="col-lg-12">
                            <div class="candidate_review_posted style2">
                                <h4 class="title mb30">Company Review</h4>
                                <div class="details">
                                    <img class="img-fluid rounded-circle float-left" src="images/team/1.jpg" alt="1.jpg">
                                    <h4>Best Company
                                        <ul class="review float-right">
                                            <li class="list-inline-item"><a class="av_review" href="#">4.5</a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        </ul>
                                    </h4>
                                    <ul class="meta">
                                        <li class="list-inline-item"><a class="text-thm2" href="#">Ali Tufan</a></li>
                                        <li class="list-inline-item"><a href="#"><span class="flaticon-event"></span> 2 days ago</a></li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vel augue eget quam fermentum sodales. Aliquam vel congue sapien, quis mollis quam.</p>
                                </div>
                                <div class="details pt0">
                                    <img class="img-fluid rounded-circle float-left" src="images/team/2.jpg" alt="2.jpg">
                                    <h4>Aldus PageMaker including versions
                                        <ul class="review float-right">
                                            <li class="list-inline-item"><a class="av_review" href="#">4.5</a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        </ul>
                                    </h4>
                                    <ul class="meta">
                                        <li class="list-inline-item"><a class="text-thm2" href="#">Dominikus Yuri</a></li>
                                        <li class="list-inline-item"><a href="#"><span class="flaticon-event"></span> 23 August 2018</a></li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vel augue eget quam fermentum sodales. Aliquam vel congue sapien, quis mollis quam.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <h4 class="title" style="font-size: 20px;">Leave Your Review</h4>
                            <div class="candidate_leave_review text-center">
                                <div class="detials">
                                    <form id="review-form" class="ulockd-mrgn630" action="#" method="post">
                                        <h4>What is it like to work at Martha</h4>
                                        <div class="star-rating">
                                            <input type="radio" name="ratings[1]" id="Overall_5" value="5" class="radio">
                                            <label for="Overall_5"></label>
                                            <input type="radio" name="ratings[1]" id="Overall_4" value="4" class="radio">
                                            <label for="Overall_4"></label>
                                            <input type="radio" name="ratings[1]" id="Overall_3" value="3" class="radio">
                                            <label for="Overall_3"></label>
                                            <input type="radio" name="ratings[1]" id="Overall_2" value="2" class="radio">
                                            <label for="Overall_2"></label>
                                            <input type="radio" name="ratings[1]" id="Overall_1" value="1" class="radio">
                                            <label for="Overall_1"></label>
                                        </div>
                                        <div class="form-group text-left">
                                            <label class="title" for="name2">Review Title</label>
                                            <input class="form-control" type="text" name="name2" id="name2" value="">
                                        </div>
                                        <div class="form-group text-left">
                                            <label class="control-label title" for="review">Review Content</label>
                                            <textarea class="form-control" rows="5" name="review" id="review"></textarea>
                                            <a href="#" class="btn btn-lg btn-thm">Submit Review <span class="flaticon-right-arrow"></span></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
                            <p class="color-black22">Viewed</p>
                            <p>164</p>
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
                            <p>2002</p>
                        </div>
                        <div class="icon text-thm"><span class="flaticon-team"></span></div>
                        <div class="details">
                            <p class="color-black22">Team Size</p>
                            <p>15</p>
                        </div>
                        <div class="icon text-thm"><span class="flaticon-user"></span></div>
                        <div class="details">
                            <p class="color-black22">Followers</p>
                            <p>15</p>
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