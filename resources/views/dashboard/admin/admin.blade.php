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
        <li class="active">
            <a href="/admin">
                <p>Dashboard</p>
            </a>
        </li>
        <li>
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
                                            <td>{{\App\Teacher::total_earning(1)}}</td>
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
