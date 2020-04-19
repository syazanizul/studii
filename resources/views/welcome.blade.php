@extends('layouts.app')

@section('link-in-head')

@endsection

<style>
    @section('style')
        @import url('https://fonts.googleapis.com/css?family=Lobster+Two&display=swap');

    /*Pictocat Title At Top Of Page*/
    .text-below	{
        font-family:'Dosis', serif;
        font-weight:bold;
        font-size:30px;
        margin-bottom:15px;
        padding:0 0.3em;
        }

    .clip-text {
        font-family: 'Dosis', sans-serif;
        font-size: 65px;
        font-weight: bold;
        position: relative;
        display: inline-block;
        margin: .25em .25em 0.1em .25em;
        padding: .35em .75em;
        text-align: center;
        color: #f7f8f9;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        -moz-background-clip: text;
        -moz-text-fill-color: transparent;
        -ms-background-clip: text;
        -ms-text-fill-color: transparent;
        background-clip: text;
        text-fill-color: transparent;
    }

    .clip-text:before,
    .clip-text:after {
        position: absolute;
        content: '';
    }

    .clip-text:before {
        z-index: -2;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-image: inherit;
        background-size: cover;
        -webkit-animation:anim 20s infinite ease-in;
        -moz-animation:anim 20s infinite ease-in;
        -ms-animation:anim 20s infinite ease-in;
        animation:anim 20s infinite ease-in;
    }

    .clip-text:after {
        position: absolute;
        z-index: -1;
        top: .125em;
        right: .125em;
        bottom: .125em;
        left: .125em;
        background-color: #f7f8f9;
    }

    .clip-text {
        background-image:url(images/assets/patterns2.jpg);
        background-size: cover;
        -webkit-animation:anim 20s infinite linear;
        -moz-animation:anim 20s infinite ease-in;
        -ms-animation:anim 20s infinite ease-in;
        animation:anim 20s infinite ease-in;
    }
    /*End Pictocat Top Title*/

    /*What do you wish to study?*/
    .text-wish {
        font-family: 'Lobster Two', cursive;
        margin: 3% auto 2.5% 2%;
        font-size:60px;
        line-height:normal;
        color:#f9f9f9;
    }
    /*End What do you wish to study*/

    /*Jumbotron for quick browsing*/
    .row-jumbo .jumbotron {
        padding:2em 2.5em 1em 2.5em;
    }

    #quick-browse   {
        width:90%;
    }

    .heading-text {
        font-family:'Quicksand', sans-serif;
        font-size:29px;
    }

    #quick-browse select {
        min-width:40%;
        margin-left:1.2em;
        margin-top:0.4em;
    }

    #quick-browse button {
       margin:0;
    }
    /*End Jumbotron for quick browsing*/

    /*Jumbotron for detailed browsing*/
    .text-number-question {
        font-size:1.2em;
    }

    .tags-property {
        font-size:1.4em;
        margin-bottom:0.2em;
    }
    /*End Jumbotron for detailed browsing*/

    /*Toggle Button*/
    /* The switch - the box around the slider */
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    /* Hide default HTML checkbox */
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
    /*End Toggle Button*/

    /* Section 1 */

    #section-1 img  {
        width: 60%;
    }

    /* End Section 1*/

    /* Accordion */

    .btn-link:hover  {
        cursor: pointer;
    }

    .accordion .card {
        border-color: #1B998B;
        background-color: #AFD0D6;
    }

    .accordion .card-header {
        background-color: #1B998B;
        width: 100%;
    }

    .accordion .card-header p {
        font-size: 1.7em;
        line-height: normal;
        overflow-wrap: break-word;
    }

    .accordion .collapse {
        background-color: #AFD0D6;
    }

    .card-body p    {
        font-size:1.5em;
        line-height: normal;
    }

    /* End Accordion */

    /*Animation and media content*/
    @-webkit-keyframes anim
    {0%{background-position: top;}50%{background-position: bottom;}100%{background-position: top;}}

    @media only screen and (max-width: 1250px) {
        .heading-text {
            font-size:26px;
        }

        #quick-browse select {
            min-width:30%;
        }
    }

    @media only screen and (max-width: 1000px) {
        .text-wish {
            font-size:53px;
        }

        #quick-browse {
            width:100%;
        }

        .heading-text {
            font-size:23px;
        }

        #quick-browse select {
            margin-left:0.3em;
        }

        #quick-browse button {
            float:none;
        }

        .text-number-question {
            font-size:1.1em;

        }

        #section-1 img  {
            width: 80%;
        }
    }

    @media only screen and (max-width: 780px) {
        .row-jumbo .jumbotron {
            padding:1em 1.5em 1em 1.5em;
        }

        .text-wish {
            font-size:45px;
            margin-bottom:0.3em;
        }
        .clip-text {
            font-size:50px;
        }
        .text-below	{
            font-size:27px;
        }

        .heading-text {
            margin-bottom:0.2em;
        }

        #quick-browse select {
            min-width:70%;
            margin-left: 0;
        }

        .text-number-question {
            font-size:1em;
            margin-right:-8px;
        }

        #heading-text2 {
            margin-top:-10px;
            margin-bottom:10px;
        }

        .tags-property {
            font-size:1.3em;
            margin-left:-10px;
        }

        #section-1 img  {
            width: 95%;
        }
    }

    @media only screen and (max-width: 590px) {
        .clip-text {
            font-size:43px;
        }
        .text-below	{
            font-size:24px;
        }

        #quick-browse select {
            min-width:60%;
        }

        .tags-property {
            margin-left:-35px;
        }

    }
    /*End Animation and media content*/

    @endsection
