<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">

<script type="text/x-mathjax-config">
  MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}});
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=TeX-MML-AM_CHTML' async></script>

<style>
    .margin {
        margin:1em 1em;
    }

    .box    {
        background-color: white;
        padding:1em;
        border-radius: 1em;
    }

    table {
        border-collapse: collapse;
    }

    table, th, td {
        border: 1px solid black;
    }
</style>


<section class="hero is-primary">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                Add Question (3)
            </h1>
            <a class="is-pulled-right" href="/">Back to Home</a>
        </div>
    </div>
</section>

<div class="section">
    <div class="container">
        <div class="field">
            <div class="columns">
                <div class="column">
                    <div style="background-color: #d4d9d6; padding: 1.5em">
                        <p id="display_1">
                            @if (isset($contents[0]))
                                {!! $contents[0]-> content !!}
                            @endif
                        </p>
                        <br>
                        @if ($image == 1)
                            <img src="/images/question_images/id-{{$id}}.jpg" alt="question_image">
                        @endif
                        <br><br>
                        <p id="display_2">
                            @if (isset($contents[1]))
                                {!! $contents[1]-> content !!}
                            @endif
                        </p>
                        <div style="padding-left:20px;">

                            @for($k=2; $k<7; $k++)
                                <div>
                                    @if (isset($contents[$k]))
                                        <p style="width:5%; display: inline-block">{{$symbol_finished[$k]}}</p>
                                        <p id="display_{{$k+1}}" style="display: inline-block">{!! $contents[$k]-> content !!}</p>
                                    @endif
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="column" style="background-color: #2aa1c0; padding: 2em;">

                    @for($i=0; $i<7; $i++)
                        @if(isset($answers[$i]))
                            <div class="box">
                                <p><b>Answer {{$symbol_finished[$i]}}</b></p>
                                <div style="margin:0.5em auto auto 2em">
                                    <p id="answer_{{$i+1}}_1" style="
                                    @if($answers[$i][0] -> correct == 1) color:green; @else color:indianred @endif
                                    ">{{$answers[$i][0] -> answer}}</p>

                                    <p id="answer_{{$i+1}}_2" style="
                                    @if($answers[$i][1] -> correct == 1) color:green; @else color:indianred @endif
                                    ">{{$answers[$i][1] -> answer}}</p>

                                    @if(isset($answers[$i][2]))
                                        <p id="answer_{{$i+1}}_3" style="
                                        @if($answers[$i][2] -> correct == 1) color:green; @else color:indianred @endif
                                            ">{{$answers[$i][2] -> answer}}</p>
                                    @endif

                                    @if(isset($answers[$i][3]))
                                        <p id="answer_{{$i+1}}_4" style="
                                        @if($answers[$i][3] -> correct == 1) color:green; @else color:indianred @endif
                                            ">{{$answers[$i][3] -> answer}}</p>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endfor

                </div>
            </div>
        </div>
    </div>
</div>

<div style="height:400px;">

</div>

