@extends('layouts.app')

@section('link-in-head')
    {{--All links--}}
    <link rel="stylesheet" href="{{asset('css/accordion/accordion.css')}}">

    <link rel="stylesheet" href="{{asset('css/custom/custom-select.css')}}">

    <link rel="stylesheet" href="{{asset('css/alertify/alertify.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/alertify/default.min.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script type="text/x-mathjax-config">
        MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}});
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/latest.js?config=TeX-MML-AM_CHTML' async></script>

    <script src="js/alertify/alertify.min.js"></script>

    {{--End links--}}
@endsection

<style>
    @section('style')
     .p-info {
        font-size:24px;
        overflow: auto;
        width:80%;
        margin-bottom: 0.2em;
    }

    #row-property a {
        float:right;
        margin:1em;
    }

    #row-content {
        margin-top:0.6em;
        padding:1em;
        font-size:18px;
        width:100%;
        background-color:white;
        border-radius:10px;
        border:1px solid lightgrey;
    }

    #row-content p {
        margin-bottom: 0.1em;
    }

    #row-answer div a {
        width:70%;
        color:black;
    }

    #row-answer div a:hover{
        text-decoration: none;
        font-weight:bold;
    }

    #accordion1 div p {
        font-size:17px;
        margin-bottom:0.3em;
    }

    #accordion1 div {
        border-radius: 15px;
        background-color: white;
    }

    #accordion1 div div {
        width:45%;
        display: inline-block;
    }

    #right-panel textarea {
        width:100%;
        overflow: auto;
        padding:5px;
    }

    @media only screen and (max-width: 1220px) {
        .p-info {
            font-size:19px;
        }
    }

    @media only screen and (max-width: 1000px) {
        .p-info {
            font-size:19px;
            width:70%;
        }
    }

    @media only screen and (max-width: 1000px) {
        .p-info {
            font-size:17px;
            width:60%;
        }
    }

    /*----------------------------------------------------------------------------------*/
    /*Rating CSS*/
    * {
        box-sizing: border-box;
    }

    .rating_container {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        padding: 0 20px;
    }

    .rating {
        display: flex;
        width: 100%;
        justify-content: center;
        overflow: hidden;
        flex-direction: row-reverse;
        height: 150px;
        position: relative;
    }

    .rating-0 {
        -webkit-filter: grayscale(100%);
        filter: grayscale(100%);
    }

    .rating > input {
        display: none;
    }

    .rating > label {
        cursor: pointer;
        width: 40px;
        height: 40px;
        margin-top: auto;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23e3e3e3' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: center;
        background-size: 76%;
        transition: .3s;
    }

    .rating > input:checked ~ label,
    .rating > input:checked ~ label ~ label {
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23fcd93a' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
    }

    .rating > input:not(:checked) ~ label:hover,
    .rating > input:not(:checked) ~ label:hover ~ label {
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23d8b11e' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
    }

    .emoji-wrapper {
        width: 100%;
        text-align: center;
        height: 100px;
        overflow: hidden;
        position: absolute;
        top: 0;
        left: 0;
    }

    .emoji-wrapper:before,
    .emoji-wrapper:after {
        content: "";
        height: 15px;
        width: 100%;
        position: absolute;
        left: 0;
        z-index: 1;
    }

    .emoji-wrapper:before {
        top: 0;
        background: linear-gradient(to bottom, white 0%, white 35%, rgba(255, 255, 255, 0) 100%);
    }

    .emoji-wrapper:after {
        bottom: 0;
        background: linear-gradient(to top, white 0%, white 35%, rgba(255, 255, 255, 0) 100%);
    }

    .emoji {
        display: flex;
        flex-direction: column;
        align-items: center;
        transition: .3s;
    }

    .emoji > svg {
        margin: 15px 0;
        width: 70px;
        height: 70px;
        flex-shrink: 0;
    }

    #rating-1:checked ~ .emoji-wrapper > .emoji {
        -webkit-transform: translateY(-100px);
        transform: translateY(-100px);
    }

    #rating-2:checked ~ .emoji-wrapper > .emoji {
        -webkit-transform: translateY(-200px);
        transform: translateY(-200px);
    }

    #rating-3:checked ~ .emoji-wrapper > .emoji {
        -webkit-transform: translateY(-300px);
        transform: translateY(-300px);
    }

    #rating-4:checked ~ .emoji-wrapper > .emoji {
        -webkit-transform: translateY(-400px);
        transform: translateY(-400px);
    }

    #rating-5:checked ~ .emoji-wrapper > .emoji {
        -webkit-transform: translateY(-500px);
        transform: translateY(-500px);
    }

    .feedback {
        max-width: 360px;
        background-color: #fff;
        width: 100%;
        padding: 30px;
        border-radius: 8px;
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        align-items: center;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
    }
    /*END CSS FEEDBACK ----------------------------------------- */

    /*For rating form under content*/
    .checked {
        color: orange;
    }

    .rating_star    {
        cursor: pointer;
    }

    @endsection
