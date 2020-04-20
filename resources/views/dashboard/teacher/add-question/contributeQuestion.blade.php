@extends('dashboard.teacher.teacherApp')

@section('link-in-head')
    <style>
        .div-link:hover {
            border:2px solid #42b3f5;
        }
    </style>
@endsection

@section('dashboard-name')
    teacher's dashboard
@endsection

@section('nav-submit-question')
    class="active"
@endsection

@section('content')
{{--<div class="row">--}}
{{--    <div class="col-lg-10">--}}
{{--        <div class="card card-stats">--}}
{{--            <div class="card-body ">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-12 col-md-12">--}}
{{--                        <h5><b>Note :</b> Right now, the process to input questions into the database is still manual. This is because we still need to check for bugs and errors.<br><br>--}}
{{--                            So, for you, we will upload your exercise questions ourselves. You just need to submit your exercise questions to us through email and the rest will be taken care by us.</h5>--}}
{{--                        <h4 class="text-center"><b>syazanizul@gmail.com</b><br>Syazani Zulkhairi</h4>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


<h2>Guidelines & Notice</h2>
<div class="row">
    <div class="col-lg-5">
        <a href="/teacher/instruction/process-upload-questions">
            <div class="card card-stats div-link">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <h5>You can read about the process to add questions into Studii here.</h5>
                            </div>
                        </div>
                    </div>
            </div>
        </a>
    </div>
    <div class="col-lg-6">
        <a href="#under-development">
            <div class="card card-stats div-link">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <h5>You are valid for Studii's <i>Early Involvement Offer</i> ! Click here to know more about it.</h5>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-6">
        <a href="/teacher/instruction/disclaimer">
            <div class="card card-stats div-link">
                <div class="card-body m-3">
                    <div class="row">
                        <div class="col-lg-12 m-0">
                            <h4 class="my-1"><b>Disclaimer - Add Question</b></h4>
                            <h5>Read this before submit your questions</h5>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<br><br>

<h2>Submit Question into Studii</h2>
<div class="row">
    <div class="col-sm-5">
        <div class="card">
            <div class="card-header">
                <h3 class="">Submit and Upload Manually</h3>
                <div style="font-size: 1.1em">
                    <p>Created by : <b>You</b></p>
                    <p>Uploaded by : <b>You</b></p>
                    <p>Complexity : <b>Complex</b> (require HTML and Mathjax skills)</p>
                    <p>You maximise <b>earning</b>, but you have to <b>upload it yourself</b>.</p>
                    <a href="/question/add" class="btn btn-primary btn-lg btn-block">Upload</a>
                    <p class="text-center">As of the <i>Early Involvement Offer</i>, this method is not recommended.</p>
                </div>
            </div>

        </div>
    </div>
    <div class="col-sm-5">
        <div class="card">
            <div class="card-header">
                <h3 class="">Upload With Help</h3>
                <div style="font-size: 1.1em">
                    <p>Created by : <b>You</b></p>
                    <p>Uploaded by : <b>Someone else</b></p>
                    <p>Complexity : Simple </p>
                    <p>You <b>don't have to upload yourself</b>, but you have to <b>share a portion of the earning</b>.</p>
                    <a href="/teacher/upload/with-help" class="btn btn-primary btn-lg btn-block">Upload</a>
                    <p class="text-center">As of the <i>Early Involvement Offer</i>, you will own the other portion also.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<br><br>
<h2>Submitted Questions</h2>

<div class="row">
    <div class="col-sm-10">
        <div class="card">
            <div class="card-header">
                <h3 class="">Questions in draft</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                @if($draft->get()-> isNotEmpty())
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

                        @foreach($draft->get() as $m)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$m->subject_name->name}}</td>
                                <td>{{$m->chapter_name->name}}</td>
                                <td>{{$m->id}}</td>
                                <td class="text-right"><a href="/question/update/{{$m->id}}" class="btn btn-primary">Continue</a></td>
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
{{--    <div class="col-lg-7">--}}
{{--        <div class="card card-stats">--}}
{{--            <div class="card-header">--}}
{{--                <h4 class="my-1">Finished Questions</h4>--}}
{{--            </div>--}}
{{--            <div class="card-body ">--}}
{{--                <table class="table">--}}
{{--                    <thead class=" text-primary">--}}
{{--                    <th>--}}
{{--                        No--}}
{{--                    </th>--}}
{{--                    <th>--}}
{{--                        Subject--}}
{{--                    </th>--}}
{{--                    <th>--}}
{{--                        Chapter--}}
{{--                    </th>--}}
{{--                    <th>--}}
{{--                        Question ID--}}
{{--                    </th>--}}
{{--                    <th class="text-right">--}}
{{--                        Action--}}
{{--                    </th>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}



{{--                    @foreach(\App\Question::where('submitted_by1', Auth::user()->id)->where('submitted_by1', Auth::id())-> where('finished',1)->get() as $n)--}}
{{--                        <tr>--}}
{{--                            <td>{{$loop->iteration}}</td>--}}
{{--                            <td>{{\App\Question::give_subject_name($n->subject)}}</td>--}}
{{--                            <td>{{\App\Question::give_chapter_name($n->chapter)}}</td>--}}
{{--                            <td>{{$n->id}}</td>--}}
{{--                            <td class="text-right"><a href="/teacher/question/go-practicelink/{{$n->id}}" class="btn btn-primary">Show</a></td>--}}
{{--                            <td class="text-right"><a href="/question/update/{{$n->id}}" class="btn btn-primary" disabled>Edit</a></td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}

{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="col-lg-4">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="numbers">
                            <p class="card-category">Total Questions Submitted</p>
                            <p class="card-title">{{$question_done}}
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
