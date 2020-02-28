@extends('layouts.dashboardApp')

@section('dashboard-name')
    teacher's dashboard
@endsection

@section('side-nav')
    <ul class="nav">
        <li>
            <a href="/teacher">
                <p>Dashboard</p>
            </a>
        </li>
        <li>
            <a href="/teacher/details">
                <p>User details</p>
            </a>
        </li>
        <li class="active">
            <a href="/teacher/question">
                <p>Add Question</p>
            </a>
        </li>
        <li>
            <a href="/teacher/performance">
                <p>Performance</p>
            </a>
        </li>
    </ul>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-10">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <h5><b>Note :</b> Right now, the process to input questions into the database is still manual. This is because we still need to check for bugs and errors.<br><br>
                            So, for you, we will upload your exercise questions ourselves. You just need to submit your exercise questions to us through email and the rest will be taken care by us.</h5>
                        <h4 class="text-center"><b>syazanizul@gmail.com</b><br>Syazani Zulkhairi</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-10">
        <div class="card">
            <div class="card-header">
                <h3 class="">Contribute Question</h3>
            </div>
            <div class="card-body">
                <div class="row justify-content-center pt-3">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="/question/add" class="btn btn-primary btn-lg btn-block" disabled>Add New</a>
                            </div>
                        </div>
                    </div>
                </div>

                <br><br>

{{--                <div class="table-responsive">--}}
                <div class="">
                    <h4 class="text-primary">Questions in draft</h4>

                @if(\App\Question::where('submitted_by1', Auth::user()->id)->where('finished',0)->get()-> isNotEmpty())
{{--                    @if(!$data['list_draft_question'] -> isEmpty())--}}
                    <table class="table">
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
                                Question ID
                            </th>
                            <th class="text-right">
                                Action
                            </th>
                        </thead>
                        <tbody>

                        @foreach(\App\Question::where('submitted_by1', Auth::user()->id)->where('finished',0)->get() as $m)
{{--                            {{dd($m->chapter)}}--}}
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{\App\Question::give_subject_name($m->subject)}}</td>
                                <td>{{\App\Question::give_chapter_name($m->subject)}}</td>
                                <td>{{$m->id}}</td>
                                <td class="text-right"><a href="/question/update/{{$m->id}}" class="btn btn-primary" disabled>Continue</a></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    @else
                    <p>None</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-7">
        <div class="card card-stats">
            <div class="card-header">
                <h4 class="my-1">Finished Questions</h4>
            </div>
            <div class="card-body ">
                <table class="table">
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
                        Question ID
                    </th>
                    <th class="text-right">
                        Action
                    </th>
                    </thead>
                    <tbody>



                    @foreach(\App\Question::where('submitted_by1', Auth::user()->id)->where('submitted_by1', Auth::id())-> where('finished',1)->get() as $n)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{\App\Question::give_subject_name($n->subject)}}</td>
                            <td>{{\App\Question::give_chapter_name($n->chapter)}}</td>
                            <td>{{$n->id}}</td>
                            <td class="text-right"><a href="/teacher/question/go-practicelink/{{$n->id}}" class="btn btn-primary">Show</a></td>
                            <td class="text-right"><a href="/question/update/{{$n->id}}" class="btn btn-primary" disabled>Edit</a></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="numbers">
                            <p class="card-category">Total Questions Submitted</p>
                            <p class="card-title">{{\App\Question::where('submitted_by1', Auth::user()->id)->count()}}
                            <p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                    <i class="fa fa-refresh"></i> Updated Today
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
