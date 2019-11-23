@extends('dashboard.layouts.master')
@section('content')
    <div class="col-sm-12 col-lg-8 col-xl-9">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="mb30">Job Applications</h4>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="candidate_revew_search_box mt30">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Serach" aria-label="Search" id="search">
                        <button class="btn my-2 my-sm-0" type="button" style="cursor: default;"><span class="flaticon-search"></span></button>
                    </form>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="candidate_revew_select text-right mt30">
                    <ul>
                        <li class="list-inline-item">Sort by:</li>
                        <li class="list-inline-item">
                            <select class="selectpicker show-tick" id="sort">
                                <option value="newest">Newest</option>
                                <option value="oldest">Oldest</option>
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
                                <th scope="col">Candidate Name</th>
                                <th scope="col">Job Title</th>
                                <th scope="col">Applied Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody id="result">
                            @if($jobApplicationStatuses->count() != 0)
                                @foreach($jobApplicationStatuses as $jobApplicationStatus)
                                    <tr>
                                        <th scope="row">
                                            {{ $jobApplicationStatus->name }}
                                        </th>
                                        <th scope="row">
                                            {{ $jobApplicationStatus->title }}
                                        </th>
                                        <td><span class="color-black22">
                                            {{ date('M d, Y', strtotime($jobApplicationStatus->appliedDate)) }}
                                        </td>
                                        <td class="text-thm2">
                                            @if($jobApplicationStatus->status == 'DECLINED')
                                            <span class="badge badge-danger h5 text-white">{{ $jobApplicationStatus->status }}</span>
                                            @else
                                            <span class="badge badge-success h5 text-white">{{ $jobApplicationStatus->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <ul class="view_edit_delete_list">
                                                <li class="list-inline-item"><a href="{{ route('viewResumePdf', $jobApplicationStatus->id) }}" data-toggle="tooltip" target="_blank" data-placement="bottom" title="View Resume"><span class="flaticon-eye"></span></a></li>
                                                <li class="list-inline-item"><a href="{{ route('editStatus', $jobApplicationStatus->id) }}" class="ajax-modal" data-title="Edit Status" data-toggle="tooltip" data-placement="bottom" title="Edit Status"><span class="flaticon-edit"></span></a></li>
                                                <li class="list-inline-item"><a href="{{ route('downloadResume', $jobApplicationStatus->id) }}" data-toggle="tooltip" data-placement="bottom" title="Download Resume"><span class="flaticon-download"></span></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="4" style="text-align: center;">
                                        No Application Found!
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div style="margin-left: 34%;">
                    {!! $jobApplicationStatuses->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection