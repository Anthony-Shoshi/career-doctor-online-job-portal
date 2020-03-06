@extends('candidate.layouts.master')
@section('content')
<section class="our-faq bgc-fa mt50">
    <form action="{{ route('jobListView') }}" method="post">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-xl-3 dn-smd">
                    <div class="faq_search_widget mb30">
                        <h4 class="fz20 mb15">Search Keywords</h4>
                        <div class="input-group mb-3">
                            <input type="text" name="keyword" id="keyword" class="form-control search-keyword" placeholder="e.g. web design" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><span class="flaticon-search"></span></button>
                            </div>
                        </div>
                    </div>
                    <div class="faq_search_widget mb30">
                        <h4 class="fz20 mb15">Location</h4>
                        <div class="input-group mb-3">
                            <input type="text" name="location" class="form-control search-location" placeholder="All Location" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon3"><span class="flaticon-location-pin"></span></button>
                            </div>
                        </div>
                    </div>
                    <div class="cl_skill_checkbox mb30">
                        <h4 class="fz20 mb20">Category</h4>
                        <div class="content ui_kit_checkbox text-left">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="category" value="all" class="custom-control-input custom-category" id="customCheck9">
                                <label class="custom-control-label" for="customCheck9">All Category</label>
                            </div>
                            @foreach($jobCategories as $jobCategory)
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="category" class="custom-control-input custom-category" value="{{ $jobCategory->id }}" id="customCheck9{{ $jobCategory->id }}">
                                <label class="custom-control-label" for="customCheck9{{ $jobCategory->id }}">{{ $jobCategory->category_name }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="cl_latest_activity mb30">
                        <h4 class="fz20 mb15">Date Posted</h4>
                        <div class="ui_kit_radiobox">
                            <div class="radio">
                                <input id="radio_one" class="date-posted" value="last hour" name="lastHour" type="radio">
                                <label for="radio_one"><span class="radio-label"></span> Last Hour</label>
                            </div>
                            <div class="radio">
                                <input id="radio_two" class="date-posted" value="last 24 hour" name="last24Hour" type="radio">
                                <label for="radio_two"><span class="radio-label"></span> Last 24 hours</label>
                            </div>
                            <div class="radio">
                                <input id="radio_three" class="date-posted" value="last 7 days" name="last7Days" type="radio">
                                <label for="radio_three"><span class="radio-label"></span> Last 7 days</label>
                            </div>
                            <div class="radio">
                                <input id="radio_four" class="date-posted" value="last 14 days" name="last14Days" type="radio">
                                <label for="radio_four"><span class="radio-label"></span> Last 14 days</label>
                            </div>
                            <div class="radio">
                                <input id="radio_five" class="date-posted" value="last 30 days" name="last30Days" type="radio">
                                <label for="radio_five"><span class="radio-label"></span> Last 30 days</label>
                            </div>
                            <div class="radio">
                                <input id="radio_five1" class="date-posted" value="all" name="last30Days" type="radio">
                                <label for="radio_five1"><span class="radio-label"></span> View All</label>
                            </div>
                        </div>
                    </div>
                    <div class="cl_latest_activity mb30">
                        <h4 class="fz20 mb15">Job Type</h4>
                        <div class="ui_kit_whitchbox">
                            @foreach($jobTypes as $jobType)
                            <div class="custom-control custom-switch">
                                <input type="checkbox" name="jobType" class="custom-control-input jobType" value="{{ $jobType->id }}" id="customSwitch1{{ $jobType->id }}">
                                <label class="custom-control-label" for="customSwitch1{{ $jobType->id }}">{{ $jobType->title }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="cl_pricing_slider mb30">
                        <h4 class="fz20 mb20">Salary Range</h4>
                        <div id="slider-range"></div>
                        <p class="text-center">
                            <input class="sl_input" name="salary" type="text" id="amount">
                        </p>
                        <div class="container" style="margin-left: -30px;">
                            <div class="row">
                                <div class="col-md-12">
                                    <select class="form-control salary-term" style="margin-top: 15px;">
                                        <option value="">Salary Term</option>
                                        <option value="PER_MONTH">Per Month</option>
                                        <option value="PER_YEAR">Per Year</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <select class="form-control currency" style="margin-top: 15px;">
                                        <option value="">Select Currency</option>
                                        @foreach($currencies as $currency)
                                            <option value="{{ $currency->id }}">{{ $currency->code }} ({{ $currency->symbol }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cl_carrer_lever mb30">
                        <div id="accordion2" class="accordion">
                            <div class="link mb10">Experince<i class="fa fa-caret-up"></i></div>
                            <div class="cl_submenu">
                                <div class="ui_kit_checkbox">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" value="less than 1year" class="custom-control-input experience" id="customCheck118">
                                        <label class="custom-control-label" for="customCheck118">Less than 1Year</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" value="1year to 2year" class="custom-control-input experience" id="customCheck18">
                                        <label class="custom-control-label" for="customCheck18">1Year to 2Year</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" value="2year to 3year" class="custom-control-input experience" id="customCheck19">
                                        <label class="custom-control-label" for="customCheck19">2Year to 3Year</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" value="3year to 4year" class="custom-control-input experience" id="customCheck20">
                                        <label class="custom-control-label" for="customCheck20">3Year to 4Year</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" value="4year to 5year" class="custom-control-input experience" id="customCheck21">
                                        <label class="custom-control-label" for="customCheck21">4Year to 5Year</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" value="more than 5year" class="custom-control-input experience" id="customCheck211">
                                        <label class="custom-control-label" for="customCheck211">More than 5Year</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cl_carrer_lever mb30">
                        <div id="accordion3" class="accordion">
                            <div class="link mb10">Gender<i class="fa fa-caret-up"></i></div>
                            <div class="cl_submenu">
                                <div class="ui_kit_checkbox">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input gender" value="MALE" id="customCheck22">
                                        <label class="custom-control-label" for="customCheck22">Male</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input gender" value="FEMALE" id="customCheck23">
                                        <label class="custom-control-label" for="customCheck23">Female</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input gender" value="OTHER" id="customCheck24">
                                        <label class="custom-control-label" for="customCheck24">Others</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cl_carrer_lever mb30">
                        <div id="accordion4" class="accordion">
                            <div class="link mb10">Industry<i class="fa fa-caret-up"></i></div>
                            <div class="cl_submenu">
                                <div class="ui_kit_checkbox">
                                    @foreach($jobIndustries as $jobIndustry)
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input industry" value="{{ $jobIndustry->id }}" id="customCheck25{{ $jobIndustry->id }}">
                                        <label class="custom-control-label" for="customCheck25{{ $jobIndustry->id }}">{{ $jobIndustry->industry_name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cl_carrer_lever">
                        <div id="accordion5" class="accordion">
                            <div class="link mb10">Qualification<i class="fa fa-caret-up"></i></div>
                            <div class="cl_submenu">
                                <div class="ui_kit_checkbox">
                                    @foreach($jobQualifications as $jobQualification)
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input qualification" value="{{ $jobQualification->id }}" id="customCheck31{{ $jobQualification->id }}">
                                        <label class="custom-control-label" for="customCheck31{{ $jobQualification->id }}">{{ $jobQualification->qualification_name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-9 col-xl-9">
                    <div class="row">
                        <div class="col-lg-12 mb30">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-lg-6" style="margin-top: -25px;">
                            <div class="candidate_job_alart_btn">
                                <h4 class="fz20 mb15 countSearchResult"></h4>
                                <button class="btn btn-thm btns dn db-991 float-right" type="button">Show Filter</button>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6" style="margin-top: -80px;">
                            <div class="candidate_revew_select text-right mt50 mt10-smd">
                                <ul>
                                    <li class="list-inline-item">Sort by:</li>
                                    <li class="list-inline-item">
                                        <select class="selectpicker show-tick" id="sort">
                                            <option value="desc">Newest</option>
                                            <option value="asc">Oldest</option>
                                        </select>
                                    </li>
                                </ul>
                            </div>
                            <div class="content_details">
                                <div class="details">
                                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><span>Hide Filter</span><i>×</i></a>
                                    <div class="faq_search_widget mb30">
                                        <h4 class="fz20 mb15">Search Keywords</h4>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control search-keyword" placeholder="e.g. web design" aria-label="Recipient's username" aria-describedby="button-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" id="button-addon4"><span class="flaticon-search"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="faq_search_widget mb30">
                                        <h4 class="fz20 mb15">Location</h4>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control search-location" placeholder="Find Your Question" aria-label="Recipient's username" aria-describedby="button-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" id="button-addon5"><span class="flaticon-location-pin"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cl_skill_checkbox mb30">
                                        <h4 class="fz20 mb20">Category</h4>
                                        <div class="content ui_kit_checkbox text-left">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" value="all" class="custom-control-input custom-category" id="customCheck37">
                                                <label class="custom-control-label" for="customCheck37">All Category</label>
                                            </div>
                                            @foreach($jobCategories as $jobCategory)
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input custom-category" value="{{ $jobCategory->id }}" id="customCheck37{{ $jobCategory->id }}">
                                                <label class="custom-control-label" for="customCheck37{{ $jobCategory->id }}">{{ $jobCategory->category_name }}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="cl_latest_activity mb30">
                                        <h4 class="fz20 mb15">Date Posted</h4>
                                        <div class="ui_kit_radiobox">
                                            <div class="radio">
                                                <input id="radio_six" class="date-posted" value="last hour" name="radio" type="radio">
                                                <label for="radio_six"><span class="radio-label"></span> Last Hour</label>
                                            </div>
                                            <div class="radio">
                                                <input id="radio_seven" class="date-posted" value="last 24 hour" name="radio" type="radio">
                                                <label for="radio_seven"><span class="radio-label"></span> Last 24 hours</label>
                                            </div>
                                            <div class="radio">
                                                <input id="radio_eight" class="date-posted" value="last 7 days" name="radio" type="radio">
                                                <label for="radio_eight"><span class="radio-label"></span> Last 7 days</label>
                                            </div>
                                            <div class="radio">
                                                <input id="radio_nine" class="date-posted" value="last 14 days" name="radio" type="radio">
                                                <label for="radio_nine"><span class="radio-label"></span> Last 14 days</label>
                                            </div>
                                            <div class="radio">
                                                <input id="radio_ten" class="date-posted" value="last 30 days" name="radio" type="radio">
                                                <label for="radio_ten"><span class="radio-label"></span> Last 30 days</label>
                                            </div>
                                            <div class="radio">
                                                <input id="radio_ten23" class="date-posted" value="all" name="radio" type="radio">
                                                <label for="radio_ten23"><span class="radio-label"></span> View All</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cl_latest_activity mb30">
                                        <h4 class="fz20 mb15">Job Type</h4>
                                        <div class="ui_kit_whitchbox">
                                            @foreach($jobTypes as $jobType)
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input jobType" value="{{ $jobType->id }}" id="customSwitch6{{ $jobType->id }}">
                                                <label class="custom-control-label" for="customSwitch6{{ $jobType->id }}">{{ $jobType->title }}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="cl_pricing_slider mb30">
                                        <h4 class="fz20 mb20">Salary Range</h4>
                                        <div id="slider-range2"></div>
                                        <p class="text-center">
                                            <input class="sl_input" type="text" id="amount2">
                                        </p>
                                    </div>

                                    <div class="cl_carrer_lever mb30">
                                        <div id="accordion7" class="accordion">
                                            <div class="link mb10">Experince<i class="fa fa-caret-up"></i></div>
                                            <div class="cl_submenu">
                                                <div class="ui_kit_checkbox">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" value="less than 1year" class="custom-control-input experience" id="customCheck514">
                                                        <label class="custom-control-label" for="customCheck514">Less than 1Year</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" value="1year to 2year" class="custom-control-input experience" id="customCheck54">
                                                        <label class="custom-control-label" for="customCheck54">1Year to 2Year</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" value="2year to 3year" class="custom-control-input experience" id="customCheck55">
                                                        <label class="custom-control-label" for="customCheck55">2Year to 3Year</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" value="3year to 4year" class="custom-control-input experience" id="customCheck56">
                                                        <label class="custom-control-label" for="customCheck56">3Year to 4Year</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" value="4year to 5year" class="custom-control-input experience" id="customCheck57">
                                                        <label class="custom-control-label" for="customCheck57">4Year to 5Year</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" value="more than 5year" class="custom-control-input experience" id="customCheck517">
                                                        <label class="custom-control-label" for="customCheck517">More than 5Year</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cl_carrer_lever mb30">
                                        <div id="accordion8" class="accordion">
                                            <div class="link mb10">Gender<i class="fa fa-caret-up"></i></div>
                                            <div class="cl_submenu">
                                                <div class="ui_kit_checkbox">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input gender" value="MALE" id="customCheck58">
                                                        <label class="custom-control-label" for="customCheck58">Male</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input gender" value="FEMALE" id="customCheck59">
                                                        <label class="custom-control-label" for="customCheck59">Female</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input gender" value="OTHER" id="customCheck60">
                                                        <label class="custom-control-label" for="customCheck60">Others</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cl_carrer_lever mb30">
                                        <div id="accordion9" class="accordion">
                                            <div class="link mb10">Industry<i class="fa fa-caret-up"></i></div>
                                            <div class="cl_submenu">
                                                <div class="ui_kit_checkbox">
                                                    @foreach($jobIndustries as $jobIndustry)
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input industry" value="{{ $jobIndustry->id }}" id="customCheck61{{ $jobIndustry->id }}">
                                                        <label class="custom-control-label" for="customCheck61{{ $jobIndustry->id }}">{{ $jobIndustry->industry_name }}</label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cl_carrer_lever">
                                        <div id="accordion10" class="accordion">
                                            <div class="link mb10">Qualification<i class="fa fa-caret-up"></i></div>
                                            <div class="cl_submenu">
                                                <div class="ui_kit_checkbox">
                                                    @foreach($jobQualifications as $jobQualification)
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input qualification" value="{{ $jobQualification->id }}" id="customCheck67{{ $jobQualification->id }}">
                                                        <label class="custom-control-label" for="customCheck67{{ $jobQualification->id }}">{{ $jobQualification->qualification_name }}</label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tag_container" style="width:100%;">
                            @include('searches.searchByJobTypes')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection
@section('myJs')
    <script>

        $(document).ready(function () {
            $(document).on('change keyup blur','.search-keyword,.custom-category,.date-posted,.jobType,.experience,.gender,.industry,.qualification,.search-location,.salary-term,#sort,.currency', function () {
                dataList('{{ route('jobListView') }}');
            });
            var one = $('#slider-range').slider("values")[0];
            var two = $('#slider-range').slider("values")[1];
            $('#slider-range').slider({
                change: function(event, ui) {
                    if(ui.values[ 0 ] != one || ui.values[ 0 ] != two) {
                        dataList('{{ route('jobListView') }}');
                    }
                }
            });
        });


        $(document).on('click', '.qualification', function () {
            if ($('.qualification').is(':checked') == true) {
                $('.qualification').prop('checked', false);
                $(this).prop('checked', true);
            }
        });
        $(document).on('click', '.industry', function () {
            if ($('.industry').is(':checked') == true) {
                $('.industry').prop('checked', false);
                $(this).prop('checked', true);
            }
        });
        $(document).on('click', '.gender', function () {
            if ($('.gender').is(':checked') == true) {
                $('.gender').prop('checked', false);
                $(this).prop('checked', true);
            }
        });
        $(document).on('click', '.experience', function () {
            if ($('.experience').is(':checked') == true) {
                $('.experience').prop('checked', false);
                $(this).prop('checked', true);
            }
        });
        $(document).on('click', '.jobType', function () {
            if ($('.jobType').is(':checked') == true) {
                $('.jobType').prop('checked', false);
                $(this).prop('checked', true);
            }
        });
        $(document).on('click', '.custom-category', function () {
            if ($('.custom-category').is(':checked') == true) {
                $('.custom-category').prop('checked', false);
                $(this).prop('checked', true);
            }
        });
        $(document).on('click', '.date-posted', function () {
            if ($('.date-posted').is(':checked') == true) {
                $('.date-posted').prop('checked', false);
                $(this).prop('checked', true);
            }
        });
    </script>

    <script type="text/javascript">
        $(window).on('hashchange', function() {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                }else{
                    getData(page);
                }
            }
        });

        $(document).ready(function()
        {
            $(document).on('click', '.pagination a',function(event)
            {
                event.preventDefault();

                $('li').removeClass('active');
                $(this).parent('li').addClass('active');

                var myurl = $(this).attr('href');
                var page=$(this).attr('href').split('page=')[1];

                getData(page);
                $("html, body").animate({ scrollTop: 0 }, "slow");
            });

        });

        function getData(page){
            dataList('?page=' + page);
        }

        function dataList(link){
            var values = {
                '_token': '{{ csrf_token() }}',
                'keyword': $('.search-keyword').val(),
                'city': $('.search-location').val(),
                'salaryTerm': $('.salary-term').val(),
                'sort': $('#sort').val(),
                'currency': $('.currency').val(),
                'min': $('#slider-range').slider("values")[0],
                'max': $('#slider-range').slider("values")[1],
                'category': $('.custom-category:checkbox:checked').val(),
                'datePosted': $('.date-posted:radio:checked').val(),
                'jobType': $('.jobType:checkbox:checked').val(),
                'experience': $('.experience:checkbox:checked').val(),
                'gender': $('.gender:checkbox:checked').val(),
                'industry': $('.industry:checkbox:checked').val(),
                'qualification': $('.qualification:checkbox:checked').val()
            };
            //alert($('#sort').val());
            //console.log($('.sort').val());
            $.ajax({
                method: "POST",
                url: link,
                data: values,
                beforeSend: function(){
                    $("#preloader").css("display","block");
                },success: function(data){
                    $("#tag_container").empty().html(data);
                }
            });

        }
    </script>

    <script>
        $(document).ready(function() {
            $( "#keyword" ).autocomplete({

                source: function(request, response) {
                    $.ajax({
                        url: "{{route('autocomplete')}}",
                        data: {
                            term : request.term
                        },
                        dataType: "json",
                        success: function(data){
                            var resp = $.map(data,function(obj){
                                //console.log(obj.city_name);
                                return obj.title;
                            });

                            response(resp);
                        }
                    });
                },
                minLength: 1
            });
        });

    </script>
@endsection