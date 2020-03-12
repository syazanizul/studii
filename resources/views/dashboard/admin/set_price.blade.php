@extends('layouts.dashboardApp')

@section('dashboard-name')
    Set Price
@endsection

@section('link-in-head')
    <link rel="stylesheet" href="{{asset('css/alertify/alertify.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/alertify/default.min.css')}}" />

    <script src="js/alertify/alertify.min.js"></script>

    <script type="text/x-mathjax-config">
        MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}});
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/latest.js?config=TeX-MML-AM_CHTML' async></script>
@endsection

@section('side-nav')
    <ul class="nav">
        <li>
            <a href="/admin">
                <p>Dashboard</p>
            </a>
        </li>
        <li class="active">
            <a href="/admin/set-price">
                <p>Set Price</p>
            </a>
        </li>
    </ul>
@endsection

@section('content')
    <div data-step="1" data-intro="This is your dashboard, where you can find all the relevant information.">

        <div class="row my-2">
        </div>

        @if(isset($question_list))
        <div class="row">
            <div class="col-lg-10">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <table class="table mx-4">
                                <thead class=" text-primary">
                                    <th>
                                        No
                                    </th>
                                    <th>
                                        Subject
                                    </th>
                                    <th>
                                        Chapter
                                    </th>
                                    <th>
                                        QID
                                    </th>
                                    <th>
                                        Created By
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </thead>
                                <tbody>

                                @foreach($question_list as $m)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$m->subject_name->name}}</td>
                                        <td>{{$m->chapter_name->name}}</td>
                                        <td>{{$m->id}}</td>
                                        <td>{{$m->creator_info->firstname}} {{$m->creator_info->lastname}}</td>
                                        <td><a href="/admin/set-price?a={{$m->id}}" class="btn btn-primary">Add Price</a></td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer ">

                    </div>
                </div>
            </div>
        </div>
        @else

            <div class="row">
                <div class="col-lg-10" style="font-size: 1.3em">
                    <div class="card card-stats">
                        <div class="card-body ">

                            <div>
{{--                                <p>Creator : <b>{{$question->creator_info->firstname}} {{$question->creator_info->lastname}}</b></p>--}}
{{--                                <p>Subject : <b>{{$question->subject_name->name}}</b></p>--}}
{{--                                <p>Chapter : <b>{{$question->chapter_name->name}}</b></p>--}}
{{--                                <p>Q ID : <b>{{$question->id}}</b></p>--}}
                            </div>

                        </div>
                        <div class="card-footer ">

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-10" style="font-size: 1.3em">
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
            <form action="/admin/set-price/save" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-7" style="font-size: 1.3em">
                        <div class="card card-stats">
                            <div class="card-body ">
                                <p>Price:</p>
                                <input class="form-control" type="number" name="price" style="height: 40px" min="0" max="2" step="0.01">
                                {{--                            <input class="form-control-range" type="range" id="points" name="points" min="0" max="10" style="height: 40px">--}}
                            </div>
                            <div class="card-footer ">

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <input type="hidden" name="qid" value="{{$question->id}}">
                        <button class="btn btn-primary btn-block btn-lg" type="submit">Save Price</button>
                    </div>
                </div>
            </form>


        @endif

    </div>
@endsection

@section('modal')

    {{--    @if($noti[1] == 1)--}}

    {{--     @endif--}}

@endsection

<script>
    @section('script')
    @endsection
</script>
