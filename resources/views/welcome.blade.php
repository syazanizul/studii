<!DOCTYPE html>
@extends('layouts.app')


@section('link-in-head')
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
@endsection

@section('content')
    <section id="section-main-jumbotron">
        <div class="row">
            <div align="center" data-step="1"  data-intro="Welcome to Studii! This platform is very simple to use. First, in this page you will tell the system what type of questions do you want">
                <div class="clip-text" aria-label="Studii - Main Logo">studii.my</div>
                <div class="text-below">Center of exercise questions for your daily study needs</div>
                <hr>
            </div>
        </div>
    </section>

    <section id="main-content" aria-label="Studii - Main Content And Main Image">
            <div class="container p-0">
                <div class="row row-jumbo">
                    <div class="col-sm-12">
                        <p class="text-wish almost-white">What do you wish to study today?</p>
                        <div class="jumbotron" data-step="2" data-intro="If you're not actually looking for any specific questions, you can just quick browse on any subjects.
                             This will fetch random questions from the database."
                             data-toggle="tooltip" title="If you're not looking for specific chapters, use this">
                            <form method="get" action="/redirect/quick">
                                <div class="row">
                                    <div id="quick-browse">
                                        <label class="heading-text heading-text d-inline-block">Quick browse on subject : </label>
                                        <select name="subject" class="form-control d-inline-block form-control-lg">
                                            @foreach ($property['subjects'] as $subject)
                                             <option value="{{$subject->id}}">{{  ucwords(strtolower($subject -> name)) }}</option>
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
                                        <div class="col-lg-3">
                                            <p class="heading-text" id="heading-text2">Or select exactly what you need</p>
                                        </div>
                                        <form>
                                            <div class="col-lg-6">
                                                <div class="p-1 ml-4">
                                                    <div class="mb-3">
                                                        <div class="d-inline-block w-25">
                                                            <label class="tags-property">Exam :</label>
                                                        </div>
                                                        <div class="d-inline-block width-70">
                                                            <select name="s_exam" id="s_select" class="form-control form-control-lg w-100">
                                                                <option value="1" checked>SPM</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="d-inline-block w-25">
                                                            <label class="tags-property">Subject :</label>
                                                        </div>
                                                        <div class="d-inline-block width-70">
                                                            <select name="s_subject" id="s_subject" class="form-control form-control-lg w-100" onchange="fetch_subject_level_change_chapter(); count()">
                                                                <option value="-">Select Subject</option>
                                                                @foreach ($property['subjects'] as $subject)
                                                                    <option value="{{$subject -> id}}">{{  ucwords(strtolower($subject -> name)) }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="d-inline-block w-25">
                                                            <label class="tags-property">Level :</label>
                                                        </div>
                                                        <div class="d-inline-block width-70">
                                                            <select name="s_level" id="s_level" class="form-control form-control-lg w-100" onchange="fetch_subject_level_change_chapter(); count()">
                                                                <option value="0">All Level</option>
                                                                @foreach ($property['levels'] as $level)
                                                                    <option value="{{$level -> id}}">{{  $level -> name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="d-inline-block w-25">
                                                            <label class="tags-property">Chapter :</label>
                                                        </div>
                                                        <div class="d-inline-block width-70">
                                                            <select name="s_chapter" id="s_chapter" class="form-control form-control-lg w-100" onchange="fetch_chapter_change_subtopic(); count()">
                                                                <option value="0">All Chapters</option>
                                                                <option value="0">Pick Subject and Level first</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="d-inline-block w-25">
                                                            <label class="tags-property">Subtopic :</label>
                                                        </div>
                                                        <div class="d-inline-block width-70">
                                                            <select name="s_subtopic" id="s_subtopic" class="form-control form-control-lg w-100" onchange="count()">
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
                                                    <select name="s_source" id="s_source" class="form-control width-95" onchange="count()">
                                                        <option value="0">All Sources</option>
                                                        @foreach ($property['sources'] as $source)
                                                            <option value="{{$source -> id}}">{{  $source -> name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mt-1 mb-2">
                                                    <select name="s_paper" id="s_paper" class="form-control width-95" onchange="count()">
                                                        <option value="0">All Paper</option>
                                                        <option value="1">Paper 1</option>
                                                        <option value="2">Paper 2</option>
                                                    </select>
                                                </div>
                                                <div class="mt-1 mb-2">
                                                    <input name="s_year" id="s_year" type="number" class="form-control width-95" placeholder="All Year" max="2019" min="2010" onchange="count()">
                                                </div>
                                                <div class="mt-1 mb-2">
                                                    <select name="s_difficulty" id="s_difficulty" class="form-control width-95" onchange="count()">
                                                        <option value="0">All Difficulty</option>
                                                        <option value="1">Easy (1)</option>
                                                        <option value="2">Fair (2)</option>
                                                        <option value="3">Moderate (3)</option>
                                                        <option value="4">Hard (4)</option>
                                                        <option value="5">Harder (5)</option>
                                                    </select>
                                                </div>
                                                <div class="mt-1 mb-2">
                                                    <div id="div-randomize" class="row">
                                                        <div class="col-lg-6">
                                                            <p class=" m-1">Randomize the order?</p>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="switch m-2">
                                                                <input type="checkbox" name="random-order" value="1" checked>
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

                        <button onclick="introJs().setOption('showProgress', true).start();" class="btn btn-primary btn-lg m-3 mb-5 float-right"
                                data-toggle="tooltip" title="Click me if you don't know what to do">Help me</button>
                    </div>
                </div>
            </div>
    </section>

    <section id="section-0" class="py-3">
        <div class="container my-1">
            <div class="row">
                <div class="col-lg-3">
                    <p class="text-wish">Featured Collection</p>
                </div>
                <div class="col-lg-3 p-2">
                    <div class="card w-100 card-box-shadow">
                        <a href="/practice/collection_id/1">
                            <div class="card-body">
                                <p class="card-headline-1 m-0 p-0">Physics - Form 5 - Chapter 2, Electricity</p>
                                <span class="card-subtitle text-muted">By Mr Haree</span>
                                <p class="card-text mt-2">A series of questions to test and improve your understanding</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 p-2">
                    <div class="card w-100 card-box-shadow">
                        <a href="/practice/collection_id/2">
                            <div class="card-body">
                                <p class="card-headline-1 m-0 p-0">Add Math - All Chapter</p>
                                <span class="card-subtitle text-muted">By Cikgu Zefry Hanif</span>
                                <p class="card-text mt-2">Seemingly endless questions for you to practice with</p>
                            </div>
                        </a>
                    </div>
                </div>
{{--                <div class="col-lg-3 p-2">--}}
{{--                    <div class="card w-100 card-box-shadow">--}}
{{--                        <a href="#">--}}
{{--                            <div class="card-body">--}}
{{--                                <p class="card-headline-1 m-0 p-0">Card title</p>--}}
{{--                                <span class="card-subtitle text-muted">Card subtitle</span>--}}
{{--                                <p class="card-text mt-2">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>

    <section id="section-0" class="py-5 background-white">
        <div class="container my-1">
            <div class="row">
                <div class="col-lg-12">
                    <hr>
                    <h1 class="div-headline my-4 text-center font-weight-bold">Studii - Study <span class="app-color-green">SPM</span> Questions for free</h1>
                    <h2 class="font-weight-bold headline-2 text-center">Practice Add Math, Physics, Ekonomi (and more SPM subjects) questions at Studii for free</h2>
                    <hr>
                </div>
            </div>
        </div>
    </section>

    <section id="section-1" class="py-5 background-white">
        <div class="container my-5">
            <div class="row">
                <div class="col-lg-8">
                    <img src="{{asset('images/assets/logo.png')}}" class="d-block m-auto w-75" alt="Studii, Study For Free - Logo">
                    <p class="headline-2 text-center">A platform made with only 2 goals in mind - <br/>
                        To make exercise questions <span class="font-weight-bold">abundant</span> and <span class="font-weight-bold">free</span>.</p>
                </div>
                <div class="col-lg-4">
                    <div class="align-middle text-center">
                        <p class="headline-2">Read why practice should be this way:</p>
                        <a class="btn btn-lg btn-primary btn-block m-3">Abundant Practice</a>
                        <a class="btn btn-lg btn-primary btn-block m-3">Free Practice</a>
                        <p>Links under development</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="section-2" class="py-5 background-white">
        <div class="container my-5">
            <div class="row">
                <div class="col-lg-12">
                    <p class="div-headline text-center font-weight-bold">How Stud<span class="app-color-green">ii</span> Is Run?</p>
                    <p class="text-center headline-2">We are not an expensive startup. <span class="font-weight-bold">Studii</span> is a self-funded
                    side project by a group of university students who work on this in our free time.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="faq" class="py-5">
        <div class="container my-5">
            <div class="row">
                <div class="col-lg-12">
                    <p class="div-headline form-text">Frequently Asked Questions - FAQ</p>
                    <div class="accordion" id="accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <p class="mb-0">
                                        <span class="font-weight-bold">Is this really free?</span>
                                    </p>
                                </a>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <p>We hate it when people lie to us too. So when we say Studii is free, its really free.
                                        <br>In fact, it is a part of our biggest mission, which is to make practice abundant and free, as we think
                                        that could be so useful for students.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <a class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    <p class="mb-0">
                                        <span class="font-weight-bold">How can Studii provides the question for free?</span>
                                    </p>
                                </a>
                            </div>

                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    <p>Everytime you attempt a question here, we will pay the contributors of that question. So how
                                    do we pay them if we provide this service for free?</p>
                                    <p>The answer is <b>advertising</b>. We don't like students to pay for your practice, so we let the advertisers to pay them for you.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <a class="btn btn-link" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                    <p class="mb-0">
                                        <span class="font-weight-bold">Where do the questions come from?</span>
                                    </p>
                                </a>
                            </div>

                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">
                                    <p>The questions come from any school teachers who wish to contribute. The teachers can submit their questions, in which
                                    then will be verified by us, before we serve them for students.</p>
                                    <p>This way, more teachers can contribute verified contents to the library.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <a class="btn btn-link" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                    <p class="mb-0">
                                        <span class="font-weight-bold">What do teachers get from contributing?</span>
                                    </p>
                                </a>
                            </div>

                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                <div class="card-body">
                                    <p>Besides the opportunity to help countless students in their study, teachers will get compensated for every attempt. </p>
                                    <p>This royalty compensation is to honour the contributor's contribution towards the library.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFive">
                                <a class="btn btn-link" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                    <p class="mb-0">
                                        <span class="font-weight-bold">How do I know this website is legit (not a scam) ?</span>
                                    </p>
                                </a>
                            </div>

                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                                <div class="card-body">
                                    <p>Yes we understand, this website is only developing so it may look sort of fishy. But you can always talk to
                                        Syazani Zulkhairi (the captain) at 019-209 9853 to ask about anything. Ask any of your doubts and I will try my best to solve it.</p>
                                    <p>Besides, this website is totally free, so we wont ask you for your banking information at all. Just use the free practice!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="section-4" class="py-5 background-white">
        <div class="container my-5">
            <div class="row my-3">
                <div class="col-lg-12">
                    <p class="div-headline font-weight-bold text-center">How can <span class="app-color-green">you</span> help us to grow?</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 p-3 px-5 text-center">
                    <p class="section-4-headline my-2 font-weight-bold">If you are a <span class="underline">student</span></p>
                    <p class="headline-3">Simply use our questions to study. <br>In order to grow, we need traction. To show your support, you can help us by
                    just practicing as much questions here as you need.</p>
                </div>
                <div class="col-lg-6 p-3 px-5 text-center">
                    <p class="section-4-headline my-2 font-weight-bold">If you are a <span class="underline">teacher</span></p>
                    <p class="headline-3">We work with passionate teachers to grow our content. Click the button below to know more.</p>
                    <a href="/about/teacher/join-us" class="btn btn-lg btn-primary btn-block mt-1">Teachers, Click Here</a>
                </div>
            </div>
            <div class="row mt-4">
                <div class="offset-lg-1 col-lg-10 p-3 text-center">
                    <p class="section-4-headline my-2 font-weight-bold">If you are with a <span class="underline">company</span></p>
                    <p class="headline-3">Ultimately, we are sustainable as a service. But with your help as a sponsor, we can grow and serve more students faster.</p>
                    <a href="/about/for-company" class="btn btn-lg btn-primary btn-block mt-1">Companies, Click Here</a>
                </div>
            </div>
        </div>
    </section>

{{--    <section id="section-4" class="py-5" style="background-color: white">--}}
{{--        <div class="container my-5">--}}
{{--            <div class="row my-3">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <p class="div-headline mb-0" style="text-align:  center;"><b>Special Appreciation &#10084;</b></p>--}}
{{--                    <p class="div-headline-3 mt-0" style="text-align: center">for sharing our dream of abundant & free practice for students in Malaysia</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-6 p-3 px-5" style="text-align: center">--}}
{{--                    <p class="section-4-headline my-2" style="color:purple;"><b>Company 1</b></p>--}}
{{--                    <p style="font-size:1.4em">this can be you</p>--}}
{{--                </div>--}}
{{--                <div class="col-lg-6 p-3 px-5" style="text-align: center">--}}
{{--                    <p class="section-4-headline my-2" style="color:#b5382f;"><b>Company 2</b></p>--}}
{{--                    <p style="font-size:1.4em">this can be you</p>--}}
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
