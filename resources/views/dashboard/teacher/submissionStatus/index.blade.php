@extends('dashboard.teacher.teacherApp')

@section('dashboard-name')
    teacher's dashboard
@endsection

@section('nav-submission-status')
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
    @if($question_set->count() == 0)
        <div class="row">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="">You haven't submitted any submission yet. Go to <b><a href="/teacher/upload/with-help">Add Question - With Help</a></b> to contribute to
                            Studii's libary now.</h5>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-header">
                    <h3 class="">Submission Status</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class=" text-primary">
                        <th>No</th>
                        <th>File Name</th>
                        <th>Uploaded At</th>
                        <th>Status</th>
                        </thead>
                        <tbody>

                        @foreach($question_set->get() as $m)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$m -> file_name_actual}}</td>
                                <td>{{$m -> created_at}}</td>

                                @if($m -> upload_status == 1)
                                    @if($m -> verified_by_submitter == 1)
                                        <td>Uploaded & Verified</td>
                                    @else
                                        <td>Uploaded & Not Verified <br><a href="/teacher/submission-status/verify/set-parent/{{$m->id}}" class="btn btn-primary m-1">Verify this set</a></td>

                                    @endif
                                @else
                                    <td>Still in process</td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @if($question_set->count() == 0)
                        <p>None</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if($statement1 == 1)
        <div class="row">
            <div class="col">
                <br>
                <h2>Verify Uploaded Questions</h2>
            </div>
        </div>
    @endif
    <div class="row">
        @foreach($question_set->get() as $m)
            @if($m->question_set_element->where('upload_status', 1)->where('verified_by_submitter', 0)->isNotEmpty())
                <div class="col-sm-5">
                    <a href="/teacher/submission-status/{{$m->id}}">
                        <div class="card card-stats div-link">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <h2>{{$m -> file_name_actual}}</h2>
                                        <p>{{$m -> created_at}}</p>
                                    </div>
                                    <div class="col-lg-4">
                                        <h2><b>{{$m->question_set_element->where('upload_status', 1)->where('verified_by_submitter', 0)->count()}}</b></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <hr>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
        @endforeach
    </div>

@endsection

@section('modal')

@endsection

<script>
    @section('script')

    @endsection
</script>