</style>

@section('content')

    <section style="margin-top:2em;">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div id="row-property" data-step="1" data-intro="This is the basic information of this question.">
                        {{--1. Properties Question --}}
                        <p class="p-info d-inline-block">{{$question -> subject_name -> name}},  {{$question -> chapter_name -> name}},   Paper {{$question -> paper}}, {{$question -> year}}</p>

                        <a class="btn btn-info d-inline-block m-0" data-toggle="collapse" href="#accordion1" role="button" aria-expanded="false" data-step="2"
                           data-intro="To find more details of the question shown, you can just click this button.">More info</a>

                        <div class="collapse multi-collapse" id="accordion1">
                            <div class="card-body">
                                <p>Question Properties:</p>
                                <div>
                                    <ul>
                                        <li>Exam : SPM</li>
                                        <li>Level : {{$question -> level_name -> name}}</li>
                                        <li>Subject : {{$question -> subject_name -> name}}</li>
                                        <li>Chapter : {{$question -> chapter_name -> name}}</li>
                                        <li>Year : {{$question -> year}}</li>
                                        <li>Paper {{$question -> paper}}</li>
                                    </ul>
                                </div>
                                <div>
                                    <ul>
                                        <li>Source : {{$question -> source_name -> name}}</li>
{{--                                        <li>Question No : {{$question -> question_number}}</li>--}}
                                        <li>Difficulty : {{$data['difficulty']}}</li>
                                        <li>Submitted By (1) : {{$question -> submitter1 -> firstname}} {{$question -> submitter1 -> lastname}}</li>
                                        <li>Submitted By (2) : @if(isset($question -> submitter2 -> name)){{$question -> submitter2 -> firstname}} {{$question -> submitter2 -> lastname}} @else    - @endif</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

{{--                2. Content for question    --}}
                    <div id="row-content" data-step="3" data-intro="This is the question.">
                        <div>
                            <p>
                                @if (isset($contents[0]))
                                    {{$contents[0]-> content}}
                                @endif
                            </p>
                            @if ($image == 1)
                                <br>
                                <img src="/images/question_images/id-{{$data['id']}}.jpg" alt="question_image" style="width:100%">
                                <br><br>
                            @endif
                            <p id="display_2">
                                @if (isset($contents[1]))
                                    {{$contents[1]-> content}}
                                @endif
                            </p>
                            <div style="padding-left:20px;">

                                @for($k=2; $k<7; $k++)
                                    @if(isset($contents[$k]))
                                    <div>
                                        <p id="symbol_{{$k+1}}" style="width:5%; display: inline-block">@if (isset($contents[$k])) {{$symbol_finished[$k]}} @endif</p>
                                        <p id="display_{{$k+1}}" style="display: inline-block">@if (isset($contents[$k])) {{$contents[$k]-> content}} @endif</p>
                                    </div>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="float-right" data-toggle="tooltip" data-placement="right" title="please take some time to rate the difficulty of this question"
                             data-step="4" data-intro="Here you can rate the difficulty of this question. Your rating will contribute to an average value, collected from other students also.">
                            <p class="d-inline-block mr-2">Easy (1)</p>
                            @for($i=1; $i<= 5; $i++)
                                @if($i<= $question -> difficulty)
                                <span id="s{{$i}}" class="fa fa-star rating_star checked" onclick="rating_click({{$i}})"></span>
                                @else
                                    <span id="s{{$i}}" class="fa fa-star rating_star" onclick="rating_click({{$i}})"></span>
                                @endif
                            @endfor
                            <p class="d-inline-block ml-2">Hardest (5)</p>
                        </div>
                        <p>&nbsp</p>
                    </div>

