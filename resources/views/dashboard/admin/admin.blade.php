@extends('layouts.dashboardApp')

@section('dashboard-name')
    admin's dashboard
@endsection

@section('link-in-head')
    <link rel="stylesheet" href="{{asset('css/alertify/alertify.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/alertify/default.min.css')}}" />

    <script src="js/alertify/alertify.min.js"></script>
@endsection

@section('side-nav')
    <ul class="nav">
        <li class="active" data-step="7" data-intro="And here is the navigation area. Feel free to explore around :)">
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
        <li>
            <a href="/teacher/performance">
                <p>Performance</p>
            </a>
        </li>
    </ul>
@endsection

@section('content')
    <div data-step="1" data-intro="This is your dashboard, where you can find all the relevant information.">

        <div class="row my-2">
        </div>

        <div class="row">
            <div class="col-lg-10">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
{{--                            {{\App\Teacher::get_total_attempt(1)}}--}}
                            <table class="table mx-4">
                                <thead class=" text-primary">
                                    <th>
                                        No
                                    </th>
                                    <th>
                                        Teacher
                                    </th>
                                    <th>
                                        User ID
                                    </th>
                                    <th>
                                        Total Attempts
                                    </th>
                                </thead>
                                <tbody>

                                    @foreach(\App\User::where('role', 2)->get() as $m)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$m->firstname}} {{$m->lastname}}</td>
                                            <td>{{$m->id}}</td>
                                            <td>{{\App\Teacher::get_total_attempt($m->id)}}</td>
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
