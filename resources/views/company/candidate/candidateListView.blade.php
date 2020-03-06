@extends('candidate.layouts.master')
@section('content')
<section class="our-faq bgc-fa mt50">
    <form action="{{ route('candidateListView') }}" method="post">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-xl-3 dn-smd">
                    <div class="faq_search_widget mb30">
                        <h4 class="fz20 mb15">Search Keywords</h4>
                        <div class="input-group mb-3">
                            <input type="text" id="keyword" class="form-control search-keyword" placeholder="E.g John Smith" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><span class="flaticon-search"></span></button>
                            </div>
                        </div>
                    </div>
                    <div class="faq_search_widget mb30">
                        <h4 class="fz20 mb15">Location</h4>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control search-location" placeholder="E.g Dhaka" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><span class="flaticon-location-pin"></span></button>
                            </div>
                        </div>
                    </div>
                    <div class="cl_skill_checkbox mb30">
                        <h4 class="fz20 mb20">Position</h4>
                        <div class="content ui_kit_checkbox text-left">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" value="all" class="custom-control-input custom-category" id="customCheck321">
                                <label class="custom-control-label" for="customCheck321">All Position</label>
                            </div>
                            @php
                                $i = 1;
                                $candidatePositions = \App\CandidateGeneralInfo::select('current_position')->whereIn('current_status', [1, 2])->groupBy('current_position')->get();
                            @endphp
                            @foreach($candidatePositions as $candidatePosition)
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input position" value="{{ $candidatePosition->current_position }}" id="customCheck37{{ $i }}">
                                    <label class="custom-control-label" for="customCheck37{{ $i }}">{{ $candidatePosition->current_position }}</label>
                                </div>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </div>
                    </div>
                    <div class="cl_skill_checkbox mb30">
                        <h4 class="fz20 mb20">Industry</h4>
                        <div class="content ui_kit_checkbox text-left">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="category" value="all" class="custom-control-input custom-category" id="customCheck9">
                                <label class="custom-control-label" for="customCheck9">All Industry</label>
                            </div>
                            @foreach($jobIndustries as $jobIndustry)
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input industry" value="{{ $jobIndustry->id }}" id="customCheck9{{ $jobIndustry->id }}">
                                    <label class="custom-control-label" for="customCheck9{{ $jobIndustry->id }}">{{ $jobIndustry->industry_name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="cl_skill_checkbox mb30">
                        <h4 class="fz20 mb20">Skills</h4>
                        <div class="content ui_kit_checkbox text-left">
                            @php
                                $i = 1;
                                $skills = \App\ExperienceSkillRecord::select('job_skills.id as id', 'job_skills.skill_name')
                                ->join('job_skills', 'job_skills.id', 'experience_skill_records.job_skill')
                                ->where('experience_skill_records.is_deleted', 0)
                                ->groupBy('job_skills.skill_name')
                                ->get();
                            @endphp
                            @foreach($skills as $skill)
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input skill" value="{{ $skill->id }}" id="customCheck1{{ $i }}">
                                <label class="custom-control-label" for="customCheck1{{ $i }}">{{ $skill->skill_name }}</label>
                            </div>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </div>
                    </div>
                    <div class="cl_carrer_lever">
                        <div id="accordion" class="accordion">
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
                </div>
                <div class="col-lg-9 col-xl-9">
            <div class="row">
                <div class="col-sm-6 col-lg-6" style="margin-top: -15px;">
                    <div class="candidate_job_alart_btn">
                        <h4 class="fz20 mb15 countSearchResult"></h4>
                        <button class="btn btn-thm btns dn db-991 float-right" type="button">Show Filter</button>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6" style="margin-top: -68px;">
                    <div class="candidate_revew_select text-right mt50">
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
                                    <input type="text" class="form-control search-keyword" placeholder="E.g John Smith" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="button-addon2"><span class="flaticon-search"></span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="faq_search_widget mb30">
                                <h4 class="fz20 mb15">Location</h4>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control search-location" placeholder="E.g Dhaka" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="button-addon2"><span class="flaticon-location-pin"></span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="cl_skill_checkbox mb30">
                                <h4 class="fz20 mb20">Position</h4>
                                <div class="content ui_kit_checkbox text-left">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" value="all" class="custom-control-input custom-category" id="customCheck321">
                                        <label class="custom-control-label" for="customCheck321">All Position</label>
                                    </div>
                                    @php
                                        $i = 1;
                                        $candidatePositions = \App\CandidateGeneralInfo::select('current_position')->whereIn('current_status', [1, 2])->groupBy('current_position')->get();
                                    @endphp
                                    @foreach($candidatePositions as $candidatePosition)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input position" value="{{ $candidatePosition->current_position }}" id="customCheckM{{ $i }}">
                                            <label class="custom-control-label" for="customCheckM{{ $i }}">{{ $candidatePosition->current_position }}</label>
                                        </div>
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach
                                </div>
                            </div>
                            <div class="cl_skill_checkbox mb30">
                                <h4 class="fz20 mb20">Industry</h4>
                                <div class="content ui_kit_checkbox text-left">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" value="all" class="custom-control-input custom-category" id="customCheck321">
                                        <label class="custom-control-label" for="customCheck321">All Industry</label>
                                    </div>
                                    @foreach($jobIndustries as $jobIndustry)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input industry" value="{{ $jobIndustry->id }}" id="customCheck37{{ $jobIndustry->id }}">
                                            <label class="custom-control-label" for="customCheck37{{ $jobIndustry->id }}">{{ $jobIndustry->industry_name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="cl_latest_activity mb30">
                                <h4 class="fz20 mb15">Date Posted</h4>
                                <div class="ui_kit_radiobox">
                                    <div class="radio">
                                        <input id="radio_one" name="radio" type="radio" checked="">
                                        <label for="radio_one"><span class="radio-label"></span> Last Hour</label>
                                    </div>
                                    <div class="radio">
                                        <input id="radio_two" name="radio" type="radio">
                                        <label for="radio_two"><span class="radio-label"></span> Last 24 hours</label>
                                    </div>
                                    <div class="radio">
                                        <input id="radio_three" name="radio" type="radio">
                                        <label for="radio_three"><span class="radio-label"></span> Last 7 days</label>
                                    </div>
                                    <div class="radio">
                                        <input id="radio_four" name="radio" type="radio">
                                        <label for="radio_four"><span class="radio-label"></span> Last 14 days</label>
                                    </div>
                                    <div class="radio">
                                        <input id="radio_five" name="radio" type="radio">
                                        <label for="radio_five"><span class="radio-label"></span> Last 30 days</label>
                                    </div>
                                    <a class="text-thm2 pl30" href="#">View All <span class="flaticon-right-arrow pl10"></span></a>
                                </div>
                                <div class="cl_latest_activity mb30">
                                </div>
                            </div>
                            <div class="cl_skill_checkbox mb30">
                                <h4 class="fz20 mb20">Skills</h4>
                                <div class="content ui_kit_checkbox text-left">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">HTML 5</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">Javascript</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                                        <label class="custom-control-label" for="customCheck3">PHP</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck4">
                                        <label class="custom-control-label" for="customCheck4">jQuery</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck5">
                                        <label class="custom-control-label" for="customCheck5">UX/UI Design</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck6">
                                        <label class="custom-control-label" for="customCheck6">Design</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck7">
                                        <label class="custom-control-label" for="customCheck7">Web Design</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck8">
                                        <label class="custom-control-label" for="customCheck8">Graphic Design</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck9">
                                        <label class="custom-control-label" for="customCheck9">Sketch App</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck10">
                                        <label class="custom-control-label" for="customCheck10">UI Design</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck11">
                                        <label class="custom-control-label" for="customCheck11">Graphic Design</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck12">
                                        <label class="custom-control-label" for="customCheck12">Sketch App</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck13">
                                        <label class="custom-control-label" for="customCheck13">UI Design</label>
                                    </div>
                                </div>
                            </div>
                            <div class="cl_carrer_lever mb30">
                                <div id="accordion" class="accordion">
                                    <div class="link mb10">Career Level<i class="fa fa-caret-up"></i></div>
                                    <div class="cl_submenu">
                                        <div class="ui_kit_checkbox">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck14">
                                                <label class="custom-control-label" for="customCheck14">Intermediate</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck15">
                                                <label class="custom-control-label" for="customCheck15">Normal</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck16">
                                                <label class="custom-control-label" for="customCheck16">Special</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck17">
                                                <label class="custom-control-label" for="customCheck17">Experienced</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cl_carrer_lever mb30">
                                <div id="accordion" class="accordion">
                                    <div class="link mb10">Gender<i class="fa fa-caret-up"></i></div>
                                    <div class="cl_submenu">
                                        <div class="ui_kit_checkbox">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input gender" value="MALE" id="customCheckMD22">
                                                <label class="custom-control-label" for="customCheckMD22">Male</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input gender" value="FEMALE" id="customCheckMD23">
                                                <label class="custom-control-label" for="customCheckMD23">Female</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input gender" value="OTHER" id="customCheckMD24">
                                                <label class="custom-control-label" for="customCheckMD24">Others</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cl_carrer_lever">
                                <div id="accordion" class="accordion">
                                    <div class="link mb10">Qualification<i class="fa fa-caret-up"></i></div>
                                    <div class="cl_submenu">
                                        <div class="ui_kit_checkbox">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck31">
                                                <label class="custom-control-label" for="customCheck31">Certificate</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck32">
                                                <label class="custom-control-label" for="customCheck32">Diploma</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck33">
                                                <label class="custom-control-label" for="customCheck33">Associate</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck34">
                                                <label class="custom-control-label" for="customCheck34">Degree Bachelor</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck35">
                                                <label class="custom-control-label" for="customCheck35">Associate</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck36">
                                                <label class="custom-control-label" for="customCheck36">Master's Degree</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tag_container" style="width:100%;">
                    @include('searches.searchCandidates')
                </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</section>
@endsection
@section('myJs')
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('change keyup blur','.search-keyword,.industry,.position,.skill,.search-location,.gender', function () {
            dataList('{{ route('candidateListView') }}');
        });

        $(document).on('change','#sort', function () {
            dataList('{{ route('candidateListView') }}');
        });
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

    $(document).on('click', '.position', function () {
        if ($('.position').is(':checked') == true) {
            $('.position').prop('checked', false);
            $(this).prop('checked', true);
        }
    });

    $(document).on('click', '.skill', function () {
        if ($('.skill').is(':checked') == true) {
            $('.skill').prop('checked', false);
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
            'location': $('.search-location').val(),
            'sort': $('#sort').val(),
            'industry': $('.industry:checkbox:checked').val(),
            'position': $('.position:checkbox:checked').val(),
            'skill': $('.skill:checkbox:checked').val(),
            'gender': $('.gender:checkbox:checked').val()
        };
        //alert($('#sort').val());
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
                    url: "{{route('autocompleteCandidate')}}",
                    data: {
                        term : request.term
                    },
                    dataType: "json",
                    success: function(data){
                        var resp = $.map(data,function(obj){
                            //console.log(obj.city_name);
                            return obj.name;
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