{{--                3. Content for answers    --}}
                    <div id="row-answer" data-step="5"
                         data-intro="And this area is where you will input your answers. Before you click the submit button, make sure you are absolutely certain of your answer first.">

                        @foreach($answers as $n)
                        <div style="margin-bottom:1em;">
                            <a class="" data-toggle="collapse" href="#answer{{($loop->iteration)}}" role="button" aria-expanded="false"><p style="margin-bottom: 0.5em">Answer {{$symbol_finished[($loop->iteration)-1]}}</p></a>
                            <div id="answer{{($loop->iteration)}}" class="collapse show">
                                <div class="control-group" style="width:90%">
                                    <div>
                                        <div>
                                            <img class="image_{{($loop->iteration)}}" src="" style="width:1.6em; padding-bottom: 0.3em; margin:0.1em; visibility: hidden;" alt="tick">
                                            <label class="control control--radio d-inline-block">{{$n[0] -> answer}}
                                                <input name="input_{{$loop->iteration}}" type="radio" value="1"/>
                                                <div class="control__indicator"></div>
                                            </label>
                                        </div>
                                        <div>
                                            <img class="image_{{($loop->iteration)}}" src="" style="width:1.6em; padding-bottom: 0.3em; margin:0.1em; visibility: hidden;" alt="tick">
                                            <label class="d-inline-block control control--radio">{{$n[1] -> answer}}
                                                <input name="input_{{$loop->iteration}}" class="input_answer" type="radio" value="2"/>
                                                <div class="control__indicator"></div>
                                            </label>
                                        </div>
                                        @if(isset($n[2]))
                                        <div>
                                            <img class="image_{{($loop->iteration)}}" src="" style="width:1.6em; padding-bottom: 0.3em; margin:0.1em; visibility: hidden;" alt="tick">
                                            <label class="d-inline-block control control--radio">{{$n[2] -> answer}}
                                                <input name="input_{{$loop->iteration}}" class="input_answer" type="radio" value="3"/>
                                                <div class="control__indicator"></div>
                                            </label>
                                        </div>
                                        @endif
                                        @if(isset($n[3]))
                                        <div>
                                            <img class="image_{{($loop->iteration)}}" src="" style="width:1.6em; padding-bottom: 0.3em; margin:0.1em; visibility: hidden;" alt="tick">
                                            <label class="d-inline-block control control--radio">{{$n[3] -> answer}}
                                                <input name="input_{{$loop->iteration}}" class="input_answer" type="radio" value="4"/>
                                                <div class="control__indicator"></div>
                                            </label>
                                        </div>
                                        @endif
                                        <button id="check_question_{{$loop->iteration}}" onclick="check_answer({{$loop->iteration}})" style="float:right; cursor: pointer">Check Answer</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>

                    <div style="height:100px"></div>

                </div>

                <div class="col-lg-3 offset-1" id="right-panel"
                     data-step="6" data-intro="Finally, you have a control panel right here. Everything that you may need can be find here. That's it, goodluck!">
                    <div style="padding:35px;">
                        <div>
                            @if (isset(session('qid')[$data['num']+1]))
                                <a href="/practice?num={{$data['num']+1}}" class="btn btn-lg btn-block btn-primary">Next Question</a>
                            @else
                                <p style="padding:0.6em 1em; border:1.5px solid grey; text-align: center; font-size:1.1em; cursor:default; border-radius: 10px;">No More Question</p>
                            @endif
                        </div>
                        <br>
                        <div style="border:2px solid #dbdbdb; border-radius: 7px; padding:10px;">
                            <p>tutorial & explanation:</p>
                            <a class="btn btn-secondary btn-block" onclick="introJs().setOption('showProgress', true).start();" style="color:white">How to use <br>this page?</a>
                            <a class="btn btn-secondary btn-block" id="btn_computer_or_mobile" style="color:white">Computer or<br>mobile phone?</a>
                            <a class="btn btn-secondary btn-block" id="btn_tutorial_difficulty_rating" style="color:white">Difficulty rating</a>
                        </div>
                        <br>
                        @if($question -> source_name -> id == 1)
                        <div id="div-submitter" style="border:2px solid #dbdbdb; border-radius: 7px; padding:10px;">
                            <p class="text-center">Submitted By:</p>
                            <div id="img-submitter">
                                @if($data['profile_pic'] == 1)
                                    <img src="{{asset('/images/user_images/id-'.$question->submitted_by1.'.jpg')}}" class="ml-auto mr-auto d-block rounded-circle" style="border: 1px solid grey; width: 50%;">
                                @elseif($data['profile_pic'] == 2)
                                    <img src="{{asset('/images/user_images/unknown.png')}}" class="w-50 ml-auto mr-auto d-block rounded-circle" style="border: 1px solid grey">
                                @else
                                    <img src="{{asset('/images/user_images/unknown.png')}}" class="w-50 ml-auto mr-auto d-block rounded-circle" style="border: 1px solid grey">
                                @endif
                            </div>
                                <p class="mt-1 text-center mb-0">{{$question->submitter1->firstname}} {{$question->submitter1->lastname}}</p>
                                <p class="text-center">{{\App\School::school_name($question->submitted_by1)}}</p>
                        </div>
                        @elseif($question -> source_name -> id == 2)
                        <div style="border:2px solid #dbdbdb; border-radius: 7px; padding:10px;">
                            <p class="text-center"><b>Question Owned By:</b></p>
                            <img src="{{asset('images/cat.png')}}" class="w-50 ml-auto mr-auto d-block">
                            <p class="text-center mt-1">Studii</p>
                        </div>
                        @endif
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('modal')

    @if($noti['need_instruction'] == 1)
    <!-- Modal to ask if users need instructions -->
    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal1">Is this your first time?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    If you need some instructions on how this page works, we're really happy to show things around.
                </div>
                <div class="modal-footer">
                    <button onclick="show_instruction(); disable_help()" type="button" class="btn btn-primary" data-dismiss="modal">Yes I want help</button>
                    <button type="button" onclick="disable_help()" class="btn btn-secondary" data-dismiss="modal">No I'm good</button>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if(isset($noti['feedback_form']) && $noti['feedback_form'] == 1)
        <!-- Modal to ask if users need instructions -->
        <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">We would love to hear your feedback!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 style="text-align: center">This is a very quick survey. Do you like to use this platform?</h5><br>
                        <div class="rating_container">
                            <div class="feedback">
                                <p id="text-pick-star">just pick your star</p>
                                <div class="rating">
                                    <input type="radio" name="feedback_rating" onclick="document.getElementById('text-submit-1').style.visibility = 'visible'" id="rating-5" value="5   ">
                                    <label for="rating-5"></label>
                                    <input type="radio" name="feedback_rating" onclick="document.getElementById('text-submit-1').style.visibility = 'visible'" id="rating-4" value="4">
                                    <label for="rating-4"></label>
                                    <input type="radio" name="feedback_rating" onclick="document.getElementById('text-submit-1').style.visibility = 'visible'" id="rating-3" value="3">
                                    <label for="rating-3"></label>
                                    <input type="radio" name="feedback_rating" onclick="document.getElementById('text-submit-1').style.visibility = 'visible'" id="rating-2" value="2">
                                    <label for="rating-2"></label>
                                    <input type="radio" name="feedback_rating" onclick="document.getElementById('text-submit-1').style.visibility = 'visible'" id="rating-1" value="1">
                                    <label for="rating-1"></label>
                                    <div class="emoji-wrapper">
                                        <div class="emoji">
                                            <svg class="rating-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                                <path d="M512 256c0 141.44-114.64 256-256 256-80.48 0-152.32-37.12-199.28-95.28 43.92 35.52 99.84 56.72 160.72 56.72 141.36 0 256-114.56 256-256 0-60.88-21.2-116.8-56.72-160.72C474.8 103.68 512 175.52 512 256z" fill="#f4c534"/>
                                                <ellipse transform="scale(-1) rotate(31.21 715.433 -595.455)" cx="166.318" cy="199.829" rx="56.146" ry="56.13" fill="#fff"/>
                                                <ellipse transform="rotate(-148.804 180.87 175.82)" cx="180.871" cy="175.822" rx="28.048" ry="28.08" fill="#3e4347"/>
                                                <ellipse transform="rotate(-113.778 194.434 165.995)" cx="194.433" cy="165.993" rx="8.016" ry="5.296" fill="#5a5f63"/>
                                                <ellipse transform="scale(-1) rotate(31.21 715.397 -1237.664)" cx="345.695" cy="199.819" rx="56.146" ry="56.13" fill="#fff"/>
                                                <ellipse transform="rotate(-148.804 360.25 175.837)" cx="360.252" cy="175.84" rx="28.048" ry="28.08" fill="#3e4347"/>
                                                <ellipse transform="scale(-1) rotate(66.227 254.508 -573.138)" cx="373.794" cy="165.987" rx="8.016" ry="5.296" fill="#5a5f63"/>
                                                <path d="M370.56 344.4c0 7.696-6.224 13.92-13.92 13.92H155.36c-7.616 0-13.92-6.224-13.92-13.92s6.304-13.92 13.92-13.92h201.296c7.696.016 13.904 6.224 13.904 13.92z" fill="#3e4347"/>
                                            </svg>
                                            <svg class="rating-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                                <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
                                                <path d="M328.4 428a92.8 92.8 0 0 0-145-.1 6.8 6.8 0 0 1-12-5.8 86.6 86.6 0 0 1 84.5-69 86.6 86.6 0 0 1 84.7 69.8c1.3 6.9-7.7 10.6-12.2 5.1z" fill="#3e4347"/>
                                                <path d="M269.2 222.3c5.3 62.8 52 113.9 104.8 113.9 52.3 0 90.8-51.1 85.6-113.9-2-25-10.8-47.9-23.7-66.7-4.1-6.1-12.2-8-18.5-4.2a111.8 111.8 0 0 1-60.1 16.2c-22.8 0-42.1-5.6-57.8-14.8-6.8-4-15.4-1.5-18.9 5.4-9 18.2-13.2 40.3-11.4 64.1z" fill="#f4c534"/>
                                                <path d="M357 189.5c25.8 0 47-7.1 63.7-18.7 10 14.6 17 32.1 18.7 51.6 4 49.6-26.1 89.7-67.5 89.7-41.6 0-78.4-40.1-82.5-89.7A95 95 0 0 1 298 174c16 9.7 35.6 15.5 59 15.5z" fill="#fff"/>
                                                <path d="M396.2 246.1a38.5 38.5 0 0 1-38.7 38.6 38.5 38.5 0 0 1-38.6-38.6 38.6 38.6 0 1 1 77.3 0z" fill="#3e4347"/>
                                                <path d="M380.4 241.1c-3.2 3.2-9.9 1.7-14.9-3.2-4.8-4.8-6.2-11.5-3-14.7 3.3-3.4 10-2 14.9 2.9 4.9 5 6.4 11.7 3 15z" fill="#fff"/>
                                                <path d="M242.8 222.3c-5.3 62.8-52 113.9-104.8 113.9-52.3 0-90.8-51.1-85.6-113.9 2-25 10.8-47.9 23.7-66.7 4.1-6.1 12.2-8 18.5-4.2 16.2 10.1 36.2 16.2 60.1 16.2 22.8 0 42.1-5.6 57.8-14.8 6.8-4 15.4-1.5 18.9 5.4 9 18.2 13.2 40.3 11.4 64.1z" fill="#f4c534"/>
                                                <path d="M155 189.5c-25.8 0-47-7.1-63.7-18.7-10 14.6-17 32.1-18.7 51.6-4 49.6 26.1 89.7 67.5 89.7 41.6 0 78.4-40.1 82.5-89.7A95 95 0 0 0 214 174c-16 9.7-35.6 15.5-59 15.5z" fill="#fff"/>
                                                <path d="M115.8 246.1a38.5 38.5 0 0 0 38.7 38.6 38.5 38.5 0 0 0 38.6-38.6 38.6 38.6 0 1 0-77.3 0z" fill="#3e4347"/>
                                                <path d="M131.6 241.1c3.2 3.2 9.9 1.7 14.9-3.2 4.8-4.8 6.2-11.5 3-14.7-3.3-3.4-10-2-14.9 2.9-4.9 5-6.4 11.7-3 15z" fill="#fff"/>
                                            </svg>
                                            <svg class="rating-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                                <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
                                                <path d="M336.6 403.2c-6.5 8-16 10-25.5 5.2a117.6 117.6 0 0 0-110.2 0c-9.4 4.9-19 3.3-25.6-4.6-6.5-7.7-4.7-21.1 8.4-28 45.1-24 99.5-24 144.6 0 13 7 14.8 19.7 8.3 27.4z" fill="#3e4347"/>
                                                <path d="M276.6 244.3a79.3 79.3 0 1 1 158.8 0 79.5 79.5 0 1 1-158.8 0z" fill="#fff"/>
                                                <circle cx="340" cy="260.4" r="36.2" fill="#3e4347"/>
                                                <g fill="#fff">
                                                    <ellipse transform="rotate(-135 326.4 246.6)" cx="326.4" cy="246.6" rx="6.5" ry="10"/>
                                                    <path d="M231.9 244.3a79.3 79.3 0 1 0-158.8 0 79.5 79.5 0 1 0 158.8 0z"/>
                                                </g>
                                                <circle cx="168.5" cy="260.4" r="36.2" fill="#3e4347"/>
                                                <ellipse transform="rotate(-135 182.1 246.7)" cx="182.1" cy="246.7" rx="10" ry="6.5" fill="#fff"/>
                                            </svg>
                                            <svg class="rating-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                                <path d="M407.7 352.8a163.9 163.9 0 0 1-303.5 0c-2.3-5.5 1.5-12 7.5-13.2a780.8 780.8 0 0 1 288.4 0c6 1.2 9.9 7.7 7.6 13.2z" fill="#3e4347"/>
                                                <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
                                                <g fill="#fff">
                                                    <path d="M115.3 339c18.2 29.6 75.1 32.8 143.1 32.8 67.1 0 124.2-3.2 143.2-31.6l-1.5-.6a780.6 780.6 0 0 0-284.8-.6z"/>
                                                    <ellipse cx="356.4" cy="205.3" rx="81.1" ry="81"/>
                                                </g>
                                                <ellipse cx="356.4" cy="205.3" rx="44.2" ry="44.2" fill="#3e4347"/>
                                                <g fill="#fff">
                                                    <ellipse transform="scale(-1) rotate(45 454 -906)" cx="375.3" cy="188.1" rx="12" ry="8.1"/>
                                                    <ellipse cx="155.6" cy="205.3" rx="81.1" ry="81"/>
                                                </g>
                                                <ellipse cx="155.6" cy="205.3" rx="44.2" ry="44.2" fill="#3e4347"/>
                                                <ellipse transform="scale(-1) rotate(45 454 -421.3)" cx="174.5" cy="188" rx="12" ry="8.1" fill="#fff"/>
                                            </svg>
                                            <svg class="rating-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                                <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
                                                <path d="M232.3 201.3c0 49.2-74.3 94.2-74.3 94.2s-74.4-45-74.4-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z" fill="#e24b4b"/>
                                                <path d="M96.1 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2C80.2 229.8 95.6 175.2 96 173.3z" fill="#d03f3f"/>
                                                <path d="M215.2 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z" fill="#fff"/>
                                                <path d="M428.4 201.3c0 49.2-74.4 94.2-74.4 94.2s-74.3-45-74.3-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z" fill="#e24b4b"/>
                                                <path d="M292.2 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2-77.8-65.7-62.4-120.3-61.9-122.2z" fill="#d03f3f"/>
                                                <path d="M411.3 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z" fill="#fff"/>
                                                <path d="M381.7 374.1c-30.2 35.9-75.3 64.4-125.7 64.4s-95.4-28.5-125.8-64.2a17.6 17.6 0 0 1 16.5-28.7 627.7 627.7 0 0 0 218.7-.1c16.2-2.7 27 16.1 16.3 28.6z" fill="#3e4347"/>
                                                <path d="M256 438.5c25.7 0 50-7.5 71.7-19.5-9-33.7-40.7-43.3-62.6-31.7-29.7 15.8-62.8-4.7-75.6 34.3 20.3 10.4 42.8 17 66.5 17z" fill="#e24b4b"/>
                                            </svg>
                                            <svg class="rating-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <g fill="#ffd93b">
                                                    <circle cx="256" cy="256" r="256"/>
                                                    <path d="M512 256A256 256 0 0 1 56.8 416.7a256 256 0 0 0 360-360c58 47 95.2 118.8 95.2 199.3z"/>
                                                </g>
                                                <path d="M512 99.4v165.1c0 11-8.9 19.9-19.7 19.9h-187c-13 0-23.5-10.5-23.5-23.5v-21.3c0-12.9-8.9-24.8-21.6-26.7-16.2-2.5-30 10-30 25.5V261c0 13-10.5 23.5-23.5 23.5h-187A19.7 19.7 0 0 1 0 264.7V99.4c0-10.9 8.8-19.7 19.7-19.7h472.6c10.8 0 19.7 8.7 19.7 19.7z" fill="#e9eff4"/>
                                                <path d="M204.6 138v88.2a23 23 0 0 1-23 23H58.2a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z" fill="#45cbea"/>
                                                <path d="M476.9 138v88.2a23 23 0 0 1-23 23H330.3a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z" fill="#e84d88"/>
                                                <g fill="#38c0dc">
                                                    <path d="M95.2 114.9l-60 60v15.2l75.2-75.2zM123.3 114.9L35.1 203v23.2c0 1.8.3 3.7.7 5.4l116.8-116.7h-29.3z"/>
                                                </g>
                                                <g fill="#d23f77">
                                                    <path d="M373.3 114.9l-66 66V196l81.3-81.2zM401.5 114.9l-94.1 94v17.3c0 3.5.8 6.8 2.2 9.8l121.1-121.1h-29.2z"/>
                                                </g>
                                                <path d="M329.5 395.2c0 44.7-33 81-73.4 81-40.7 0-73.5-36.3-73.5-81s32.8-81 73.5-81c40.5 0 73.4 36.3 73.4 81z" fill="#3e4347"/>
                                                <path d="M256 476.2a70 70 0 0 0 53.3-25.5 34.6 34.6 0 0 0-58-25 34.4 34.4 0 0 0-47.8 26 69.9 69.9 0 0 0 52.6 24.5z" fill="#e24b4b"/>
                                                <path d="M290.3 434.8c-1 3.4-5.8 5.2-11 3.9s-8.4-5.1-7.4-8.7c.8-3.3 5.7-5 10.7-3.8 5.1 1.4 8.5 5.3 7.7 8.6z" fill="#fff" opacity=".2"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <p id="text-submit-1" style="visibility: hidden">Submitted</p>
                            </div>
                        </div>
                        <br>
                        <h5 style="text-align: center">Do you have any suggestion on how we can improve?</h5>
                        <textarea id="feedback_suggestion" class="form-control w-75 ml-auto mt-3 mr-auto mb-2 d-block" onkeyup="able_button()"></textarea>
                    </div>
                    <div class="modal-footer">
                        <h5 class="mr-3" id="text_feedback_success"></h5>
                        <button id="btn_feedback" onclick="submit_feedback()" type="button" class="btn btn-primary btn-lg" disabled>Submit feedback</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection

