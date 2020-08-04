@extends('dashboard.admin.adminApp')

@section('dashboard-name')
    admin's dashboard
@endsection

@section('link-in-head')
    <link rel="stylesheet" href="{{asset('css/alertify/alertify.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/alertify/default.min.css')}}" />
@endsection

@section('nav-question-database')
    class="active"
@endsection

@section('content')
    <div>
        <div class="row" style="min-height:450px">
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
            @endif
        </div>
        <div class="row">
            <div class="col-lg-10">
                <div class="card card-stats">
                    <div class="card-body table-responsive">
                        <table class="table mx-4" style="height:400px;">
                            <thead class=" text-primary">
                                <th>ID</th>
                            </thead>
                        </table>
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
