@extends('dashboard.layouts.master')
@section('content')
    <div class="col-sm-12 col-lg-8 col-xl-9">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="mb30">Cover Letter</h4>
                <a href="{{ route('createNewCoverLetter') }}">Add New <span class="flaticon-right-arrow"></span></a>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="candidate_revew_search_box mt30">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Serach" aria-label="Search">
                        <button class="btn my-2 my-sm-0" type="submit"><span class="flaticon-search"></span></button>
                    </form>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="candidate_revew_select text-right mt30">
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
                <div class="cnddte_fvrt_job candidate_job_reivew style2">
                    <div class="table-responsive job_review_table">
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($coverLetters->count() > 0)
                                @foreach($coverLetters as $coverLetter)
                                    <tr>
                                        <th scope="row">
                                            <h4>{{ $coverLetter->title }}</h4>
                                        </th>
                                        <td class="text-thm2">
                                            @if($coverLetter->status == 'DRAFT')
                                                <span class="badge badge-danger h5 text-white">Draft</span>
                                            @else($coverLetter->status == 'PUBLISHED')
                                                <span class="badge badge-success h5 text-white">Published</span>
                                            @endif
                                        </td>
                                        <td>
                                            <ul class="view_edit_delete_list">
                                                <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="bottom" title="View"><span class="flaticon-eye"></span></a></li>
                                                <li class="list-inline-item"><a href="{{ route('editCoverLetter',[$coverLetter->id]) }}" data-toggle="tooltip" data-placement="bottom" title="Edit"><span class="flaticon-edit"></span></a></li>
                                                <li class="list-inline-item"><a href="{{ route('deleteCoverLetter',[$coverLetter->id]) }}" onclick="return(confirm('Are you sure to delete this cover letter?'));" data-toggle="tooltip" data-placement="bottom" title="Delete"><span class="flaticon-rubbish-bin"></span></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" style="text-align: center;">
                                        No Cover Letter!
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div style="margin-left: 34%;">
                        {!! $coverLetters->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection