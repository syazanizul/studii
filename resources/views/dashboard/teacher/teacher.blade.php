@extends('dashboard.teacher.teacherApp')

@section('dashboard-name')
    teacher's dashboard
@endsection

@section('link-in-head')
    <link rel="stylesheet" href="{{asset('css/alertify/alertify.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/alertify/default.min.css')}}" />

    <script src="js/alertify/alertify.min.js"></script>
@endsection

@section('nav-dashboard')
    class="active"
@endsection

@section('content')
<div data-step="1" data-intro="This is your dashboard, where you can find all the relevant information.">
{{--    <div class="row mb-3">--}}
{{--        <div class="col-sm-12">--}}
{{--            <a href="javascript:void(0);" onclick="introJs().setOption('showProgress', true).start();" class="btn btn-primary btn-lg float-right m-2">I need help</a>--}}
{{--            <a href="#" id="btn-role-teachers" class="btn btn-primary btn-lg float-right m-2">Role of teachers in Studii</a>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="row" data-step="2" data-intro="These cards show you the statistics of the questions that you contribute.">
        <div class="col-lg-2 col-md-5 col-sm-5"  data-step="3" data-intro="Firstly, you have the total number of questions.">
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

        @if(false)
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
        @endif
    </div>

    <div class="row">
        <div class="col-lg-12">
            <p>More statistics coming soon</p>
        </div>
    </div>

    <div class="row my-2">
        @if($noti[0] == 1)
            <div class="col-md-12">
                <div class="alert alert-warning alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>We would love to know more about you! Can you please spend some time to tell us about yourself by clicking <a href="/teacher/details">here</a>.</strong>
                </div>
            </div>
{{--            <div class="col-md-7">--}}
{{--                <div class="alert alert-info alert-block">--}}
{{--                    <button type="button" class="close" data-dismiss="alert">×</button>--}}
{{--                    <strong>You need to complete your profile first before you can contribute your own questions.</strong>--}}
{{--                </div>--}}
{{--            </div>--}}
        @else
            <div class="col-md-12">
                <div class="alert alert-info alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>You have set up your profile. Our team will contact you soon to help you get around. Thank you.</strong>
                </div>
            </div>
        @endif
        @if($noti[2] == 1)
            <div class="col-md-7">
                <div class="alert alert-info alert-block">
                    <a type="button" class="close" data-dismiss="alert" onclick="disable_help('/ajax/dashboard/noti2')">×</a>
                    <strong>Do note that this Dashboard is best viewed on a computer (not a mobile phone)</strong>
                </div>
            </div>
        @endif
        {{--        @if($noti[3] == 1)--}}
        {{--        <div class="col-md-5">--}}
        {{--            <div class="alert alert-info alert-block">--}}
        {{--                <a type="button" class="close" data-dismiss="alert" onclick="disable_help('/ajax/dashboard/noti3')">×</a>--}}
        {{--                <strong>This page can use your ideas! Tell us what you want to see on this page <a href="#" style="color:#b8732a">here</a>.</strong>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        @endif--}}
{{--        <div class="col-md-9">--}}
{{--            <div class="alert alert-warning alert-block">--}}
{{--                <button type="button" class="close" data-dismiss="alert">×</button>--}}
{{--                <strong>Click <a href="/teacher/instruction/process-upload-questions">here</a> to read the guide about the process of adding questions into Studii. When you're--}}
{{--                    ready to submit your question, you can go to <a href="/teacher/question">ADD QUESTION</a> &rarr; <a href="/teacher/upload/with-help">UPLOAD WITH HELP</a> to upload your Microsoft Word (.docx) file.</strong>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>

{{--    <div class="row">--}}
{{--        <div class="col-md-12" data-step="6" data-intro="Here you can see how many students attempt we have in Studii in daily basis. God we hope the graph is increasing.">--}}
{{--            <div class="card ">--}}
{{--                <div class="card-header ">--}}
{{--                    <h5 class="card-title">Number of attempts / day for the month of <b>{{date('F')}}</b></h5>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <canvas id=chart1 width="400" height="100"></canvas>--}}
{{--                </div>--}}
{{--                <div class="card-footer ">--}}
{{--                    <hr>--}}
{{--                    <div class="stats">--}}
{{--                        <i class="fa fa-history"></i> Updated Today--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}



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

    @if($noti[1] == 1)
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
                    <a  href="javascript:void(0);" onclick="show_instruction(); disable_help('/ajax/dashboard/hide-modal')" class="btn btn-primary" data-dismiss="modal">Yes help me please</a>
                    <button type="button" onclick="disable_help('/ajax/dashboard/hide-modal')" class="btn btn-secondary" data-dismiss="modal">Its okay</button>
                </div>
            </div>
        </div>
    </div>
    @endif

@endsection

<script>
@section('script')
    //-------------------------------------------------------------------------------
    //Charts
// var ctx = document.getElementById('chart1').getContext('2d');
// var lineChart = new Chart(ctx, {
//     type: 'line',
//     hover: false,
//     data:  {
//         labels: ["1  ", "4", "7", "10", "13", "16", "19", "22", "25", "28", "30"],
//         datasets: [
//             {
//                 data: [1, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0],
//                 fill: false,
//                 borderColor: '#fbc658',
//                 backgroundColor: 'transparent',
//                 pointBorderColor: '#fbc658',
//                 pointRadius: 4,
//                 pointHoverRadius: 4,
//                 pointBorderWidth: 8,
//             }
//         ]
//     },
//     options: {
//         legend: {
//             display: false,
//             position: 'top'
//         },
//         scales: {
//             xAxes: [{
//                 ticks: {
//                     beginAtZero: true
//                 }
//             }],
//             yAxes: [{
//                 ticks: {
//                     beginAtZero: true
//                 }
//             }]
//         }
//     }
// });

    //End Charts
    //--------------------------------------------------------------------------------

    //modal-notification
    @if($noti[1]==1)
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
    @endif

    function show_instruction() {

        introJs().setOption('showProgress', true).start();
        console.log('yeay');

    }

    function disable_help(url) {
        //Ajax to update to database to not show the modal anymore
        $.ajax({
            type: 'get',
            url: url,
            success: function (response) {
                return 1;
            },
        });
    }

    let text1 = "Teachers can submit their own work of exercise questions (self-made, not taken from anywhere) to us and it will be made available to students." +
        "<br><br>For every attempt made by students, teachers who contributed the question(s) will be compensated." +
        "<br><br>If you contribute now, you are valid to our promotional attempt rate of <b>1 Attempt = 1 Cent</b>!" +
        "<br><br>If you want to know more, you can read here." +
        "<br><br><a class='btn btn-primary' href='about/teacher/join-us'>Read More</a>";

    $(document).ready(function() {
        $('#btn-role-teachers').click(function(){
            alertify.alert("Teacher's role in Studii",text1);
        });
    });

@endsection
</script>
