@extends('dashboard.tutor.tutorApp')

@section('nav-contribute')
    class="active"
@endsection

@section('link-in-head')
    <style>
        .div-link:hover {
            border:2px solid #42b3f5;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <p style="font-size:2.5em">Question for this set</p>
        </div>
        <div class="col-lg-4">
            <a href="/tutor/contribute" class="btn btn-primary float-right btn-lg m-4">Back</a>
        </div>
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
                                                <span style="color:red">Not Uploaded</span>
                                            @else
                                                <span style="color:green">Uploaded</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($m->upload_status == 0)
                                                <a href="/tutor/contribute/see-set/{{$m->question_set_id}}/show-question?qid={{$m->question_id}}" class="btn btn-primary">See</a>
                                                <a href="/question/update/{{$m->question_id}}" class="btn">Edit</a>
                                            @else
                                                <a href="/tutor/contribute/see-set/{{$m->question_set_id}}/show-question?qid={{$m->question_id}}" class="btn btn-primary">See</a>
                                            @endif
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

