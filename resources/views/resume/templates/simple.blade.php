<!DOCTYPE html>
<!-- saved from url=(0102)file:///C:/Users/Shoshi/Documents/BBIT%20Assignments%20and%20Slides/Project/Simple%20Resume/index.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>{{ $user->name }}</title>

    <meta name="viewport" content="width=device-width">
    <meta name="description" content="The Curriculum Vitae of Joe Bloggs.">


    <link type="text/css" rel="stylesheet" href="{{ asset('css/simpleCV.css') }}">
{{--    <link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700|Lato:400,300' rel='stylesheet' type='text/css'>--}}

    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

@php
    $userName = \App\User::where('id', $candidateGeneralInfo->user_id)->first()->name;

@endphp
<body id="top">
<div id="cv" class="instaFade">
    <div class="mainDetails">

        <div id="name">
            <h2 class="quickFade delayTwo">{{ $userName }}</h2>
            <h4 class="quickFade delayThree">{{ $candidateGeneralInfo->current_position }}</h4>
        </div>

        <div id="contactDetails" class="quickFade delayFour">
            <ul>
                <li>Email: {{ $candidateGeneralInfo->contact_email }}</li>
                <li>Mobile: {{ $candidateGeneralInfo->contact_phone }}</li>
                <li>Address: {{ $candidateGeneralInfo->current_address }}</li>
                <li>Location: {{ $city->name }}, {{ $country->name }}</li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>

    <div id="mainArea" class="quickFade delayFive">
        @if( $candidateGeneralInfo->short_description != '')
        <section>
            <article>
                <h4>Personal Profile</h4>
                <p>{{ $candidateGeneralInfo->short_description }}</p>
            </article>
            <div class="clear"></div>
        </section>
        @endif
        <section>
            <h4>Work Experience</h4>
            <br>
            @foreach($candidateExperiences as $candidateExperience)
            <article>
                <h5>{{ $candidateExperience->position }} at {{ $candidateExperience->company_name }}</h5>
                <p class="subDetails">{{ date('M d, Y', strtotime($candidateExperience->start_date)) }} - @if($candidateExperience->is_current == 1) Current @else {{ date('M d, Y', strtotime($candidateExperience->end_date)) }} @endif</p>
                @if( $candidateExperience->experience_summary != '')
                <p>{{ $candidateExperience->experience_summary }}</p>
                @endif
            </article>
            @endforeach
            <div class="clear"></div>
        </section>

        <section>
            <h4>Education</h4>
            <br>
            @foreach($candidateEducations as $candidateEducation)
                @php
                    $degree = \App\EducationDegree::where('id', $candidateEducation->degree)->first();
                @endphp
            <article>
                <h5>{{ $candidateEducation->institute_name }}</h5>
                <p class="subDetails">{{ $candidateEducation->degree_title }} ({{ $degree->degree_name }})</p>
                <ul style="list-style: none;">
                    <li><strong>Passing Year:</strong> @if($candidateEducation->is_running == 1) Running @else {{ $candidateEducation->passing_year }} @endif</li>
                    <li><strong>Grade:</strong> {{ $candidateEducation->grade }}</li>
                    <li><strong>Location:</strong> {{ $candidateEducation->location }}</li>
                </ul>
            </article>
                <br>
            @endforeach
            <div class="clear"></div>
        </section>

        <section>
            <h4>Extra-Curricular Activities</h4>
            <br>
            @foreach($candidateAchievements as $candidateAchievement)
                <article>
                    <h5>{{ $candidateAchievement->title }}</h5>
                    {{ ucwords(strtolower($candidateAchievement->type)) }}
                    <p class="subDetails">{{ date('M d, Y', strtotime($candidateAchievement->date)) }}</p>
                    @if( $candidateAchievement->description != '')
                        <p>{{ $candidateAchievement->description }}</p>
                    @endif
                </article>
            @endforeach
            <div class="clear"></div>
        </section>

        <section>
            <h4>Key Skills</h4>
            <br>
            @foreach($skills as $skill)
            <ul class="keySkills">
                <li>{{ $skill->skill_name }}</li>
            </ul>
            @endforeach
            <div class="clear"></div>
        </section>

    </div>
</div>
<script type="text/javascript">
    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
    document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script><script src="./Joe Bloggs - Curriculum Vitae_files/ga.js.download" type="text/javascript"></script>
<script type="text/javascript">
    var pageTracker = _gat._getTracker("UA-3753241-1");
    pageTracker._initData();
    pageTracker._trackPageview();
</script>
@if(Request::is('view/resume/print/*'))
    <script type="text/javascript">
        window.print();
        window.onfocus=function(){ window.close();}
    </script>
@endif
</body></html>