@if($jobs->count() > 0)
@foreach($jobs as $job)
    @php
        $jobTpe = \App\JobType::where('id',$job->job_type)->first();
        $city = \App\City::where('id',$job->city_id)->first();
        $country = \App\Country::where('id',$job->country_id)->first();
        $currency = \App\Currency::where('id',$job->currency)->first();
        $company = \App\CompanyGeneralInfo::where('user_id',$job->company)->first();
        $companyImage = \App\User::where('id',$job->company)->first()->image;
    @endphp
    <div class="col-lg-12">
        <div class="fj_post style2">
            <div class="details">
                <h5 class="job_chedule text-thm mt0">{{ $jobTpe->title }}</h5>
                <div class="thumb fn-smd">
                    <a href="{{ route('singleJobView',[$job->id]) }}" target="_blank"><img class="img-fluid" src="{{ asset($companyImage) }}" alt="1.jpg"></a>
                </div>
                <a href="{{ route('singleJobView',[$job->id]) }}" target="_blank"><h4>{{ $job->title }}</h4></a>
                <p>Posted : {{ date_format(new DateTime($job->created_at),'d M, Y') }} by <a class="text-thm" target="_blank" href="{{ route('companyProfileView',[$job->company]) }}">{{ $company->company_name }}</a></p>
                <p>
                    @if($job->is_visa_sponsor == '1')
                        <span class="fa fa-dot-circle-o"></span> Visa Sponsored
                    @endif
                    @if($job->is_relocation == 1)
                        <span class="fa fa-dot-circle-o"></span> Relocation
                    @endif
                </p>
                <ul class="featurej_post">
                    <li class="list-inline-item"><span class="flaticon-location-pin"></span> {{ $city->name }}, {{ $country->name }}</li>
                    @if($job->is_negotiable == 1)
                        <li class="list-inline-item"><span class="flaticon-price pl20"></span> Negotiable</li>
                    @else
                        <li class="list-inline-item"><span class="flaticon-price pl20"></span> {{ $job->min_salary/1000 .'k' }} {{ $currency->code }} - {{ $job->max_salary/1000 .'k' }} {{ $currency->code }} @php $salary_terms = str_replace('_', ' ', $job->salary_terms) @endphp {{ ucwords(strtolower($salary_terms)) }}</li>
                    @endif
                </ul>
            </div>
            @auth
                @if(Auth::user()->user_type != 'company')
                    @if($checkShortList = \App\ShortListedJob::where('candidate', auth::user()->id)->where('job',$job->id)->exists())
                        <a data-toggle="tooltip" data-placement="bottom" title="Remove" class="favorit" onclick="event.preventDefault();
                                            document.getElementById('deListSub').submit();"><span class="flaticon-favorites"></span>
                            <form action="{{ route('deListJob') }}" id="deListSub" method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" name="job" value="{{ $job->id }}">
                            </form>
                        </a>
                    @else
                        <a data-toggle="tooltip" data-placement="bottom" title="Favourite" class="favorit" onclick="event.preventDefault();
                                            document.getElementById('shortListSub').submit();"><span class="flaticon-favorites"></span>
                            <form action="{{ route('shortListJob') }}" id="shortListSub" method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" name="job" value="{{ $job->id }}">
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

<div style="margin-left: 40%;">
    {{ $jobs->links("pagination::bootstrap-4") }}
</div>
@else
    <div class="text-center">
        No Search Result Found!
    </div>
@endif

<script>
    @if($jobs->count() > 0)
        $('.countSearchResult').text('{{ $jobs->count() }} Job Found')
    @else
        $('.countSearchResult').text('0 Job Found')
    @endif
</script>