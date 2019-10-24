@extends('dashboard.layouts.master')
@section('content')
    <div class="col-sm-12 col-lg-8 col-xl-9">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="fz20 mb30">Reviews</h4>
            </div>
            <div class="col-lg-6">
                <div class="candidate_revew_search_box">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Serach" aria-label="Search">
                        <button class="btn my-2 my-sm-0" type="submit"><span class="flaticon-search"></span></button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="candidate_revew_select text-right">
                    <ul>
                        <li class="list-inline-item">Sort by:</li>
                        <li class="list-inline-item">
                            <select class="selectpicker show-tick">
                                <option>Newest</option>
                                <option>Recent</option>
                                <option>Old Review</option>
                            </select>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="candidate_job_reivew">
                    <div class="table-responsive job_review_table">
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Company</th>
                                <th scope="col">Title</th>
                                <th scope="col">Review</th>
                                <th scope="col">Star</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($reviews->count() != 0)
                            @foreach($reviews as $review)
                            <tr>
                                <th scope="row">{{ $review->company_name }}</th>
                                <td>{{ $review->review_title }}</td>
                                <td>{!!Str::words($review->review_content,15,' ....')!!}</td>
                                <td>{{ $review->rating }} star</td>
                                <td>
                                    <ul class="view_edit_delete_list">
                                        <li class="list-inline-item"><a href="{{ route('viewCandidateReview', $review->id) }}" data-title="View Review" class="ajax-modal" data-toggle="tooltip" data-placement="top" title="View"><span class="flaticon-eye"></span></a></li>
                                    </ul>
                                </td>
                            </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="4" style="text-align: center;">
                                        No Review Found!
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection