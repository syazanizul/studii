@extends('dashboard.teacher.teacherApp')

@section('nav-submit-question')
    class="active"
@endsection

@section('link-in-head')
    <script type="text/x-mathjax-config">
        MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}});
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=TeX-MML-AM_CHTML' async></script>

    <style>
        .div-link:hover {
            border:2px solid #42b3f5;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <p style="font-size:2.5em">Question for this set</p>
        </div>
        @if(isset($question_set))
        <div class="col-lg-1"></div>
        <div class="col-lg-5">
            <p class="my-2 text-right d-inline-block">
                File name : <br>
                <span class="font-weight-bold">{{$question_set->file_name_actual}}</span>
            </p>
            <a href="{{asset('/storage/question_set/'.$question_set->file_name_actual)}}" class="btn btn-secondary my-1 mx-4 d-inline-block" download>download file</a>
        </div>
        <div class="col-lg-2">
            <div>
                <a href="/teacher/set" class="btn btn-primary btn-lg float-right mx-4 m-3 d-inline-block">Back</a>
            </div>
        </div>
        @endif
    </div>
    <div class="row">
        @if(isset($question))
            <div class="col-lg-7" style="font-size: 1.3em">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-stats">
                            <div class="card-body ">
                                <div>
                                    <p>
                                        @if (isset($question->contents[0]))
                                            {!!$question->contents[0]->content!!}
                                        @endif
                                    </p>
                                    <br>
                                    @if ($question->question_image == 1)
                                        <img src="/images/question_images/id-{{$question->id}}.jpg?<?php rand(1, 15)?>" alt="question_image" style="width:100%">
                                        <br><br>
                                    @else
                                        <br>
                                    @endif
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
                            <div class="card-footer ">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php $i=1?>
                    <?php $j=1?>
                    @foreach($question->contents as $n)
                        @if($n->answer_parent != null)
                            @foreach($n->answer_parent as $o)
                                <div class="col-lg-4" style="font-size: 1.3em">
                                    <div class="card card-stats">
                                        <div class="card-body ">
                                            <p><b>Answer {{$n->symbol()}}</b></p>
                                            <hr>
                                            @foreach($o->answer_element as $m)
                                                <p @if($m->correct == 1) style="color:green" @else style="color:red" @endif>{!!$m -> answer!!}</p>
                                            @endforeach
                                        </div>
                                        <div class="card-footer">

                                        </div>
                                    </div>
                                </div>
                                <?php $i++?>
                                <?php $j++?>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
        @else
            <div class="col-lg-7">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div>
                            <p><b>................................ See question by clicking button on the right ..................................</b></p>
                            <br>

                            <p id="display_2">......................................................................................................</p>
                            <div style="padding-left:20px;">
                                <p>..........................</p>
                                <p>.................</p>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                    </div>
                </div>
            </div>
        @endif
        <div class="col-lg-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-stats">
                        <div class="card-body table-responsive">
                            <table class="table mx-4">
                                <thead class=" text-primary">
                                <tr>
                                    <th>Q ID</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($question_set_element->get() as $m)
                                    <tr>
                                        <td>{{\App\Question::find($m->question_id)->id}}</td>
                                        <td>
                                            @if($m->upload_status == 0)
                                                <span style="color:red">Haven't Finished</span>
                                            @else
                                                <span style="color:green">Uploaded</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/teacher/set/see/{{$m->question_set_id}}/show-question?qid={{$m->question_id}}" class="btn btn-primary">See</a>
{{--                                            @if($m->upload_status == 0)--}}
{{--                                                <a href="/question/update/{{$m->question_id}}" class="btn">Edit</a>--}}
{{--                                            @endif--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer ">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            @if(isset($question_set))
                @if($question_set->verified_by_submitter == 0)
                    <p class="text-right mt-3" style="font-size:1.25em">If the uploaded questions above match with what you have submitted in your Microsoft Word Docx, you can verify this set</p>
                @endif
            @endif
        </div>
        <div class="col-lg-6">
            @if(isset($question_set))
                @if($question_set->verified_by_submitter == 0)
                    <form action="/teacher/submission-status/verify/set-parent/{{$question_set->id}}" method="post">
                        @csrf
                        <input type="submit" value="Verify this set of questions uploaded to be correct" class="btn btn-primary btn-lg btn-block">
                    </form>
                @else
                    <p class="font-weight-bold text-center">Set is verified</p>
                @endif
            @endif
        </div>
    </div>


@endsection

@section('modal')

@endsection

<script>
    @section('script')

    function newTypeset(){
        MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
    }
    @endsection
</script>

