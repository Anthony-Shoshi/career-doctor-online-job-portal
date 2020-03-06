<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>

    <title>Jonathan Doe | Web Designer, Director | name@yourdomain.com</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <meta name="keywords" content="" />
    <meta name="description" content="" />

    <link rel="stylesheet" type="text/css" href="{{ asset('css/reset-fonts-grids.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/resume.css') }}" media="all" />

</head>
<body>
@php
    $userName = \App\User::where('id', $candidateGeneralInfo->user_id)->first()->name;

@endphp
<div id="doc2" class="yui-t7">
    <div id="inner">

        <div id="hd">
            <div class="yui-gc">
                <div class="yui-u first">
                    <img src="{{ asset($user->image) }}" alt="Alan Smith" />
                    <hr>
                    <h1>{{ $userName }}</h1>
                    <h2>{{ $candidateGeneralInfo->current_position }}</h2>
                </div>

                <div class="yui-u">
                    <div class="contact-info">
                        <h3>Email - {{ $candidateGeneralInfo->contact_email }}</h3>
                        <h3>Mobile - {{ $candidateGeneralInfo->contact_phone }}</h3>
                        <h3>Address - {{ $candidateGeneralInfo->current_address }}</h3>
                        <h3>Location - {{ $city->name }}, {{ $country->name }}</h3>
                    </div><!--// .contact-info -->
                </div>
            </div><!--// .yui-gc -->
        </div><!--// hd -->

        <div id="bd">
            <div id="yui-main">
                <div class="yui-b">

                    @if( $candidateGeneralInfo->short_description != '')
                    <div class="yui-gf">
                        <div class="yui-u first">
                            <h2>Profile</h2>
                        </div>
                        <div class="yui-u">
                            <p class="enlarge">
                                {{ $candidateGeneralInfo->short_description }}
                            </p>
                        </div>
                    </div><!--// .yui-gf -->
                    @endif

                    <div class="yui-gf">
                        <div class="yui-u first">
                            <h2>Skills</h2>
                        </div>
                        <div class="yui-u">
                            @foreach($skills as $skill)
                            <ul class="talent">
                                <li>{{ $skill->skill_name }}</li>
                            </ul>
                            @endforeach
                        </div>
                    </div><!--// .yui-gf-->

                    <div class="yui-gf">

                        <div class="yui-u first">
                            <h2>Experience</h2>
                        </div><!--// .yui-u -->
                        @foreach($candidateExperiences as $candidateExperience)
                        <div class="yui-u">

                            <div class="job">
                                <h2>{{ $candidateExperience->company_name }}</h2>
                                <h3>{{ $candidateExperience->position }}</h3>
                                <h4>{{ date('M d, Y', strtotime($candidateExperience->start_date)) }} - @if($candidateExperience->is_current == 1) Current @else {{ date('M d, Y', strtotime($candidateExperience->end_date)) }} @endif</h4>
                                @if( $candidateExperience->experience_summary != '')
                                    <p>{{ $candidateExperience->experience_summary }}</p>
                                @endif
                            </div>

                        </div><!--// .yui-u -->
                        @endforeach
                    </div><!--// .yui-gf -->


                    <div class="yui-gf last">
                        <div class="yui-u first">
                            <h2>Education</h2>
                        </div>
                        @foreach($candidateEducations as $candidateEducation)
                            @php
                                $degree = \App\EducationDegree::where('id', $candidateEducation->degree)->first();
                            @endphp
                        <div class="yui-u">
                            <h2>{{ $candidateEducation->institute_name }} - {{ $candidateEducation->location }}</h2>
                            <h3>{{ $candidateEducation->degree_title }} ({{ $degree->degree_name }} <strong>{{ $candidateEducation->grade }}</strong> </h3> <br>
                        </div>
                        @endforeach
                    </div><!--// .yui-gf -->

                        <div class="yui-gf">

                            <div class="yui-u first">
                                <h2>Extra-Curricular Activities</h2>
                            </div><!--// .yui-u -->
                            @foreach($candidateAchievements as $candidateAchievement)
                                <div class="yui-u">

                                    <div class="job">
                                        <h2>{{ $candidateAchievement->title }}</h2>
                                        <h3>{{ ucwords(strtolower($candidateAchievement->type)) }}</h3>
                                        <h4>{{ date('M d, Y', strtotime($candidateAchievement->date)) }}</h4>
                                        @if( $candidateAchievement->description != '')
                                            <p>{{ $candidateAchievement->description }}</p>
                                        @endif
                                    </div>

                                </div><!--// .yui-u -->
                            @endforeach
                        </div><!--// .yui-gf -->

                </div><!--// .yui-b -->
            </div><!--// yui-main -->
        </div><!--// bd -->

        <div id="ft">
            <p>{{ $userName }} &mdash; {{ $candidateGeneralInfo->contact_email }} &mdash; {{ $candidateGeneralInfo->contact_phone }}</p>
        </div><!--// footer -->

    </div><!-- // inner -->


</div><!--// doc -->

@if(Request::is('view/resume/print/*'))
    <script type="text/javascript">
        window.print();
        window.onfocus=function(){ window.close();}
    </script>
@endif
</body>
</html>

