<h4 class="title mb30">Candidate Reviews</h4>
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
@endforeach