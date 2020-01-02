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
                                        <label name="subject" class="heading-text heading-text d-inline-block">Quick browse on subject : </label>
                                        <select name="subject" class="form-control d-inline-block form-control-lg">
                                            @foreach ($property['subjects'] as $subject)
                                             <option value="{{$subject->id}}">{{$subject->name}}</option>
                                            @endforeach
                                        </select>
                                        <button class="btn btn-lg btn-primary d-inline-block float-right m-2" >Search</button>
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
                                            library. For example, if you choose Add Math, chapter 10, year 2018, this text may show you 10. This means, there are
                                            10 questions that meet the requirement of Add Math, chapter 10, year 2018 in our library."
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
                                                            <select name="s_subject" id="s_subject" class="form-control form-control-lg" style="width:100%;" onchange="fetch(this.value , 's_chapter' , 'chapters_list' , 'subject'); count()">
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
                                                            <select name="s_level" id="s_level" class="form-control form-control-lg" style="width:100%;" onchange="fetch2(); count()">
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
                                                            <select name="s_chapter" id="s_chapter" class="form-control form-control-lg" style="width:100%;" onchange="count()">
                                                                <option value="0">All Chapters</option>
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
                                                <button class="btn btn-lg btn-primary mt-4 m-2 float-right" id="button_detail" data-step="5" data-intro="Click here when you are ready
                                                to practice. That's it. We hope you like it :)">Browse</button>
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
    <section style="background-color: #f8fafc">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    <h1 style="font-size:4em">Shout out to teachers!</h1>
                    <p style="font-size:1.5em">We work with teachers to gather the best exercise questions for our users. If you are a teacher, we want to collaborate with you</p>
                </div>
                <div class="col-lg-4">
                    <a href="\joinUs" class="btn btn-lg btn-primary btn-block mt-5">Teachers, Click Here</a>
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

    function fetch2()
    {
        //First Ajax
        $.ajax({
            type: 'get',
            url: 'ajax/fetch2',
            data: {
                subject: document.getElementById('s_subject').value,
                level: document.getElementById('s_level').value
            },
            success: function (response) {
                if (response !== '<option value="0">All</option>') {
                    document.getElementById('s_chapter').innerHTML = response;
                }   else {
                    document.getElementById(output).innerHTML = '<option value="0">No Data</option>';
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
