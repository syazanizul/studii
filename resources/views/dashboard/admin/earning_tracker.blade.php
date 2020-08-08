@extends('dashboard.admin.adminApp')

@section('dashboard-name')
    admin's dashboard
@endsection

@section('link-in-head')
    <link rel="stylesheet" href="{{asset('css/alertify/alertify.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/alertify/default.min.css')}}" />

    <script src="js/alertify/alertify.min.js"></script>
@endsection

@section('nav-earning-tracker')
    class="active"
@endsection

@section('content')


    <div class="row">
        <div class="col-lg-10">
            <div class="card card-stats">
                <div class="card-body ">
                    <form method="get">
                        <input type="number" name="user_id" placeholder="user_id">
                        <input type="submit" value="go">
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if($index == 2)
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <table class="table mx-4">
                                <thead class=" text-primary">
                                <th>
                                    Teacher
                                </th>
                                <th>
                                    User ID
                                </th>
                                <th>
                                    Total Attempt
                                </th>
                                <th>
                                    Total Earnings Old
                                </th>
                                <th>
                                    Total Earnings New <br>(No Promo)
                                </th>
                                <th>
                                    Total Earnings New <br>(With Promo)
                                </th>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>{{$user->firstname}} {{$user->lastname}}</td>
                                        <td>{{$user->id}}</td>
                                        <td>{{\App\Teacher::total_attempt_fresh(1, $user->id)}}</td>
                                        <td>{{\App\Teacher::total_earning_fresh(1, $user->id)}}</td>
                                        <td>{{\App\Teacher::improved_earning_fresh(1, $user->id, false)}}</td>
                                        <td>{{\App\Teacher::improved_earning_fresh(1, $user->id, true)}}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer ">

                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($index == 1)
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
                                    Total Attempt
                                </th>
                                <th>
                                    Total Earnings Old
                                </th>
                                </thead>
                                <tbody>

                                @foreach($user as $m)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$m->firstname}} {{$m->lastname}}</td>
                                        <td>{{$m->id}}</td>
                                        <td>{{\App\Teacher::total_attempt_fresh(1, $m->id)}}</td>
                                        <td>{{\App\Teacher::total_earning_fresh(1, $m->id)}}</td>
{{--                                        <td>{{\App\Teacher::improved_earning_fresh(1, $m->id)}}</td>--}}
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
    @endif
@endsection

@section('modal')

    {{--    @if($noti[1] == 1)--}}

    {{--     @endif--}}

@endsection

<script>
    @section('script')
    @endsection
</script>
