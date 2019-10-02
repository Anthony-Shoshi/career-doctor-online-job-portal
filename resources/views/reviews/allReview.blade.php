<h4 class="title mb30">Company Review</h4>
@if($companyRating)
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
@endforeach
