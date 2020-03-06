@extends('dashboard.layouts.master')
@section('content')
    <div class="col-sm-12 col-lg-8 col-xl-9">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="mb30">Manage Jobs</h4>
            </div>
            @php
                $postedJob = \App\Job::where('company', Auth::user()->id)->where('is_deleted', 0)->count();
                $postedJobActive = \App\Job::where('company', Auth::user()->id)->where('is_deleted', 0)->where('is_published', 1)->count();
            @endphp
            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <div class="icon_boxs">
                    <div class="icon"><span class="flaticon-work"></span></div>
                    <div class="details"><h4>{{ $postedJob }} Posted Job</h4></div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <div class="icon_boxs">
                    <div class="icon style3"><span class="flaticon-work"></span></div>
                    <div class="details"><h4>{{ $postedJobActive }} Active Job</h4></div>
                </div>
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
                                <th scope="col">Job Title</th>
                                <th scope="col">Applications</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody id="result">
                            @if(count($jobs) > 0)
                            @foreach($jobs as $job)
                            <tr>
                                <th scope="row">
                                    <h4>{{ $job->title }}</h4>
                                    <p><span class="flaticon-location-pin"></span> {{ $job->city->name }}, {{ $job->country->name }}</p>
                                    <ul>
                                        <li class="list-inline-item"><span class="flaticon-event"> Created: </span></li>
                                        <li class="list-inline-item">{{ $job->created_at->format('M d, Y') }}</li>
                                        <li class="list-inline-item"><span class="flaticon-event"> Expiry: </span></li>
                                        <li class="list-inline-item">{{ date('M d, Y', strtotime($job->deadline)) }}</li>
                                    </ul>
                                </th>
                                <td><span class="color-black22">17</span> Application(s)</td>
                                <td class="text-thm2">
                                    @if($job->is_published == 1)
                                    <span class="badge badge-success h5 text-white">Published</span>
                                    @else
                                    <span class="badge badge-danger h5 text-white">Not Published</span>
                                    @endif
                                </td>
                                <td>
                                    <ul class="view_edit_delete_list">
                                        <li class="list-inline-item"><a href="{{ route('viewJobPost',$job->id) }}" data-toggle="tooltip" data-placement="bottom" title="View"><span class="flaticon-eye"></span></a></li>
                                        <li class="list-inline-item"><a href="{{ route('editJobPost',$job->id) }}" data-toggle="tooltip" data-placement="bottom" title="Edit"><span class="flaticon-edit"></span></a></li>
                                        <li class="list-inline-item"><a href="{{ route('deleteJobPost',$job->id) }}" onclick="return confirm('Are you sure to delete this job post?');" data-toggle="tooltip" data-placement="bottom" title="Delete"><span class="flaticon-rubbish-bin"></span></a></li>
                                    </ul>
                                </td>
                            </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="4" style="text-align: center;">
                                        No Jobs Posted!
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div style="margin-left: 34%;">
                    {!! $jobs->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('myJs')
    <script>
        // Search
        $(document).on('keyup','#search',function(){
            var search = $(this).val();
            if (search != '') {
                $.ajax({
                    url: '{{ url('manage/jobs/search') }}/' + search,
                    type: 'GET',
                    success:function(data){
                        $('#result').html(data);
                    }
                })

                $('.pagination').parent().css('display','none');
            } else {
                $.ajax({
                    url: '{{ url('manage/jobs/search/all') }}',
                    type: 'GET',
                    success:function(data){
                        $('#result').html(data);
                    }
                })

                $('.pagination').parent().css('display','block');
            }
        });

        //sort by
        $(document).on('change','#sort',function () {
           var value = $(this).val();
            $.ajax({
                url: '{{ url('manage/jobs/sort/by') }}/' + value,
                type: 'GET',
                success: function (data) {
                    $('#result').html(data);
                }
            });
        });
    </script>
@endsection