</style>

@section('content')
    <section style="margin:-25px auto">
        <div class="row" style="margin:20px auto 10px auto; display:block;">
            <div align="center" data-step="1"  data-intro="Welcome to Studii! This platform is very simple to use. First, in this page you will tell the system what type of questions do you want">
                <div class="clip-text">studii.my</div>
                <div class="text-below">Center of exercise questions for your daily study needs</div>
                <hr style="border-top:5px solid;border-radius: 15px; width:90%; margin-bottom:8px;">
            </div>
        </div>
    </section>

    <section class="main-content" style="margin:3em 0 0 0; background-image:url(images/assets/sky.jpg) ">
            <div class="container" style="padding:0;">
                <div class="row row-jumbo">
                    <div class="col-sm-12">
                        <p class="text-wish">What do you wish to study today?</p>
                        <div class="jumbotron" data-step="2" data-intro="If you're not actually looking for any specific questions, you can just quick browse on any subjects.
                             This will fetch random questions from the database."
                             data-toggle="tooltip" title="If you're not looking for specific chapters, use this">
                            <form method="get" action="/redirect/quick">
                                <div class="row">
                                    <div id="quick-browse">
                                        <label class="heading-text heading-text d-inline-block">Quick browse on subject : </label>
                                        <select name="subject" class="form-control d-inline-block form-control-lg">
                                            @foreach ($property['subjects'] as $subject)
                                             <option value="{{$subject->id}}">{{$subject->name}}</option>
                                            @endforeach
                                        </select>
                                        <button class="btn btn-lg btn-primary d-inline-block float-right m-2" >Browse</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="jumbotron" data-step="3" data-intro="If you want something specific, for example, chapter 10 of Add Math, with difficulty hard (4). You can
                            use this panel."
                             data-toggle="tooltip" title="If want to specify your search, use this">
                            <form method="get" action="/redirect/detailed">
                                <div id="detailed-browse">
                                    <div class="col-sm-12">
                                        <p class="text-right text-number-question" id="text_count" data-step="4"
                                           data-intro="When you're making your selection, this text will tell you how many questions from your selection we have in our
                                            library. The more questions there is, the more practice you can have."
                                        >Please choose your selection.</p>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-3" style="margin:0em -10px auto -10px">
                                            <p class="heading-text" id="heading-text2">Or select exactly what you need</p>
                                        </div>
                                        <form>
                                            <div class="col-lg-6">
                                                <div class="p-1 ml-4">
                                                    <div class="mb-3">
                                                        <div class="d-inline-block" style="width:25%;">
                                                            <label class="tags-property">Exam :</label>
                                                        </div>
                                                        <div class="d-inline-block" style="width:70%;">
                                                            <select name="s_exam" id="s_select" class="form-control form-control-lg" style="width:100%;">
                                                                <option value="1" checked>SPM</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="d-inline-block" style="width:25%;">
                                                            <label class="tags-property">Subject :</label>
                                                        </div>
                                                        <div class="d-inline-block" style="width:70%;">
                                                            <select name="s_subject" id="s_subject" class="form-control form-control-lg" style="width:100%;" onchange="fetch_subject_level_change_chapter(); count()">
                                                                <option value="-">Select Subject</option>
                                                                @foreach ($property['subjects'] as $subject)
                                                                    <option value="{{$subject -> id}}">{{  $subject -> name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="d-inline-block" style="width:25%;">
                                                            <label class="tags-property">Level :</label>
                                                        </div>
                                                        <div class="d-inline-block" style="width:70%;">
                                                            <select name="s_level" id="s_level" class="form-control form-control-lg" style="width:100%;" onchange="fetch_subject_level_change_chapter(); count()">
                                                                <option value="0">All Level</option>
                                                                @foreach ($property['levels'] as $level)
                                                                    <option value="{{$level -> id}}">{{  $level -> name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="d-inline-block" style="width:25%;">
                                                            <label class="tags-property">Chapter :</label>
                                                        </div>
                                                        <div class="d-inline-block" style="width:70%;">
                                                            <select name="s_chapter" id="s_chapter" class="form-control form-control-lg" style="width:100%;" onchange="fetch_chapter_change_subtopic(); count()">
                                                                <option value="0">All Chapters</option>
                                                                <option value="0">Pick Subject and Level first</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="d-inline-block" style="width:25%;">
                                                            <label class="tags-property">Subtopic :</label>
                                                        </div>
                                                        <div class="d-inline-block" style="width:70%;">
                                                            <select name="s_subtopic" id="s_subtopic" class="form-control form-control-lg" style="width:100%;" onchange="count()">
                                                                <option value="0">All Subtopics</option>
                                                                <option value="0">Pick Chapters</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <p class="text-number-question">Optional filters</p>
                                                <div class="mt-1 mb-2">
                                                    <select name="s_source" id="s_source" class="form-control" style="width:95%" onchange="count()">
                                                        <option value="0">All Sources</option>
                                                        @foreach ($property['sources'] as $source)
                                                            <option value="{{$source -> id}}">{{  $source -> name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mt-1 mb-2">
                                                    <select name="s_paper" id="s_paper" class="form-control" style="width:95%" onchange="count()">
                                                        <option value="0">All Paper</option>
                                                        <option value="1">Paper 1</option>
                                                        <option value="2">Paper 2</option>
                                                    </select>
                                                </div>
                                                <div class="mt-1 mb-2">
                                                    <input name="s_year" id="s_year" type="number" class="form-control" placeholder="All Year" max="2019" min="2010" style="width:90%;" onchange="count()">
                                                </div>
                                                <div class="mt-1 mb-2">
                                                    <select name="s_difficulty" id="s_difficulty" class="form-control" style="width:95%" onchange="count()">
                                                        <option value="0">All Difficulty</option>
                                                        <option value="1">Easy (1)</option>
                                                        <option value="2">Fair (2)</option>
                                                        <option value="3">Moderate (3)</option>
                                                        <option value="4">Hard (4)</option>
                                                        <option value="5">Harder (5)</option>
                                                    </select>
                                                </div>
                                                <div class="mt-1 mb-2">
                                                    <div class="row" style="border:2px solid grey; border-radius: 20px">
                                                        <div class="col-lg-6">
                                                            <p class=" m-1">Randomize the order?</p>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="switch m-2">
                                                                <input type="checkbox" name="random-order" value="1">
                                                                <span class="slider round"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-lg btn-primary mt-4 m-2 float-ri ght" id="button_detail" data-step="5" data-intro="Click here when you are ready
                                                to practice. That's it. We hope you like it :)" disabled>Browse</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <button onclick="introJs().setOption('showProgress', true).start();" class="btn btn-primary btn-lg m-3 mb-5 float-right" style="font-size:1.5em"
                                data-toggle="tooltip" title="Click me if you don't know what to do">Help me</button>
                    </div>
                </div>
            </div>
    </section>

    <section id="section-1" class="py-5" style="background-color: white">
        <div class="container my-5">
            <div class="row">
                <div class="col-lg-8">
                    <img src="{{asset('images/assets/logo.png')}}" style="display: block; margin: auto">
                    <p style="font-size:1.7em; text-align:  center;">A platform made to achieve these 2 goals - <br/>
                        To make exercise questions <b>abundant</b> and <b>free</b>.</p>
                </div>
                <div class="col-lg-4">
                    <div style="vertical-align: middle; text-align: center">
                        <p style="font-size:1.5em;">Read why practice should be this way:</p>
{{--                        <a href="" class="btn btn-lg btn-primary btn-block m-3">Abundant Practice</a>--}}
{{--                        <a href="" class="btn btn-lg btn-primary btn-block m-3">Free Practice</a>--}}
                        <a class="btn btn-lg btn-primary btn-block m-3">Abundant Practice</a>
                        <a class="btn btn-lg btn-primary btn-block m-3">Free Practice</a>
                        <p>Links under development</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="section-2" class="py-5" style="background-color: white">
        <div class="container my-5">
            <div class="row">
                <div class="col-lg-12">
                    <p style="font-size:4em; text-align:  center;"><b>How Stud<span style="color:green">ii</span> Is Run?</b></p>
                    <p style="font-size:1.7em; text-align:  center;">We are not an expensive startup. <b>Studii</b> is just a self-funded
                    side project by a group of university students who work on this in our free time.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="faq" class="py-5" style="background-color: #2E294E; color: #2E294E">
        <div class="container my-5">
            <div class="row">
                <div class="col-lg-12">
                    <p style="font-size:4em;  color:#AFD0D6"><b>Frequently Asked Questions - FAQ</b></p>
                    <div class="accordion" id="accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <a class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <p class="mb-0">
                                        <b>Is this really free?</b>
                                    </p>
                                </a>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <p>We hate it when people lie to us too. So when we say Studii is free, its really free.
                                        <br>In fact, it is part of our mission, which is to make practice abundant and free.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <a class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    <p class="mb-0">
                                        <b>How can Studii provides the question for free?</b>
                                    </p>
                                </a>
                            </div>

                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    <p>Everytime you attempt a question here, we will pay the contributors who own the question you just attempted. So how
                                    do we pay them if we provide this service for free?</p><br>
                                    <p>The quick answer is <b>advertising</b>. We don't like students to pay for your practice, so we let the advertisers to pay them for you.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <a class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                    <p class="mb-0">
                                        <b>Where do the questions come from?</b>
                                    </p>
                                </a>
                            </div>

                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">
                                    <p>The questions come from any school teachers who wish to contribute. The teachers can submit their questions, in which
                                    then will be verified by us, before we serve them for students.</p><br>
                                    <p>This way, more teachers can contribute to verified contents to the library.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="section-2" class="py-5" style="background-color: white">
        <div class="container my-5">
            <div class="row">
                <div class="col-md-8">
                    <h1 style="font-size:4em">Shout out to teachers!</h1>
                    <p style="font-size:1.5em">If you are a SPM teacher, you can help us to grow. Click the button on the right to know more.</p>
                </div>
                <div class="col-md-4">
                    <a href="\about\teacher\join-us" class="btn btn-lg btn-primary btn-block mt-5">Teachers, Click Here</a>
                </div>
            </div>
        </div>
    </section>



{{--    <section style="background-color: white">--}}
{{--        <div class="container py-5">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-3">--}}
{{--                    <a href="#" class="btn btn-lg btn-primary btn-block mt-3 mb-5">Join The Team</a>--}}
{{--                </div>--}}
{{--                <div class="col-lg-1"></div>--}}
{{--                <div class="col-lg-8">--}}
{{--                    <h1 style="font-size:4em">Calling for the enthusiasts!</h1>--}}
{{--                    <p style="font-size:1.5em">We really value people who are willing to work hard for the benefit of others. If you do, we want you to be apart of our team</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

@endsection

@section('modal')

@endsection

<script>
    @section('script')
    //-----------------------------------------------------------
    //For all the ajax
    let input;
    let output;
    let table;
    let column;

    function fetch(input , output, table , column)
    {
        //First Ajax
        $.ajax({
            type: 'get',
            url: 'ajax/fetch',
            data: {
                input: input,
                table: table,
                column: column
            },
            success: function (response) {
                if (response !== '<option value="0">All</option>') {
                    document.getElementById(output).innerHTML = response;
                    //console.log(response);
                }   else {
                    //console.log('yes');
                    document.getElementById(output).innerHTML = '<option value="0">No Data</option>';
                }
            }
        });
    }

    function fetch_subject_change_chapter()
    {
        //First Ajax
        $.ajax({
            type: 'get',
            url: 'ajax/fetch_subject_change_chapter',
            data: {
                subject: document.getElementById('s_subject').value,
            },
            success: function (response) {
                if (response !== '<option value="0">All</option>') {
                    document.getElementById('s_chapter').innerHTML = response;
                    //console.log(response);
                }   else {
                    //console.log('yes');
                    document.getElementById('s_chapter').innerHTML = '<option value="0">No Data</option>';
                }
            }
        });
    }

    function fetch_subject_level_change_chapter()
    {
        //First Ajax
        $.ajax({
            type: 'get',
            url: 'ajax/fetch_subject_level_change_chapter',
            data: {
                type:1,
                subject: document.getElementById('s_subject').value,
                level: document.getElementById('s_level').value
            },
            success: function (response) {
                if (response !== '') {
                    document.getElementById('s_chapter').innerHTML = response;
                }   else {
                    document.getElementById('s_chapter').innerHTML = '<option value="0">No Data</option>';
                }
            }
        });
    }

    function fetch_chapter_change_subtopic()
    {
        $.ajax({
            type: 'get',
            url: '../ajax/fetch_chapter_change_subtopic',
            data: {
                type:1,
                chapter: document.getElementById('s_chapter').value,
            },
            success: function (response) {
                if (response !== '') {
                    document.getElementById('s_subtopic').innerHTML = response;
                }   else {
                    document.getElementById('s_subtopic').innerHTML = '<option value="0">No Subtopic</option>';
                }
            }
        });
    }

    function count() {
        //Second Ajax
        $.ajax({
            type: 'get',
            url: 'ajax/count',
            data: {
                subject: document.getElementById('s_subject').value,
                level: document.getElementById('s_level').value,
                chapter: document.getElementById('s_chapter').value,
                subtopic: document.getElementById('s_subtopic').value,
                source: document.getElementById('s_source').value,
                paper: document.getElementById('s_paper').value,
                year: document.getElementById('s_year').value,
                difficulty: document.getElementById('s_difficulty').value
            },
            success: function (response) {
                document.getElementById('text_count').innerHTML = 'Number of questions that specify your search : <b>' + response + '</b>';

                if (response === '0') {
                    document.getElementById('button_detail').disabled = true;
                }   else {
                    document.getElementById('button_detail').disabled = false;
                }
            }
        });
    }

    //document.getElementById('s_subject').onchange = fetch(document.getElementById('s_subject').value , 's_chapter' , 'chapters_list' , 'subject');

    @endsection
</script>
