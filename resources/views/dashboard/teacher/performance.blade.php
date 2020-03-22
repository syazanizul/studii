@extends('layouts.dashboardApp')

@section('dashboard-name')
    teacher's dashboard
@endsection

@section('side-nav')
    <ul class="nav" data-step="7" data-intro="And here is the navigation area. Feel free to explore around :)">
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
        <li>
            <a href="/teacher/question">
                <p>Add Question</p>
            </a>
        </li>
        <li class="active">
            <a href="/teacher/performance">
                <p>Performance</p>
            </a>
        </li>
        <li>
            <a href="/teacher/instruction">
                <p>Instruction</p>
            </a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-header">
                    <h3 class="">Performance of Submitted Questions</h3>
{{--                    <p style="font-size:1.2em"><b>Note:</b> This is a total performance report. To see your current earnings, go to Earning Page (click here).</p>--}}
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>No</th>
                            <th>Subject</th>
                            <th>Chapter</th>
                            <th>Question ID</th>
                            <th>Price per attempt (cents)</th>
                            <th>Attempt</th>
                            <th>Total Earning (RM)</th>
                        </thead>
                        <tbody>

                        @foreach($question->get() as $m)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$m -> subject_name -> name}}</td>
                                <td>{{$m -> chapter_name -> name}}</td>
                                <td>{{$m -> id}}</td>
                                @if($m -> price != null)
                                    <td>{{$m -> price}}</td>
                                @else
                                    <td>-</td>
                                @endif
                                <td>{{$m -> total_attempt()}}</td>
                                <td>{{$m -> earning_per_question()}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="numbers">
                                <p class="card-category">Total Attempts</p>
                                <p class="card-title">{{$attempts->count()}}
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i> Update Now
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="numbers">
                                <p class="card-category">Total Earnings</p>
                                <p class="card-title">{{$total_earning}}
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i> Update Now
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <p>The value for <b>Price Per Attempt</b> will be determined by the Studii Team, depending on the characteristic (length, complexity, etc) of the question.
                            Please give it a few days for us to set the price.</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
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

