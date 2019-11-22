@extends('dashboard.dashboardApp')

@section('dashboard-name')
    teacher's dashboard
@endsection

@section('side-nav')
    <ul class="nav" data-step="7" data-intro="And here is the navigation area. Feel free to explore around :)">
        <li class="active">
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
<div data-step="1" data-intro="This is your dashboard, where you can find all the information that is important.">
    <div class="row">
        <div class="col-sm-12">
            <a href="javascript:void(0);" onclick="introJs().setOption('showProgress', true).start();" class="btn btn-primary btn-lg float-right">I need help</a>
        </div>
    </div>
    <br>
    <div class="row" data-step="2" data-intro="These cards show you the statistics of the questions that you contribute.">
        <div class="col-lg-2 col-md-5 col-sm-5"  data-step="3" data-intro="Firstly, you have the total number of questions you contribute.">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        {{--                                <div class="col-5 col-md-4">--}}
                        {{--                                    <div class="icon-big text-center icon-warning">--}}
                        {{--                                        <i class="fa fa-angle-up"></i>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        <div class="col-12 col-md-12">
                            <div class="numbers">
                                <p class="card-category">Total Questions</p>
                                <p class="card-title">{{$data['question_submitted']}}
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

        <div class="col-lg-3 col-md-6 col-sm-6" data-step="4" data-intro="Then you have statistics of total attempts.">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="fa fa-angle-up"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Attempts Today</p>
                                <p class="card-title">{{$data['attempt_today']}}
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


        <div class="col-lg-4 col-md-7 col-sm-7">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="fa fa-angle-double-up"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Attempts this month</p>
                                <p class="card-title">{{$data['attempt_month']}}
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i> Updated Today
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-3 col-md-6 col-sm-6" data-step="5" data-intro="Then of course the calculated earnings.">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="numbers">
                                <p class="card-category">Earnings this month</p>
                                <p class="card-title">RM --
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i> Updated Today
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-5">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="numbers">
                                <p class="card-category">Total Accumulated Attempts</p>
                                <p class="card-title">--
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i> Updated Today
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="numbers">
                                <p class="card-category">Total Accumulated Earnings</p>
                                <p class="card-title">RM --
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i> Updated Today
                    </div>
                </div>
            </div>
        </div>


        {{-- Big Ones  --}}
    </div>
    <div class="row">
        <div class="col-md-12" data-step="6" data-intro="Here you can see how many students attempt we have in Studii in monthly basis. God we hope the graph is increasing.">
            <div class="card ">
                <div class="card-header ">
                    <h5 class="card-title">Number of students who visit the site</h5>
                </div>
                <div class="card-body ">
                    <canvas id=chart1 width="400" height="100"></canvas>
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
    {{--            <div class="row">--}}
    {{--                <div class="col-md-4">--}}
    {{--                    <div class="card ">--}}
    {{--                        <div class="card-header ">--}}
    {{--                            <h5 class="card-title">Email Statistics</h5>--}}
    {{--                            <p class="card-category">Last Campaign Performance</p>--}}
    {{--                        </div>--}}
    {{--                        <div class="card-body ">--}}
    {{--                            <canvas id="chartEmail"></canvas>--}}
    {{--                        </div>--}}
    {{--                        <div class="card-footer ">--}}
    {{--                            <div class="legend">--}}
    {{--                                <i class="fa fa-circle text-primary"></i> Opened--}}
    {{--                                <i class="fa fa-circle text-warning"></i> Read--}}
    {{--                                <i class="fa fa-circle text-danger"></i> Deleted--}}
    {{--                                <i class="fa fa-circle text-gray"></i> Unopened--}}
    {{--                            </div>--}}
    {{--                            <hr>--}}
    {{--                            <div class="stats">--}}
    {{--                                <i class="fa fa-calendar"></i> Number of emails sent--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="col-md-8">--}}
    {{--                    <div class="card card-chart">--}}
    {{--                        <div class="card-header">--}}
    {{--                            <h5 class="card-title">NASDAQ: AAPL</h5>--}}
    {{--                            <p class="card-category">Line Chart with Points</p>--}}
    {{--                        </div>--}}
    {{--                        <div class="card-body">--}}
    {{--                            <canvas id="speedChart" width="400" height="100"></canvas>--}}
    {{--                        </div>--}}
    {{--                        <div class="card-footer">--}}
    {{--                            <div class="chart-legend">--}}
    {{--                                <i class="fa fa-circle text-info"></i> Tesla Model S--}}
    {{--                                <i class="fa fa-circle text-warning"></i> BMW 5 Series--}}
    {{--                            </div>--}}
    {{--                            <hr/>--}}
    {{--                            <div class="card-stats">--}}
    {{--                                <i class="fa fa-check"></i> Data information certified--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
</div>
@endsection

@section('modal')

    @if($noti['first'] == 0)
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Welcome to your dashboard!</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    This is your very own dashboard, where everything you need is ready at your fingertips. Do you need help with the navigation?
                </div>
                <div class="modal-footer">
                    <a  href="javascript:void(0);" onclick="show_instruction(); disable_help()" class="btn btn-primary" data-dismiss="modal">Yes help me please</a>
                    <button type="button" onclick="disable_help()" class="btn btn-secondary" data-dismiss="modal">Its okay</button>
                </div>
            </div>
        </div>
    </div>
    @endif

@endsection

<script>
@section('script')

    //modal-notification
    @if($noti['first']==0)
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
    @endif

    function show_instruction() {

        introJs().setOption('showProgress', true).start();
        console.log('yeay');

    }

    function disable_help() {
        //Ajax to update to database to not show the modal anymore
        $.ajax({
            type: 'get',
            url: '/ajax/dashboard/hide-modal',
            success: function (response) {
                return 1;
            },
        });
    }

@endsection
</script>