<div style="background-color: #0e647d; min-height:50px; position: sticky; bottom:0px">
    <div class="columns">
        <div class="column margin" style="margin-left: 2em">
            <div>
                <p style="color:white; display: inline-block">Question Number</p>
                @if(Session::has('exist') && Session('exist') == 1)
                    <p style="color:#fcba03; display: inline-block">&nbsp&nbsp Update</p>
                @elseif (Session::has('exist') && Session('exist') == 0)
                    <p style="color:#fcba03; display: inline-block">&nbsp&nbsp New</p>
                @endif
                <form action="/question/add/check/answer/{{$id}}">
                    <select name="contentid" id="contentid" class="input" onchange="this.form.submit()">
                        <option value="0"> - </option>

                        @for($i=2; $i<7; $i++)
                            @if(isset($contents[$i]))
                                <option value="{{$contents[$i] -> id}}" {{ (old('contentid')) == $contents[$i] -> id ? 'selected' : '' }}>{{$symbol_finished[$i]}}</option>
                            @endif
                        @endfor
                        @if(!isset($contents[2]))
                            <option selected value="{{$contents[0] -> id}}">One Answer</option>
                        @endif
                    </select>
                </form>
            </div>
            <div>
                <p style="color:white; display: inline-block">Question Size</p>
                <select class="input" onchange="change_answer_size(this.value)">
                    <option value="0">Chooose</option>
                    <option value="1">2 possible answer</option>
                    <option value="2">3 possible answer</option>
                    <option value="3">4 possible answer</option>
                </select>
            </div>
        </div>
        <form class="column margin is-four-fifths" action="/question/add/save/answer/{{$id}}">
            <div class="columns">
                <div class="column">
                    <div>
                        <p style="color:white; width:30%; display: inline-block; padding-top: 1em">Correct</p>
                        <select name="correct" class="margin input" style="width: 100%; display: inline-block">
                            <option>-</option>
                            <option @if (Session::has('correct') && session('correct') == 1) selected @endif>1</option>
                            <option @if (Session::has('correct') && session('correct') == 2) selected @endif>2</option>
                            <option @if (Session::has('correct') && session('correct') == 2) selected @endif>3</option>
                            <option @if (Session::has('correct') && session('correct') == 2) selected @endif>4</option>
                        </select>
                    </div>
                </div>
                <div class="column is-two-fifths">
                    <div>
                        <p style="margin:0.5em; color:white;">Answer 1</p>
                        <textarea id="textarea_answer_1" name="answer1" class="input" onkeyup="change(1, this.value)" disabled>@if(Session::has('content1')) {{session('content1')}} @endif</textarea>
                    </div>
                    <div>
                        <p style="margin:0.5em; color:white;">Answer 2</p>
                        <textarea id="textarea_answer_2" name="answer2" class="input" onkeyup="change(2, this.value)" disabled>@if(Session::has('content2')) {{session('content2')}} @endif</textarea>
                    </div>
                </div>
                <div class="column is-two-fifths">
                    <div>
                        <p style="margin:0.5em; color:white;">Answer 3</p>
                        <textarea id="textarea_answer_3" name="answer3" class="input" onkeyup="change(3, this.value)" disabled>@if(Session::has('content3')) {{session('content3')}} @endif</textarea>
                    </div>
                    <div>
                        <p style="margin:0.5em; color:white;">Answer 4</p>
                        <textarea id="textarea_answer_4" name="answer4" class="input" onkeyup="change(4, this.value)" disabled>@if(Session::has('content4')) {{session('content4')}} @endif</textarea>
                    </div>
                </div>

                <input type="hidden" name="contentid" value="@if(Session::has('contentid')) {{session('contentid')}} @endif">
                <input type="hidden" name="new" value="@if(Session::has('new')) {{session('new') }} @endif">

                <div class="column" style=" margin-right:1em;">
{{--                    @if(!isset($contents[2]))       <!--If contents has no a), b), c) etc-->--}}
{{--                        <input type="hidden" name="contentid" value="{{$contents[0] -> id}}">--}}
{{--                    @endif--}}

{{--                    NI SPECIAL CASE KALAU FIRST KEY IN (NEW) DAN BUKAN A) B) C)--}}
                    @if(!isset($answers[0]) && !isset($contents[2]))
                        <input type="hidden" name="contentid" value="{{$contents[0] -> id}}">
                        <input type="hidden" name="new" value="1">
                    @endif

                    @if(isset($answers[0]) && !isset($contents[2]))
                        <input type="hidden" name="contentid" value="{{$contents[0] -> id}}">
                        <input type="hidden" name="new" value="0">
                    @endif

                    <input type="submit" class="button is-large" style="margin:0.5em 0.5em 0.2em 0.5em" value="save">
                    <a href="/question/publish/{{$id}}" class="button" style="margin:0.2em 0.5em 0.5em 0.5em">Publish!</a>
                    <a class="button" href="/question/update/{{$id}}" style="margin:0.1em">Back to edit</a>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    function change(x, y) {
        let content = document.getElementById('contentid').selectedIndex;
        let id = "answer_" + content + "_" + x;
        // document.write(id);
        document.getElementById(id).innerText = y;
    }

    function change_answer_size(x) {
        let t1 = document.getElementById('textarea_answer_1');
        let t2 = document.getElementById('textarea_answer_2');
        let t3 = document.getElementById('textarea_answer_3');
        let t4 = document.getElementById('textarea_answer_4');

        t1.disabled = false;
        t2.disabled = false;

        if (x === '1')  {
            t3.disabled = true;
            t4.disabled = true;
            t3.style.backgroundColor = 'grey';
            t4.style.backgroundColor = 'grey';

        }   else if (x === '2') {
            t3.disabled = false;
            t4.disabled = true;
            t3.style.backgroundColor = 'white';
            t4.style.backgroundColor = 'grey';

        }   else    {
            t3.disabled = false;
            t4.disabled = false;
            t3.style.backgroundColor = 'white';
            t4.style.backgroundColor = 'white';
        }
    }

</script>
