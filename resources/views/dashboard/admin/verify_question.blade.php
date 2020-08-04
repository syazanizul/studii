@extends('dashboard.admin.adminApp')

@section('dashboard-name')
    admin's dashboard
@endsection

@section('link-in-head')
    <script type="text/x-mathjax-config">
        MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}});
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=TeX-MML-AM_CHTML' async></script>
@endsection

@section('nav-verify-question')
    class="active"
@endsection

@section('content')
    <div class="row">
        @if(isset($question))
            <div class="col-lg-8" style="font-size: 1.3em">
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
                    @foreach($question->contents as $n)
                        @if($n->answer_parent != null)
                            @foreach($n->answer_parent as $o)
                                <div class="col-lg-4" style="font-size: 1.15em">
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
                            @endforeach
                        @endif
                    @endforeach
                </div>
                <div class="row">
                    @foreach($question->contents as $n)
                        @if($n->answer_parent != null)
                            @foreach($n->answer_parent as $o)
                                <div class="col-lg-12">
                                    @if($o->working_parent->count() !== 0)
                                    <div class="card card-stats">
                                        <div class="card-body ">
                                            <p><b>Working {{$n->symbol()}}</b></p>
                                            <hr>
                                            @foreach($o->working_parent as $p)
                                                @if($p->type == 1)
                                                    <p>{{$p->working_text->content}}</p>
                                                @elseif($p->type == 2)
                                                    <img src="/images/working_images/{{$p->working_image->image_name}}?rand={{rand(0,1000)}}" style="width:100%">
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                        @endif
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
        @else
            <div class="col-lg-8">
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
        <div class="col-lg-4">
            @if(isset($question))
                <div class="row">
                    <div class="col">
                        @if($question->verified == 0)
                            <a href="/admin/verify-question/verify/{{$question->id}}" class="btn btn-lg btn-primary btn-block my-3">VERIFY THIS QUESTION</a>
                            <a href="/question/update/{{$question->id}}" class="btn btn-lg btn-primary btn-block my-3">edit question</a>
                        @else
                            <p class="font-weight-bold text-center my-3">Verified</p>
                        @endif
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-stats">
                        <div class="card-body table-responsive" style="max-height:600px; overflow:auto">
                            <table class="table mx-4">
                                <thead class=" text-primary">

                                <th>Q ID</th>
                                <th>Status</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($all_question as $m)
                                    <tr>
                                        <td>{{$m->id}}</td>
                                        <td>

                                        </td>
                                        <td>
                                            <a href="/admin/verify-question?qid={{$m->id}}" class="btn">See Question</a>
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
@endsection

@section('modal')
@endsection

<script>
    @section('script')
    @endsection
</script>
