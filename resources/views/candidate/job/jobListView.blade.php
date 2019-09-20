@extends('candidate.layouts.master')
@section('content')
    <section class="our-faq bgc-fa mt50">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-xl-3 dn-smd">
                    <div class="faq_search_widget mb30">
                        <h4 class="fz20 mb15">Search Keywords</h4>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="e.g. web design" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><span class="flaticon-search"></span></button>
                            </div>
                        </div>
                    </div>
                    <div class="faq_search_widget mb30">
                        <h4 class="fz20 mb15">Location</h4>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="All Location" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon3"><span class="flaticon-location-pin"></span></button>
                            </div>
                        </div>
                    </div>
                    <div class="faq_search_widget mb30">
                        <h4 class="fz20 mb15">Category</h4>
                        <div class="candidate_revew_select">
                            <select class="selectpicker w100 show-tick">
                                <option>All Categories</option>
                                <option>Recent</option>
                                <option>Old Review</option>
                            </select>
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
                    </div>
                    <div class="cl_latest_activity mb30">
                        <h4 class="fz20 mb15">Job Type</h4>
                        <div class="ui_kit_whitchbox">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                <label class="custom-control-label" for="customSwitch1">Freelance</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch2">
                                <label class="custom-control-label" for="customSwitch2">Full Time</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch3">
                                <label class="custom-control-label" for="customSwitch3">Part Time</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch4">
                                <label class="custom-control-label" for="customSwitch4">Internship</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch5">
                                <label class="custom-control-label" for="customSwitch5">Temporary</label>
                            </div>
                        </div>
                    </div>
                    <div class="cl_pricing_slider mb30">
                        <h4 class="fz20 mb20">Hourly Rate</h4>
                        <div id="slider-range"></div>
                        <p class="text-center">
                            <input class="sl_input" type="text" id="amount">
                        </p>
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
                        <div id="accordion2" class="accordion">
                            <div class="link mb10">Experince<i class="fa fa-caret-up"></i></div>
                            <div class="cl_submenu">
                                <div class="ui_kit_checkbox">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck18">
                                        <label class="custom-control-label" for="customCheck18">1Year to 2Year</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck19">
                                        <label class="custom-control-label" for="customCheck19">2Year to 3Year</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck20">
                                        <label class="custom-control-label" for="customCheck20">3Year to 4Year</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck21">
                                        <label class="custom-control-label" for="customCheck21">4Year to 5Year</label>
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
                                        <input type="checkbox" class="custom-control-input" id="customCheck22">
                                        <label class="custom-control-label" for="customCheck22">Male</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck23">
                                        <label class="custom-control-label" for="customCheck23">Female</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck24">
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
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck25">
                                        <label class="custom-control-label" for="customCheck25">Development</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck26">
                                        <label class="custom-control-label" for="customCheck26">Management</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck27">
                                        <label class="custom-control-label" for="customCheck27">Finance</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck28">
                                        <label class="custom-control-label" for="customCheck28">HTML Department</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck29">
                                        <label class="custom-control-label" for="customCheck29">Seo</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck30">
                                        <label class="custom-control-label" for="customCheck30">Banking</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cl_carrer_lever">
                        <div id="accordion5" class="accordion">
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
                <div class="col-md-12 col-lg-9 col-xl-9">
                    <div class="row">
                        <div class="col-lg-12 mb30">
                            <h4 class="fz20 mb15">Your Selected</h4>
                            <div class="tags-bar">
                                <span>Design<i class="close-tag">x</i></span>
                                <span>UX/UI<i class="close-tag">x</i></span>
                                <div class="action-tags">
                                    <a href="#"><i class="fa fa-trash-o"></i> Clean All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="candidate_job_alart_btn">
                                <h4 class="fz20 mb15">20 Candidates Found</h4>
                                <a class="btn btn-thm" href="#"><span class="flaticon-mail"></span> Get Job Alerts</a>
                                <button class="btn btn-thm btns dn db-991 float-right">Show Filter</button>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="candidate_revew_select text-right mt50 mt10-smd">
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
                            <div class="content_details">
                                <div class="details">
                                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><span>Hide Filter</span><i>×</i></a>
                                    <div class="faq_search_widget mb30">
                                        <h4 class="fz20 mb15">Search Keywords</h4>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Find Your Question" aria-label="Recipient's username" aria-describedby="button-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" id="button-addon4"><span class="flaticon-search"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="faq_search_widget mb30">
                                        <h4 class="fz20 mb15">Location</h4>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Find Your Question" aria-label="Recipient's username" aria-describedby="button-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" id="button-addon5"><span class="flaticon-location-pin"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="faq_search_widget mb30">
                                        <h4 class="fz20 mb15">Category</h4>
                                        <div class="candidate_revew_select">
                                            <select class="selectpicker w100 show-tick">
                                                <option>All Categories</option>
                                                <option>Recent</option>
                                                <option>Old Review</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="cl_latest_activity mb30">
                                        <h4 class="fz20 mb15">Date Posted</h4>
                                        <div class="ui_kit_radiobox">
                                            <div class="radio">
                                                <input id="radio_six" name="radio" type="radio" checked="">
                                                <label for="radio_six"><span class="radio-label"></span> Last Hour</label>
                                            </div>
                                            <div class="radio">
                                                <input id="radio_seven" name="radio" type="radio">
                                                <label for="radio_seven"><span class="radio-label"></span> Last 24 hours</label>
                                            </div>
                                            <div class="radio">
                                                <input id="radio_eight" name="radio" type="radio">
                                                <label for="radio_eight"><span class="radio-label"></span> Last 7 days</label>
                                            </div>
                                            <div class="radio">
                                                <input id="radio_nine" name="radio" type="radio">
                                                <label for="radio_nine"><span class="radio-label"></span> Last 14 days</label>
                                            </div>
                                            <div class="radio">
                                                <input id="radio_ten" name="radio" type="radio">
                                                <label for="radio_ten"><span class="radio-label"></span> Last 30 days</label>
                                            </div>
                                            <a class="text-thm2 pl30" href="#">View All <span class="flaticon-right-arrow pl10"></span></a>
                                        </div>
                                    </div>
                                    <div class="cl_latest_activity mb30">
                                        <h4 class="fz20 mb15">Job Type</h4>
                                        <div class="ui_kit_whitchbox">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch6">
                                                <label class="custom-control-label" for="customSwitch6">Freelance</label>
                                            </div>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch7">
                                                <label class="custom-control-label" for="customSwitch7">Full Time</label>
                                            </div>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch8">
                                                <label class="custom-control-label" for="customSwitch8">Part Time</label>
                                            </div>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch9">
                                                <label class="custom-control-label" for="customSwitch9">Internship</label>
                                            </div>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch10">
                                                <label class="custom-control-label" for="customSwitch10">Temporary</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cl_pricing_slider mb30">
                                        <h4 class="fz20 mb20">Hourly Rate</h4>
                                        <div id="slider-range2"></div>
                                        <p class="text-center">
                                            <input class="sl_input" type="text" id="amount2">
                                        </p>
                                    </div>
                                    <div class="cl_skill_checkbox mb30">
                                        <h4 class="fz20 mb20">Skills</h4>
                                        <div class="content ui_kit_checkbox text-left">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck37">
                                                <label class="custom-control-label" for="customCheck37">HTML 5</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck38">
                                                <label class="custom-control-label" for="customCheck38">Javascript</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck39">
                                                <label class="custom-control-label" for="customCheck39">PHP</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck40">
                                                <label class="custom-control-label" for="customCheck40">jQuery</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck41">
                                                <label class="custom-control-label" for="customCheck41">UX/UI Design</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck42">
                                                <label class="custom-control-label" for="customCheck42">Design</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck43">
                                                <label class="custom-control-label" for="customCheck43">Web Design</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck44">
                                                <label class="custom-control-label" for="customCheck44">Graphic Design</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck45">
                                                <label class="custom-control-label" for="customCheck45">Sketch App</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck46">
                                                <label class="custom-control-label" for="customCheck46">UI Design</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck47">
                                                <label class="custom-control-label" for="customCheck47">Graphic Design</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck48">
                                                <label class="custom-control-label" for="customCheck48">Sketch App</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck49">
                                                <label class="custom-control-label" for="customCheck49">UI Design</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cl_carrer_lever mb30">
                                        <div id="accordion6" class="accordion">
                                            <div class="link mb10">Career Level<i class="fa fa-caret-up"></i></div>
                                            <div class="cl_submenu">
                                                <div class="ui_kit_checkbox">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck50">
                                                        <label class="custom-control-label" for="customCheck50">Intermediate</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck51">
                                                        <label class="custom-control-label" for="customCheck51">Normal</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck52">
                                                        <label class="custom-control-label" for="customCheck52">Special</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck53">
                                                        <label class="custom-control-label" for="customCheck53">Experienced</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cl_carrer_lever mb30">
                                        <div id="accordion7" class="accordion">
                                            <div class="link mb10">Experince<i class="fa fa-caret-up"></i></div>
                                            <div class="cl_submenu">
                                                <div class="ui_kit_checkbox">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck54">
                                                        <label class="custom-control-label" for="customCheck54">1Year to 2Year</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck55">
                                                        <label class="custom-control-label" for="customCheck55">2Year to 3Year</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck56">
                                                        <label class="custom-control-label" for="customCheck56">3Year to 4Year</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck57">
                                                        <label class="custom-control-label" for="customCheck57">4Year to 5Year</label>
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
                                                        <input type="checkbox" class="custom-control-input" id="customCheck58">
                                                        <label class="custom-control-label" for="customCheck58">Male</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck59">
                                                        <label class="custom-control-label" for="customCheck59">Female</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck60">
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
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck61">
                                                        <label class="custom-control-label" for="customCheck61">Development</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck62">
                                                        <label class="custom-control-label" for="customCheck62">Management</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck63">
                                                        <label class="custom-control-label" for="customCheck63">Finance</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck64">
                                                        <label class="custom-control-label" for="customCheck64">HTML Department</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck65">
                                                        <label class="custom-control-label" for="customCheck65">Seo</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck66">
                                                        <label class="custom-control-label" for="customCheck66">Banking</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cl_carrer_lever">
                                        <div id="accordion10" class="accordion">
                                            <div class="link mb10">Qualification<i class="fa fa-caret-up"></i></div>
                                            <div class="cl_submenu">
                                                <div class="ui_kit_checkbox">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck67">
                                                        <label class="custom-control-label" for="customCheck67">Certificate</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck68">
                                                        <label class="custom-control-label" for="customCheck68">Diploma</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck69">
                                                        <label class="custom-control-label" for="customCheck69">Associate</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck70">
                                                        <label class="custom-control-label" for="customCheck70">Degree Bachelor</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck71">
                                                        <label class="custom-control-label" for="customCheck71">Associate</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck72">
                                                        <label class="custom-control-label" for="customCheck72">Master's Degree</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach($jobs as $job)
                        @php
                            $jobTpe = \App\JobType::where('id',$job->job_type)->first();
                            $city = \App\City::where('id',$job->city_id)->first();
                            $country = \App\Country::where('id',$job->country_id)->first();
                            $currency = \App\Currency::where('id',$job->currency)->first();
                            $company = \App\CompanyGeneralInfo::where('user_id',$job->company)->first();
                        @endphp
                        <div class="col-lg-12">
                            <div class="fj_post style2">
                                <div class="details">
                                    <h5 class="job_chedule text-thm mt0">{{ $jobTpe->title }}</h5>
                                    <div class="thumb fn-smd">
                                        <a href="{{ route('singleJobView',[$job->id]) }}" target="_blank"><img class="img-fluid" src="{{ asset($company->company_banner) }}" alt="1.jpg"></a>
                                    </div>
                                    <a href="{{ route('singleJobView',[$job->id]) }}" target="_blank"><h4>{{ $job->title }}</h4></a>
                                    <p>Posted : {{ date_format(new DateTime($job->created_at),'d M, Y') }} by <a class="text-thm" target="_blank" href="{{ route('companyProfileView',[$job->company]) }}">{{ $company->company_name }}</a></p>
                                    <ul class="featurej_post">
                                        <li class="list-inline-item"><span class="flaticon-location-pin"></span> {{ $city->name }}, {{ $country->name }}</li>
                                        @if($job->is_negotiable == 1)
                                            <li class="list-inline-item"><span class="flaticon-price pl20"></span> Negotiable</li>
                                        @else
                                            <li class="list-inline-item"><span class="flaticon-price pl20"></span> {{ $job->min_salary/1000 .'k' }} {{ $currency->code }} - {{ $job->max_salary/1000 .'k' }} {{ $currency->code }}</li>
                                        @endif
                                    </ul>
                                </div>
                                <a class="favorit" href="#"><span class="flaticon-favorites"></span></a>
                            </div>
                        </div>
                        @endforeach
{{--                        <div class="col-lg-12">--}}
{{--                            <div class="mbp_pagination">--}}
{{--                                <ul class="page_navigation">--}}
{{--                                    <li class="page-item disabled">--}}
{{--                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true"> <span class="flaticon-left-arrow"></span> Previous</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                                    <li class="page-item active" aria-current="page">--}}
{{--                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>--}}
{{--                                    </li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">4</a></li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">5</a></li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">...</a></li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">45</a></li>--}}
{{--                                    <li class="page-item">--}}
{{--                                        <a class="page-link" href="#">Next <span class="flaticon-right-arrow"></span></a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div style="margin-left: 40%;">
                        {{ $jobs->links("pagination::bootstrap-4") }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection