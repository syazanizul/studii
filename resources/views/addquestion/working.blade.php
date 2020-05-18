<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('images/cat.png')}}">
    <link rel="icon" type="image/png" href="{{asset('images/cat.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Studii - Dashboard
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link href="{{asset('css/paper-dashboard/bootstrap.min.css')}}" rel="stylesheet" />

    <script type="text/x-mathjax-config">
  MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}});
</script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=TeX-MML-AM_CHTML' async></script>

    <style>
        th, td {
            padding: 10px;
            text-align: left;
        }

        .box    {
            background-color: white;
            padding:1em;
            border-radius: 1em;
            margin:1em;
        }

        .margin {
            margin:1em 1em;
        }
    </style>

</head>

<body>
<div class="row w-100" style="background-color: #2F4858; color:white">
    <h2 class="m-4 ml-5">Add Question (4) - Working - Optional</h2>
</div>
<div>
    <div class="mt-4">
        <div class="row">
            <div class="col-md-5">
                <div class="row">

                    <div class="col-md-11 offset-md-1 py-4" style="background-color:#d4d9d6; border-radius: 20px">

                        <p id="display_1">
                            @if (isset($question->contents[0]))
                                {!!$question->contents[0]->content!!}
                            @endif
                        </p>
                        <br>
                        @if ($question->question_image == 1)
                            <img src="/images/question_images/id-{{$question->id}}.jpg?n={{rand(1,10)}}" alt="question_image" style="width:90%">
                        @endif
                        <br><br>
                        <p id="display_2">
                            @if (isset($question->contents[1]))
                                {!!$question->contents[1]-> content!!}
                            @endif
                        </p>
                        <div style="padding-left:20px;">

                            @for($k=2; $k<7; $k++)
                                @if(isset($question->contents[$k]))
                                    <div style="width:100%; margin:8px auto">
                                        <p id="symbol_{{$k+1}}" style="width:7%; display: inline-block; float:left">@if (isset($question->contents[$k])) {!! $question->contents[$k]->symbol() !!} @endif</p>
                                        <p id="display_{{$k+1}}" style="width:90%;display: inline-block">@if (isset($question->contents[$k])) {!! $question->contents[$k]-> content !!} @endif</p>
                                    </div>
                                @endif
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1 offset-1">
                        <span class="font-weight-bold" style="font-size:3em">&#8594;</span>
                    </div>
                    <div class="col-md-10">

                        <div class="box" style="background-color: #e6e8e7; padding: 2em; border-radius: 10px">
                                <p class="d-inline-block mx-1"><b>Answer  {{$symbol}}</b></p>
                            <div style="margin:0.5em auto auto 1em">

                                @foreach($answer_parent->answer_element as $m)
                                    <p style="@if($m -> correct == 1) color:green; @else color:indianred @endif">{!! $m -> answer !!}</p>
                                @endforeach

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="row justify-content-md-center">
                    <div class="col-md-11" style="background-color:#2aa1c0; padding: 2em; border-radius: 10px">
                        <div class="">
                            @foreach($answer_parent->working_parent as $m)
                                @if($m->type == 1)
                                    <div class="box">
                                        <form method="post" action="/question/working/delete">
                                            @csrf
                                            <input type="hidden" name="working_parent_id" value="{{$m->id}}">
                                            <input type="hidden" name="type" value="{{$m->type}}">
                                            <input type="hidden" name="working_text_id" value="{{$m->working_text->id}}">
                                            <input type="submit" value="Delete" class="btn btn-sm ml-auto mr-0 d-block">
                                        </form>
                                        <p class="d-inline-block mx-1">{{$m->working_text->content}}</p>
                                    </div>
                                @elseif ($m->type == 2)
                                    <div class="box">
                                        <form method="post" action="/question/working/delete">
                                            @csrf
                                            <input type="hidden" name="working_parent_id" value="{{$m->id}}">
                                            <input type="hidden" name="type" value="{{$m->type}}">
                                            <input type="hidden" name="working_image_id" value="{{$m->working_image->id}}">
                                            <input type="hidden" name="working_image_name" value="{{$m->working_image->image_name}}">
                                            <input type="submit" value="Delete" class="btn btn-sm ml-auto mr-0 d-block">
                                        </form>
                                        <img src="/images/working_images/{{$m->working_image->image_name}}?rand={{rand(0,1000)}}" style="width: 90%">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <br><hr>
                        <div class="m-3">
                            <p style="color:white">Insert New Working For - <b>Answer {{$symbol}}
                                </b></p>
                            <div id="div_choose">
                                <button class="box d-inline-block" style="width:45%; cursor: pointer;" onclick="choose(1)">
                                        <h3>With Text</h3>
                                </button>
                                <button class="box d-inline-block" style="width:45%; cursor: pointer;" onclick="choose(2)">
                                        <h3>With Image</h3>
                                </button>
                            </div>
                            <div id="choose_1" style="display: none">
                                <button class="btn ml-auto mr-0 d-block" onclick="back()">Back</button>
                                <form class="box" method="post" action="/question/working/text/insert">
                                    @csrf
                                    <div>
                                        <p>Working:</p>
                                        <textarea name="content" class="form-control" rows="3"></textarea>
                                    </div>
                                    <input type="hidden" name="answer_parent_id" value="{{$answer_parent->id}}">
                                    <input type="submit" value="submit" class="btn m-3 d-block ml-auto mr-0">
                                </form>
                            </div>
                            <div id="choose_2" style="display: none">
                                <button class="btn ml-auto mr-0 d-block" onclick="back()">Back</button>
                                <form class="box" method="post" action="/question/working/image/insert" enctype="multipart/form-data">
                                    @csrf
                                    <div>
                                        <p>Image:</p>
                                        <input type="file" name="question_image" accept=".jpg,.jpeg,.png">
                                    </div>
                                    <input type="hidden" name="answer_parent_id" value="{{$answer_parent->id}}">
                                    <input type="submit" value="submit" class="btn m-3 d-block ml-auto mr-0">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card my-4">
                    <div class="card-body">
                        <a href="/question/update/answer/{{$question->id}}" class="btn btn-secondary btn-block">Finish Add Working</a>
                    </div>
                </div>
            </div>
        </div>
        <div style="min-height:200px">
        </div>
    </div>
</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  <!--?-->

<script>
    function choose(x)  {
        document.getElementById('div_choose').style.display = 'none';

        if (x === 1)   {
            document.getElementById('choose_1').style.display = 'block';
        }   else if (x === 2)    {
            document.getElementById('choose_2').style.display = 'block';
        }
    }

    function back() {
        document.getElementById('choose_1').style.display = 'none';
        document.getElementById('choose_2').style.display = 'none';
        document.getElementById('div_choose').style.display = 'block';
    }

    function newTypeset(){
        MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
    }
</script>

`
