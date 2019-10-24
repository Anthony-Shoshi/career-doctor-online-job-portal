@if($candidates->count() > 0)
@foreach($candidates as $candidate)
    @php
        $city = \App\City::where('id',$candidate->current_city_id)->first();
        $country = \App\Country::where('id',$candidate->current_country_id)->first();
        $candidateUser = \App\User::where('id',$candidate->user_id)->first();
        $totalRaters = \App\CandidateRating::where('candidate_id', $candidate->user_id)->where('candidate_ratings.is_deleted', 0)->count();
        $totalRating = \App\CandidateRating::where('candidate_id', $candidate->user_id)->where('candidate_ratings.is_deleted', 0)->sum('rating');
        $avgRating = 0;
        if ($totalRaters > 0) {
            $avgRating = round($totalRating / $totalRaters, 1);
        }
    @endphp
    <div class="col-lg-12">
        <div class="candidate_list_view">
            <div class="thumb">
                <img class="img-fluid rounded-circle" src="{{ asset($candidateUser->image) }}" alt="c1.jpg">
                <div class="cpi_av_rating"><span>{{ $avgRating }}</span></div>
            </div>
            <div class="content">
                <h4 class="title">{{ $candidateUser->name }}</h4>
                @if($candidate->current_position != '')
                <p>{{ $candidate->current_position }}</p>
                @endif
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
                <ul class="address_list">
                    <li class="list-inline-item"><a href="#"><h4>Location</h4> <span class="flaticon-location-pin"></span> {{ $city->name }}, {{ $country->name }}</a></li>
                </ul>
            </div>
            <a class="btn btn-transparent float-right fn-lg" target="_blank" href="{{ route('candidateProfileView', $candidate->user_id) }}">View Profile <span class="flaticon-right-arrow"></span></a>
        </div>
    </div>
@endforeach
<br>
<div style="margin-left: 40%;">
    {{ $candidates->links("pagination::bootstrap-4") }}
</div>
@else
    <div class="text-center">
        No Candidate Found!
    </div>
@endif