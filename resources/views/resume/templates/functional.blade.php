<!DOCTYPE html>
<html>
<head>
    <title>{{ $user->name }}</title>

    <meta name="viewport" content="width=device-width"/>
    <meta name="description" content="The Curriculum Vitae of Joe Bloggs."/>
    <meta charset="UTF-8">

    <link type="text/css" rel="stylesheet" href="{{ asset('css/functionalCV.css') }}">
    <link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700|Lato:400,300' rel='stylesheet' type='text/css'>

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
        <div id="headshot" class="quickFade">
            <img src="{{ asset($user->image) }}" alt="Alan Smith" />
        </div>

        <div id="name">
            <h1 class="quickFade delayTwo">{{ $userName }}</h1>
            <h2 class="quickFade delayThree">{{ $candidateGeneralInfo->current_position }}</h2>
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
                <div class="sectionTitle">
                    <h1>Personal Profile</h1>
                </div>

                <div class="sectionContent">
                    <p>{{ $candidateGeneralInfo->short_description }}</p>
                </div>
            </article>
            <div class="clear"></div>
        </section>
        @endif

        <section>
            <div class="sectionTitle">
                <h1>Work Experience</h1>
            </div>

            <div class="sectionContent">
                @foreach($candidateExperiences as $candidateExperience)
                <article>
                    <h2>{{ $candidateExperience->position }} at {{ $candidateExperience->company_name }}</h2>
                    <p class="subDetails">{{ date('M d, Y', strtotime($candidateExperience->start_date)) }} - @if($candidateExperience->is_current == 1) Current @else {{ date('M d, Y', strtotime($candidateExperience->end_date)) }} @endif</p>
                    @if( $candidateExperience->experience_summary != '')
                        <p>{{ $candidateExperience->experience_summary }}</p>
                    @endif
                </article>
                @endforeach
            </div>
            <div class="clear"></div>
        </section>


        <section>
            <div class="sectionTitle">
                <h1>Key Skills</h1>
            </div>

            <div class="sectionContent">
                @foreach($skills as $skill)
                <ul class="keySkills">
                    <li>{{ $skill->skill_name }}</li>
                </ul>
                @endforeach
            </div>
            <div class="clear"></div>
        </section>


        <section>
            <div class="sectionTitle">
                <h1>Education</h1>
            </div>

            <div class="sectionContent">
                @foreach($candidateEducations as $candidateEducation)
                    @php
                        $degree = \App\EducationDegree::where('id', $candidateEducation->degree)->first();
                    @endphp
                <article>
                    <h2>{{ $candidateEducation->institute_name }}</h2>
                    <p class="subDetails">{{ $candidateEducation->degree_title }} ({{ $degree->degree_name }})</p>
                    <ul style="list-style: none;">
                        <li><strong>Passing Year:</strong> @if($candidateEducation->is_running == 1) Running @else {{ $candidateEducation->passing_year }} @endif</li>
                        <li><strong>Grade:</strong> {{ $candidateEducation->grade }}</li>
                        <li><strong>Location:</strong> {{ $candidateEducation->location }}</li>
                    </ul>
                </article>
                    <br>
                @endforeach
            </div>
            <div class="clear"></div>
        </section>

            <section>
                <div class="sectionTitle">
                    <h1>Extra-Curricular Activities</h1>
                </div>

                <div class="sectionContent">
                    @foreach($candidateAchievements as $candidateAchievement)
                        <article>
                            <h2>{{ $candidateAchievement->title }}</h2>
                            {{ ucwords(strtolower($candidateAchievement->type)) }}
                            <p class="subDetails">{{ date('M d, Y', strtotime($candidateAchievement->date)) }}</p>
                            @if( $candidateAchievement->description != '')
                                <p>{{ $candidateAchievement->description }}</p>
                            @endif
                        </article>
                    @endforeach
                </div>
                <div class="clear"></div>
            </section>

    </div>
</div>
<script type="text/javascript">
    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
    document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
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
</body>
</html>