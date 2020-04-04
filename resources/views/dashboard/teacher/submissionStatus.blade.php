@extends('dashboard.teacher.teacherApp')

@section('dashboard-name')
    teacher's dashboard
@endsection

@section('nav-submission-status')
    class="active"
@endsection

@section('content')
    @if($question_set->count() == 0)
        <div class="row">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="">You haven't submitted any submission yet. Go to <b><a href="/teacher/question">Add Question Page</a></b> to contribute to
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
                                    <td>Uploaded</td>
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
{{--    <div class="row">--}}
{{--        <div class="col-sm-3">--}}
{{--            <div class="card card-stats">--}}
{{--                <div class="card-body ">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-12 col-md-12">--}}
{{--                            <div class="numbers">--}}
{{--                                <p class="card-category">Total Submi</p>--}}
{{--                                <p class="card-title">{{$attempts->count()}}--}}
{{--                                <p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card-footer ">--}}
{{--                    <hr>--}}
{{--                    <div class="stats">--}}
{{--                        <i class="fa fa-refresh"></i> Update Now--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection

@section('modal')

@endsection

<script>
    @section('script')

    @endsection
</script>

