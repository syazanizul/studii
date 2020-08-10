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
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <p class="card-title">Number of attempts / day for the month of <b>{{date('F')}}</b></p>
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

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <p><span class="font-weight-bold">Attempt and Pay</span> By Day for the month of <b>{{date('F')}}</b></p>
                            <table class="table mx-4">
                                <thead class=" text-primary">
                                    <th>Day</th>
                                    <th>Attempt</th>
                                    <th>To Pay</th>
                                </thead>
                                <tbody>
                                    @for($i=1; $i<31; $i++)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$data['attempt'][$i]}}</td>
                                            <td>{{$data['to_pay'][$i]}}</td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
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
    <!-- Chart JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
@endsection

<script>
    @section('script')
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
                        @foreach($data['attempt'] as $o)
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
    @endsection
</script>
