@extends('dashboard.layouts.master')
@section('content')
    <div class="col-sm-12 col-lg-8 col-xl-9">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="mb30">Favourite Jobs </h4>
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
                                <th scope="col">Location</th>
                                <th scope="col">Deadline</th>
                                <th scope="col">Posted</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody id="result">
                            @if(count($shortListedJobs) > 0)
                            @foreach($shortListedJobs as $shortListedJob)
                                @php
                                    $country = \App\Country::where('id',$shortListedJob->country_id)->first();
                                    $city = \App\City::where('id',$shortListedJob->city_id)->first();
                                @endphp
                                <tr>
                                    <th scope="row">
                                        {{ $shortListedJob->title }}
                                    </th>
                                    <td>
                                        {{ $city->name }}, {{ $country->name }}
                                    </td>
                                    <td style="color: darkred;">
                                        {{ date('M d, Y', strtotime($shortListedJob->deadline)) }}
                                    </td>
                                    <td>
                                        {{ $shortListedJob->created_at->format('M d, Y') }}
                                    </td>
                                    <td>
                                        <ul class="view_edit_delete_list">
                                            <li class="list-inline-item"><a target="_blank" href="{{ route('singleJobView',[$shortListedJob->job]) }}" data-toggle="tooltip" data-placement="bottom" title="View"><span class="flaticon-eye"></span></a></li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="4" style="text-align: center;">
                                        No Favourite Jobs!
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        <div style="margin-left: 40%;">
                            {!! $shortListedJobs->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('myJs')
    <script>
        $(document).on('keyup','#search',function () {
            var search = $(this).val();
            if (search != '') {
                $.ajax({
                    url: '{{ url('shortListed/job/search') }}/' + search,
                    type: 'GET',
                    success: function (data) {
                        $('#result').html(data);
                    }
                });

                $('.pagination').parent().css('display','none');

            } else {
                $.ajax({
                    url: '{{ url('shortListed/job/search/all') }}',
                    type: 'GET',
                    success: function (data) {
                        $('#result').html(data);
                    }
                });

                $('.pagination').parent().css('display','block');
            }

        });

        //sort by
        $(document).on('change','#sort',function () {
            var value = $(this).val();
            $.ajax({
                url: '{{ url('shortListed/job/sort/by') }}/' + value,
                type: 'GET',
                success: function (data) {
                    $('#result').html(data);
                }
            });
        });
    </script>
@endsection