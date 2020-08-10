@extends('dashboard.admin.adminApp')

@section('dashboard-name')
    admin's dashboard
@endsection

@section('link-in-head')

@endsection

@section('nav-pay-calculation')
    class="active"
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <p> Attempt Today : {{$data['attempt_today']}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <p>To pay for today : {{$data['to_pay_today']}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <p> Attempt yesterday : {{$data['attempt_yesterday']}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <p>To pay for yesterday : {{$data['to_pay_yesterday']}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <p>In Contribution earning tracker table</p>
                            <table class="table mx-4">
                                <thead class=" text-primary">
                                    <th>Name</th>
                                    <th>User ID</th>
                                    <th>All</th>
                                    <th>Paid</th>
                                    <th>Not Paid</th>
                                    <th>Not Paid + Fresh Attempt</th>
                                </thead>
                                <tbody>
                                @foreach($teacher as $m)
                                    <tr>
                                        <td>{{$m->firstname}} {{$m->lastname}}</td>
                                        <td>{{$m->id}}</td>
                                        <td>{{\App\Teacher::contribution_earning_summary($m->id, 2)}}</td>
                                        <td>{{\App\Teacher::contribution_earning_summary($m->id, 1)}}</td>
                                        <td>{{\App\Teacher::contribution_earning_summary($m->id, 0)}}</td>
                                        <td>{{\App\Teacher::improved_earning_cumulative(1, $m->id, 1, 0)}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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
