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
    <h2 class="m-4 ml-5">Add Question (3)</h2>
</div>
<div>
    <div class="mt-4">
        <div class="row">
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-1">  </div>
                    <div class="col-md-11 py-4" style="background-color:#d4d9d6; border-radius: 20px">
                        <div>
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
                </div>
            </div>
            <div class="col-md-7">
                <div class="row justify-content-md-center">
                    <div class="col-md-11" style="background-color:#2aa1c0; padding: 2em; border-radius: 10px">

                        <?php $i=0; ?>
                        @foreach($question->contents as $n)
                            @if($n->answer_parent != null)
                                @foreach($n->answer_parent as $o)
                                    <div class="box">
                                        <p class="d-inline-block mx-1"><b>Answer {{$n->symbol()}}</b></p>
                                        <form action="/question/add/save/answer/setup/update/{{$question->id}}" class="d-inline-block mx-5">
                                            <input type="hidden" name="answer_parent_id" value="{{$o->id}}">
                                            <input type="submit" class="btn btn-primary" value="Edit">
                                        </form>
                                        <div style="margin:0.5em auto auto 2em">

                                            @foreach($o->answer_element as $m)
                                                <p id="answer_{{$i+1}}_1"
                                                   style="@if($m -> correct == 1) color:green; @else color:indianred @endif">
                                                    {{$m -> answer}}
                                                </p>
                                                <?php $i++; ?>
                                            @endforeach

                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        @endforeach

                        @if(session('answer_parent') == null)
                         <div class="m-3 mt-5">
                             <p style="color:white">Insert New Answer</p>
                             <div class="box">
                                 <form action="/question/add/save/answer/insert">

                                     <div class="w-100 d-flex">
                                         <div class="w-25 p-1">
                                             <p>Which Question</p>
                                             <select name="contentid" class="form-control">
                                                 <option>Select</option>
                                                 @for($i=2; $i<7; $i++)
                                                     @if(isset($question->contents[$i]))
                                                         <option value="{{$question->contents[$i] -> id}}">{{$question->contents[$i]->symbol()}}</option>
                                                     @endif
                                                 @endfor
                                                 @if($question->contents->count() < 3)
                                                     <option selected value="{{$question->contents[0] -> id}}">One Answer</option>
                                                 @endif
                                             </select>
                                         </div>
                                         <div class="w-25 p-1">
                                             <p>Total Answer</p>
                                             <select class="form-control" onchange="change_answer_size(this.value)">
                                                 <option value="0">Select</option>
                                                 <option value="1">2 Possible Answers</option>
                                                 <option value="2">3 Possible Answers</option>
                                                 <option value="3">4 Possible Answers</option>
                                             </select>
                                         </div>
                                         <div class="w-25 p-1">
                                             <p>Correct Answer</p>
                                             <select name="correct" class="form-control">
                                                 <option value="0">Select</option>
                                                 <option id="correct_answer_1" value="1" style="display: none">Answer 1</option>
                                                 <option id="correct_answer_2" value="2" style="display: none">Answer 2</option>
                                                 <option id="correct_answer_3" value="3" style="display: none">Answer 3</option>
                                                 <option id="correct_answer_4" value="4" style="display: none">Answer 4</option>
                                             </select>
                                         </div>
                                     </div>
                                    <div>
                                         <div>
                                             <p style="margin:0.5em;">Answer 1</p>
                                             <textarea id="textarea_answer_1" name="answer[0]" class="form-control"  onkeyup="change(1, this.value)" rows="1" disabled></textarea>
                                         </div>
                                         <div>
                                             <p style="margin:0.5em;">Answer 2</p>
                                             <textarea id="textarea_answer_2" name="answer[1]" class="form-control"  onkeyup="change(2, this.value)" rows="1" disabled></textarea>
                                         </div>

                                         <div>
                                             <p style="margin:0.5em;">Answer 3</p>
                                             <textarea id="textarea_answer_3" name="answer[2]" class="form-control"  onkeyup="change(3, this.value)" rows="1" disabled></textarea>
                                         </div>
                                         <div>
                                             <p style="margin:0.5em;">Answer 4</p>
                                             <textarea id="textarea_answer_4" name="answer[3]" class="form-control"  onkeyup="change(4, this.value)" rows="1" disabled></textarea>
                                         </div>
                                         <input class="btn btn-lg mt-3 mr-2 ml-auto d-block" type="submit" value="Save">
                                    </div>
                                 </form>
                             </div>
                         </div>

                        @else
                            <div class="m-3 mt-5">
                                <p style="color:white">Update Answer</p>
                                <div class="box">
                                    <form action="/question/add/save/answer/update">

                                        <div class="w-100 d-flex">
                                            <div class="w-25 p-1">
                                                <p>Which Question</p>
                                                <select name="contentid" class="form-control">
                                                    @if(session('answer_parent')->content->numbering != 0)
                                                        <option>{{session('answer_parent')->content->symbol()}}</option>
                                                    @else
                                                        <option>One Answer</option>
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="w-25 p-1">
                                                <p>Question Order</p>
                                                <select name="order" class="form-control">
                                                    <option>{{session('answer_parent')->order}}</option>
                                                </select>
                                            </div>
                                            <div class="w-25 p-1">
                                                <p>Total Answer</p>
                                                <select class="form-control" onchange="change_answer_size(this.value)">
                                                    <option value="">Select</option>
                                                    <option value="{{session('answer_parent')->answer_element->count()-1}}">{{session('answer_parent')->answer_element->count()}} Possible Answer</option>
                                                </select>
                                            </div>
                                            <div class="w-25 p-1">
                                                <p>Correct Answer</p>
                                                <select name="correct" class="form-control">
                                                    <option value="0">Select</option>
                                                    <option id="correct_answer_1" value="1" style="display: none">Answer 1</option>
                                                    <option id="correct_answer_2" value="2" style="display: none">Answer 2</option>
                                                    <option id="correct_answer_3" value="3" style="display: none">Answer 3</option>
                                                    <option id="correct_answer_4" value="4" style="display: none">Answer 4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div>
                                            <div>
                                                <p style="margin:0.5em;">Answer 1</p>
                                                <textarea id="textarea_answer_1" name="answer[0]" class="form-control"  onkeyup="change(1, this.value)" rows="1" disabled>@if(isset(session('answer_parent')->answer_element[0])) {{session('answer_parent')->answer_element[0]->answer}} @endif</textarea>
                                            </div>
                                            <div>
                                                <p style="margin:0.5em;">Answer 2</p>
                                                <textarea id="textarea_answer_2" name="answer[1]" class="form-control"  onkeyup="change(2, this.value)" rows="1" disabled>@if(isset(session('answer_parent')->answer_element[1])) {{session('answer_parent')->answer_element[1]->answer}} @endif</textarea>
                                            </div>

                                            <div>
                                                <p style="margin:0.5em;">Answer 3</p>
                                                <textarea id="textarea_answer_3" name="answer[2]" class="form-control"  onkeyup="change(3, this.value)" rows="1" disabled>@if(isset(session('answer_parent')->answer_element[2])) {{session('answer_parent')->answer_element[2]->answer}} @endif</textarea>
                                            </div>
                                            <div>
                                                <p style="margin:0.5em;">Answer 4</p>
                                                <textarea id="textarea_answer_4" name="answer[3]" class="form-control"  onkeyup="change(4, this.value)" rows="1" disabled>@if(isset(session('answer_parent')->answer_element[3])) {{session('answer_parent')->answer_element[3]->answer}} @endif</textarea>
                                            </div>
                                            <input type="hidden" name="answer_parent_id" value="{{session('answer_parent')->id}}">
                                            <input class="btn btn-lg mt-3 mr-2 ml-auto d-block" type="submit" value="Save">
                                        </div>
                                    </form>
                                </div>
                            </div>

                        @endif
                    </div>
                </div>
                <div class="card my-4">
                    <div class="card-body">
                        <a href="/question/publish/{{$question->id}}" class="btn btn-lg btn-primary btn-block">Publish Question</a>
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
    function change_answer_size(x) {
        let t1 = document.getElementById('textarea_answer_1');
        let t2 = document.getElementById('textarea_answer_2');
        let t3 = document.getElementById('textarea_answer_3');
        let t4 = document.getElementById('textarea_answer_4');

        let c1 = document.getElementById('correct_answer_1');
        let c2 = document.getElementById('correct_answer_2');
        let c3 = document.getElementById('correct_answer_3');
        let c4 = document.getElementById('correct_answer_4');

        t1.disabled = false;
        t2.disabled = false;

        c1.style.display = 'block';
        c2.style.display = 'block';

        if (x === '1')  {
            t3.disabled = true;
            t4.disabled = true;
            t3.style.backgroundColor = 'grey';
            t4.style.backgroundColor = 'grey';

            c3.style.display = 'none';
            c4.style.display = 'none';

        }   else if (x === '2') {
            t3.disabled = false;
            t4.disabled = true;
            t3.style.backgroundColor = 'white';
            t4.style.backgroundColor = 'grey';

            c3.style.display = 'block';
            c4.style.display = 'none';

        }   else    {
            t3.disabled = false;
            t4.disabled = false;
            t3.style.backgroundColor = 'white';
            t4.style.backgroundColor = 'white';

            c3.style.display = 'block';
            c4.style.display = 'block';
        }
    }
</script>

