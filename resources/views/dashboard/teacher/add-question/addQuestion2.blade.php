@extends('dashboard.teacher.teacherApp')

@section('link-in-head')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;1,400&display=swap');

        .div-link:hover {
            border:2px solid #42b3f5;
        }
    </style>
@endsection

@section('dashboard-name')
    Contribute Set
@endsection

@section('nav-submit-question')
    class="active"
@endsection

@section('content')

    <h2>Contribute Set Of Questions - <span class="font-weight-bold">With Help</span></h2>
    <div class="row">
        <div class="col-lg-11">
            <div class="card">
                <div class="card-header">
                    <p style="font-size:1.8em">What is <span class="font-weight-bold">Contribute With Help</span>?</p>
                    <p style="font-size:1.50em; font-family: 'Rubik', sans-serif;">You submit your set of questions to us in a <span class="font-weight-bold">Microsoft Word file</span>, in which then will be uploaded by our team.</p>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    <p class="font-weight-bold" style="font-size:1.8em">Contribute a new set</p>
                    <a class="btn btn-primary btn-block btn-lg" href="/teacher/set/template">Contribute New Set</a>
                </div>
            </div>
        </div>
    </div>
    @if($question_set->isNotEmpty())
        <div class="row">
            <div class="col-lg-11">
                <div class="card">
                    <div class="card-header">
                        <p class="font-weight-bold" style="font-size:1.8em">Status set:</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <tr>
                                        <th>Set ID</th>
                                        <th>Set Name</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($question_set as $m)
                                    <tr>
                                        <td>{{$m->id}}</td>
                                        <td>{{$m->file_name_actual}}</td>
                                        <td>{{$m->created_at}}</td>

                                        @if($m->upload_status == 1)
                                            @if($m->verified_by_submitter == 1)
                                                <td>Uploaded & Verified</td>
                                            @else
                                                <td>Uploaded but Not Verified</td>
                                            @endif
                                        @else
                                            <td>Not Uploaded</td>
                                        @endif

                                        @if($m->upload_status == 1)
                                            @if($m->verified_by_submitter == 1)
                                                <td><a href="/teacher/set/see/{{$m->id}}" class="btn btn-primary btn-block">See</a></td>
                                            @else
                                                <td><a href="/teacher/set/see/{{$m->id}}" class="btn btn-primary btn-block">Verify</a></td>
                                            @endif
                                        @else
                                            <td>-</td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