<script type="text/javascript">
    @section('script')

    //VARIABLES ---------------------------------------------------------------------------
    let submitted_rating = 0;
    //END VARIABLES -----------------------------------------------------------------------

    // CHECKING METHOD -> CORRECT OR NOT  ------------------------------------------------------
    // -----------------------------------------------------------------------------------------
    let alertify_correct = [
        'Correct!',
        'Amazing!',
        "You're sure you not the Megamind?",
        "Heck you're good",
        "Tahniah!"
    ];

    let alertify_wrong = [
        "It's okay",
        'We will get it right next time',
        "We're getting better",
        ":)",
        "Ah just one little fall",
        'Even the Avengers got beaten the first round'
    ];

    let answer='{{$data['answer_correct']}}';
{{--    {{dd($answers[0][0]->correct)}}--}}
{{--    @foreach($answers as $n)--}}
{{--        @if($n[0] -> correct == 1)--}}
{{--        answer[{{$loop->iteration}}] = '1';--}}
{{--    @else--}}
{{--        answer[{{$loop->iteration}}] = '2';--}}
{{--        @endif--}}
{{--        @endforeach--}}
{{--    console.log(answer);--}}

    let count_attempt = 0;
    let answer_size = '{{$data['answer_size']}}';
    let question_id = '{{$data['id']}}';
    let teacher_id = '{{$question -> submitted_by1}}';
    console.log(answer);

    function check_answer(x) {

        let id = 'input_' + x;
        let selector = 'input[name="'+ id +'"]:checked';

        let y = document.querySelector(selector).value;

        let image_class = 'image_' + x;
        let z = document.getElementsByClassName(image_class);

        if (answer === y)    {

            z[y-1].src = '/images/tick.png';
            z[y-1].style.visibility = 'visible';

            let sentence = alertify_correct[Math.floor(Math.random() * alertify_correct.length)];
            alertify.success('<span style="font-size: 1.5em;">'+ sentence +'</span>');

        }   else {

            z[y-1].src = '/images/wrong.png';
            z[y-1].style.visibility = 'visible';

            let sentence = alertify_wrong[Math.floor(Math.random() * alertify_wrong.length)];
            alertify.error('<span style="font-size: 1.5em;">'+ sentence +'</span>');

        }

        document.getElementById('check_question_' + x).disabled = true;
        count_attempt++;


        if (count_attempt.toString() === answer_size)   {
            function_count_attempt(question_id);
        }

    }
    // END CHECKING METHOD ------------------------------------------------------------------------------------

    //For rating form under content -------------------------------------------------------------------------------
    let s1 = document.getElementById("s1");
    let s2 = document.getElementById("s2");
    let s3 = document.getElementById("s3");
    let s4 = document.getElementById("s4");
    let s5 = document.getElementById("s5");


    $(s1).hover(function () {
        $(this).css("color", "orange");
    }, function () {
        $(s1).css("color", "black");
        $(s2).css("color", "black");
        $(s3).css("color", "black");
        $(s4).css("color", "black");
        $(s5).css("color", "black");
    });

    $(s2).hover(function () {
        $(this).css("color", "orange");
        $(s1).css("color", "orange");
    }, function () {
        $(s1).css("color", "black");
        $(s2).css("color", "black");
        $(s3).css("color", "black");
        $(s4).css("color", "black");
        $(s5).css("color", "black");
    });

    $(s3).hover(function () {
        $(this).css("color", "orange");
        $(s1).css("color", "orange");
        $(s2).css("color", "orange");
    }, function () {
        $(s1).css("color", "black");
        $(s2).css("color", "black");
        $(s3).css("color", "black");
        $(s4).css("color", "black");
        $(s5).css("color", "black");
    });

    $(s4).hover(function () {
        $(this).css("color", "orange");
        $(s1).css("color", "orange");
        $(s2).css("color", "orange");
        $(s3).css("color", "orange");
    }, function () {
        $(s1).css("color", "black");
        $(s2).css("color", "black");
        $(s3).css("color", "black");
        $(s4).css("color", "black");
        $(s5).css("color", "black");
    });

    $(s5).hover(function () {
        $(this).css("color", "orange");
        $(s1).css("color", "orange");
        $(s2).css("color", "orange");
        $(s3).css("color", "orange");
        $(s4).css("color", "orange");
    }, function () {
        $(s1).css("color", "black");
        $(s2).css("color", "black");
        $(s3).css("color", "black");
        $(s4).css("color", "black");
        $(s5).css("color", "black");
    });

    //END Functions -------------------------------------------------------------------------------------------------

    // MODAL POP UP - IF NEED INSTRUCTIONS--------------------------------------------------------------------
    @if($noti['need_instruction'] == 1)
    $(window).on('load',function(){
        $('#modal1').modal('show');
    });
    @endif

    @if(isset($noti['feedback_form']) && $noti['feedback_form'] == 1)
    $(window).on('load',function(){
        $('#modal2').modal('show');
    });
    @endif
    // END MODAL POP UP--------------------------------------------------------------------------------------

    //Alertify -------------------------------------------------------------------------
    //---------------------------------------------------------------------------------

    let text_difficulty_rating = "We want to make the difficulty of any question is based on the students, not on teachers. <br><br>If"+
        " a teacher says a question is easy, but many students find it hard, then we think the question should be considered as hard. It can also work the other way around."+
        "<br><br> So, with this difficulty rating, the response will be collected from all students, in which the average will indicate the real difficulty of the question.";

    $(document).ready(function() {
        $('#btn_tutorial_difficulty_rating').click(function(){
            alertify.alert('Why do we have difficulty rating?',text_difficulty_rating);
        });
    });


    let text_computer_mobile = "Actually, this page works best with a computer.<br><br> Eventhough it can still be opened with a browser on a mobile phone, "+
        "it is supposed to be through an app, that is still under development."+
        "<br><br>So stay tuned for the apps ya!";

    $(document).ready(function() {
        $('#btn_computer_or_mobile').click(function(){
            alertify.alert('Better to practice on a computer or a mobile phone?',text_computer_mobile);
        });
    });

    //End Alertify ---------------------------------------------------------------------

    // JAVASCRIPT FUNCTIONS-----------------------------------------------------------------------------------------
    function show_instruction() {
        introJs().setOption('showProgress', true).start();
    }

    function disable_help() {
        //Ajax to update session that no instruction is needed
        $.ajax({
            type: 'get',
            url: '/ajax/practice/session-for-new',
            success: function (response) {
                return 1;
            },
        });
    }

    function function_count_attempt() {
        //Ajax to increment attempt to the question
        $.ajax({
            type: 'get',
            url: '/ajax/practice/count-attempt',
            data: {
                question_id : question_id,
                teacher_id : teacher_id
            },
        });
    }

    //Functions - mainly javascript stuff, not Jquery -------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------------------------------------------------

    //Function for feedback ----------------------------------------------------------------------------------------------

    document.getElementById('btn_feedback').disabled = true;

    function able_button()  {
        document.getElementById('btn_feedback').disabled = false;
    }

    function submit_feedback()  {
        //Ajax to save feedback from users

        let like = document.querySelector('input[name="feedback_rating"]:checked').value;
        let suggestion = document.getElementById('feedback_suggestion').value;

        console.log(suggestion);

        $.ajax({
            type: 'get',
            url: '/ajax/feedback',
            data: {
                like : like,
                suggestion : suggestion
            },
        });

        document.getElementById('text_feedback_success').innerHTML = "<span style='color:#26d153'>Thank you for your feedback</span>";
        document.getElementById('btn_feedback').disabled = true;
    }

    //For rating difficulty form under content

    function rating_click(v)  {
        console.log(submitted_rating);

        if(submitted_rating === 0) {

            let question_id = '{{$data['id']}}';
            alertify.warning("<span style='font-size:1.3em'>thank you for rating this question</span>");

            $.ajax({
                type: 'get',
                url: '/ajax/practice/rating',
                data: {
                    question_id: question_id,
                    rating: v
                },
            });
        }
        submitted_rating = 1;
        $(s1).unbind('mouseenter').unbind('mouseleave');
        $(s2).unbind('mouseenter').unbind('mouseleave');
        $(s3).unbind('mouseenter').unbind('mouseleave');
        $(s4).unbind('mouseenter').unbind('mouseleave');
        $(s5).unbind('mouseenter').unbind('mouseleave');
    }
    //End rating difficulty form under content

    @endsection
</script>
