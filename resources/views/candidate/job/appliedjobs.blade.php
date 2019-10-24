@extends('dashboard.layouts.master')
@section('content')
    <div class="col-lg-8 col-xl-9">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="fz18 mb30">Applied Jobs</h4>
            </div>
        </div>
        <div class="row applyed_job">
            @if($appliedJobs->count() != 0)
            @foreach($appliedJobs as $appliedJob)
            <div class="col-sm-12 col-lg-12">
                <div class="fj_post">
                    <div class="details">
                        @php
                            $jobTpe = \App\JobType::where('id',$appliedJob->job_type)->first();
                            $city = \App\City::where('id',$appliedJob->city_id)->first();
                            $country = \App\Country::where('id',$appliedJob->country_id)->first();
                            $currency = \App\Currency::where('id',$appliedJob->currency)->first();
                            $company = \App\CompanyGeneralInfo::where('user_id',$appliedJob->company)->first();
                            $companyImage = \App\User::where('id',$appliedJob->company)->first()->image;
                        @endphp
                        <h5 class="job_chedule text-thm mt0">{{ $jobTpe->title }}</h5>
                        @if($appliedJob->status == 'WITHDRAWN' || $appliedJob->status == 'DECLINED')
                            <span class="badge badge-danger h5 text-white float-right" style="margin-top: -15px;">{{ $appliedJob->status }}</span>
                        @else
                            <span class="badge badge-success h5 text-white float-right" style="margin-top: -15px;">{{ $appliedJob->status }}</span>
                        @endif
                        <div class="thumb fn-smd">
                        <img class="img-fluid" src="{{ asset($companyImage) }}" alt="2.jpg">
                        </div>
                        <h4>{{ $appliedJob->title }}</h4>
                        <p>Posted : {{ date_format(new DateTime($appliedJob->created_at),'d M, Y') }} by <a class="text-thm" target="_blank" href="{{route('companyProfileView',[$appliedJob->company])}}">{{ $company->company_name }}</a></p>
                        <p>
                            @if($appliedJob->is_visa_sponsor == '1')
                                <span class="fa fa-dot-circle-o"></span> Visa Sponsored
                            @endif
                            @if($appliedJob->is_relocation == 1)
                                <span class="fa fa-dot-circle-o"></span> Relocation
                            @endif
                        </p>
                        <ul class="featurej_post">
                            <li class="list-inline-item"><span class="flaticon-location-pin"></span> {{ $city->name }}, {{ $country->name }}</li>
                            @if($appliedJob->is_negotiable == 1)
                                <li class="list-inline-item"><span class="flaticon-price pl20"></span> Negotiable</li>
                            @else
                                <li class="list-inline-item"><span class="flaticon-price pl20"></span> {{ $appliedJob->min_salary/1000 .'k' }} {{ $currency->code }} - {{ $appliedJob->max_salary/1000 .'k' }} {{ $currency->code }} @php $salary_terms = str_replace('_', ' ', $appliedJob->salary_terms) @endphp {{ ucwords(strtolower($salary_terms)) }}</li>
                            @endif
                        </ul>
                    </div>

                    <ul class="view_edit_delete_list float-right">
                        <li class="list-inline-item"><a target="_blank" href="{{ route('singleJobView', [$appliedJob->job]) }}" data-toggle="tooltip" data-placement="top" title="View Job"><span class="flaticon-eye"></span></a></li>
                        @if($appliedJob->status == 'APPLIED')
                        <li class="list-inline-item"><a href="{{ route('withdrawApplication', [$appliedJob->id]) }}" onclick="return(confirm('Are you sure to withdraw this job application?'));" data-toggle="tooltip" data-placement="top" title="Withdraw Application"><span class="fa fa-remove"></span></a></li>
                        @endif
                    </ul>
                </div>
                <br>
                <div style="margin-left: 34%;">
                    {!! $appliedJobs->links() !!}
                </div>
            </div>
            @endforeach
            @else
                <div style="margin: 0px auto;">
                    Not Applied Yet!
                </div>
            @endif
        </div>
    </div>
@endsection