@extends('dashboard.teacher.teacherApp')

@section('dashboard-name')
    Dashboard
@endsection

@section('link-in-head')
{{--    <link rel="stylesheet" href="{{asset('css/alertify/alertify.min.css')}}" />--}}
{{--    <link rel="stylesheet" href="{{asset('css/alertify/default.min.css')}}" />--}}

{{--    <script src="js/alertify/alertify.min.js"></script>--}}

<style>
    .pointer {
        cursor:pointer;
    }
</style>
@endsection

@section('nav-dashboard')
    class="active"
@endsection

@section('content')
<div>
{{--    <div class="row mb-3">--}}
{{--        <div class="col-sm-12">--}}
{{--            <a href="javascript:void(0);" onclick="introJs().setOption('showProgress', true).start();" class="btn btn-primary btn-lg float-right m-2">I need help</a>--}}
{{--            <a href="#" id="btn-role-teachers" class="btn btn-primary btn-lg float-right m-2">Role of teachers in Studii</a>--}}
{{--        </div>--}}
{{--    </div>--}}
    @if($data['promo'] == 1)
    <div class="row">
        <div class="col-lg-3">
            <div class="card card-user">
                <div class="card-header">
                    <p class="font-weight-bold" style="font-family: 'rubik', sans-serif; font-size:1.3em">Your submitted questions are verified. Please tell us of your banking details so we can proceed.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Bank Details</h5>
                    <form action="/teacher/promo/bank-details" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <label>Bank Name</label>
                                <input type="text" class="form-control" placeholder="Bank" name="bank_name" required>
                            </div>
                            <div class="col-lg-8">
                                <label>Account number</label>
                                <input type="number" class="form-control" placeholder="Account No" name="account_number" required>
                            </div>
                        </div>
                        <input type="submit" value="submit" class="btn btn-primary float-right mx-3">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr>
    @endif
    @if ($message = Session::get('success'))
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{$message}}</strong>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-2 col-md-5 col-sm-5">
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
                                <p class="card-title">{{$data['question_uploaded']}}
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i> Update Just Now
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
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
                        <i class="fa fa-refresh"></i> Update Just Now
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
        <div class="col-lg-3 col-md-6 col-sm-6">
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

    @if($notification[1] == 0)
    <div class="row">
        <div class="col-lg-12">
            <p class="text-right">More statistics coming soon</p>
        </div>
    </div>
    @endif

    <div class="row my-2">
        @if($notification[0] == 1)
            <div class="col-md-12">
                <div class="alert alert-warning alert-block">
                    <a class="close pointer" data-dismiss="alert">×</a>
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
            @if($notification[3] == 1)
            <div class="col-md-12">
                <div class="alert alert-info alert-block">
                    <a class="close pointer" data-dismiss="alert" onclick="notification(3)">×</a>
                    <strong>You have set up your profile. Our team will contact you soon to help you get around. Thank you.</strong>
                </div>
            </div>
            @endif
        @endif
        @if($notification[2] == 1)
            <div class="col-md-7">
                <div class="alert alert-info alert-block">
                    <a class="close pointer" data-dismiss="alert" onclick="notification(2)">×</a>
                    <strong>Do note that this Dashboard is best viewed on a computer (not a mobile phone)</strong>
                </div>
            </div>
        @endif
        {{--        @if($notification[3] == 1)--}}
        {{--        <div class="col-md-5">--}}
        {{--            <div class="alert alert-info alert-block">--}}
        {{--                <a type="button" class="close" data-dismiss="alert" onclick="disable_help('/ajax/dashboard/notification3')">×</a>--}}
        {{--                <strong>This page can use your ideas! Tell us what you want to see on this page <a href="#" style="color:#b8732a">here</a>.</strong>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        @endif--}}
{{--        <div class="col-md-9">--}}
{{--            <div class="alert alert-warning alert-block">--}}
{{--                <button type="button" class="close" data-dismiss="alert">×</button>--}}
{{--                <strong>Click <a href="/teacher/read/process-upload-questions">here</a> to read the guide about the process of adding questions into Studii. When you're--}}
{{--                    ready to submit your question, you can go to <a href="/teacher/question">ADD QUESTION</a> &rarr; <a href="/teacher/upload/with-help">UPLOAD WITH HELP</a> to upload your Microsoft Word (.docx) file.</strong>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>

</div>
@endsection

@section('modal')

    @if($notification[1] == 1)
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
                    <img src="{{asset("/images/assets/teacher/teacher_instruction.png")}}" alt="studii-teacher-instruction" class="w-100">
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="notification(1)" class="btn btn-secondary" data-dismiss="modal">Okay Noted</button>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Chart JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

{{--    <!--Intro.js-->--}}
{{--    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.9.3/intro.min.js"></script>--}}
@endsection

<script>
@section('script')
    //-------------------------------------------------------------------------------
    //Charts
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

    //End Charts
    //--------------------------------------------------------------------------------

    //modal-notificationfication
    @if($notification[1]==1)
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
    @endif

    function show_instruction() {

        // introJs().setOption('showProgress', true).start();
        // console.log('yeay');

    }

    function disable_help(url) {
        $.ajax({
            type: 'get',
            url: url,
            success: function (response) {
                return 1;
            },
        });
    }

    function notification(id) {
        $.ajax({
            type: 'get',
            url: '/ajax/notification',
            data: {
                role: 2,
                notification_id: id
            },
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
