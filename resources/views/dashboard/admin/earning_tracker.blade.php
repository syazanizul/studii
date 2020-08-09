@extends('dashboard.admin.adminApp')

@section('dashboard-name')
    admin's dashboard
@endsection

@section('link-in-head')

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
                            <table class="table mx-4  table-responsive">
                                <thead class=" text-primary">
                                <th>
                                    Teacher
                                </th>
                                <th>
                                    User ID
                                </th>
{{--                                <th>--}}
{{--                                    Total Attempt--}}
{{--                                </th>--}}
                                <th>
                                    Cumulative Earning New<br>(With Promo, Paid + Not Paid)
                                </th>
                                <th>
                                    Cumulative Earning New<br>(With Promo, Not Paid)
                                </th>
                                <th>
                                    Fresh Earnings Old
                                </th>
                                <th>
                                    Fresh Earnings New <br>(No Promo)
                                </th>
                                <th>
                                    Fresh Earnings New <br>(With Promo)
                                </th>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>{{$user->firstname}} {{$user->lastname}}</td>
                                        <td>{{$user->id}}</td>
                                        <td>{{\App\Teacher::improved_earning_cumulative(1, $user->id, true, 2)}}</td>
                                        <td>{{\App\Teacher::improved_earning_cumulative(1, $user->id, true, 0)}}</td>
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

        <div class="row">
            <div class="col-lg-5">
                <div class="card card-stats">
                    <div class="card-body">
                        <p>Save new into contribution earning tracker</p>
                        <form action="/admin/earning-tracker/save-new-contribution-earning-tracker" method="get">
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <input type="number" name="amount" placeholder="amount" step="0.01">
                            <input type="date" name="until_date">
                            <input type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @if (Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Success</strong>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-stats">
                    <div class="card-body">
                        <p>Contribution Earning Tracker Table</p>
                        <table class="table mx-4">
                            <thead class=" text-primary">
                            <th>
                                No
                            </th>
                            <th>
                                Start Date
                            </th>
                            <th>
                                End Date
                            </th>
                            <th>
                                Amount
                            </th>
                            <th>
                                Paid
                            </th>
                            </thead>
                            <tbody>

                            @foreach($user->contribution_earning_tracker as $n)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$n->start_date}}</td>
                                    <td>{{$n->end_date}}</td>
                                    <td>{{$n->amount}}</td>
                                    <td>{{$n->paid}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Number of attempts / day for the month of <b>{{date('F')}}</b></h5>
                    </div>
                    <div class="card-body">
                        <canvas id=chart1 width="400" height="70"></canvas>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-history"></i> Updated Today
                        </div>
                    </div>
                </div>
            </div>
        </div>

{{--        <div class="row">--}}
{{--            <div class="col-lg-4">--}}
{{--                <div class="card card-stats">--}}
{{--                    <div class="card-body">--}}
{{--                        <p>Save new into contribution earning tracker</p>--}}
{{--                        <form action="/admin/earning-tracker/save-new-contribution-earning-tracker" method="get">--}}
{{--                            <input type="hidden" name="user_id" value="{{$user->id}}">--}}

{{--                            <div class="m-1">--}}
{{--                                <label for="amount">Amount</label>--}}
{{--                                <input type="number" name="amount" placeholder="amount">--}}
{{--                            </div>--}}

{{--                            <div class="m-1">--}}
{{--                                <label for="until_date">Until Date</label>--}}
{{--                                <input type="datetime-local" name="until_date" placeholder="until date">--}}
{{--                            </div>--}}

{{--                            <input type="submit" class="m-3 mx-5 float-right">--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

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

    <!-- Chart JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

@endsection

<script>
    @section('script')
    @if($index == 2)
    var ctx = document.getElementById('chart1').getContext('2d');
    var lineChart = new Chart(ctx, {
        type: 'line',
        hover: false,
        data:  {
            labels: ["1", "", "", "", "", "","", "", "", "10", "", "", "", "", "", "", "", "", "", "20", "","", "", "", "", "", "", "", "", "30"],
            datasets: [
                {
                    // data: [0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                    data: [
                        @foreach($data['attempt_daily'] as $o)
                            "{{$o}}",
                        @endforeach
                    ],
                    fill: false,
                    borderColor: '#fbc658',
                    backgroundColor: 'transparent',
                    pointBorderColor: '#fbc658',
                    pointRadius: 1,
                    pointHoverRadius: 5,
                    pointBorderWidth: 5,
                }
            ]
        },
        options: {
            legend: {
                display: false,
                position: 'top'
            },
            scales: {
                xAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    @endif
    @endsection
</script>
