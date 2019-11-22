@extends('dashboard.dashboardApp')

@section('dashboard-name')
    teacher's dashboard
@endsection

@section('side-nav')
    <ul class="nav">
        <li class="">
            <a href="/teacher">
                <p>Dashboard</p>
            </a>
        </li>
        <li>
            <a href="/teacher/details">
                <p>User details</p>
            </a>
        </li>
        <li class="active">
            <a href="/question">
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
<div class="row">
    <div class="col-sm-10">
        <div class="card">
            <div class="card-header">
                <h3 class="">Contribute Question</h3>
            </div>
            <div class="card-body">
                <div class="row justify-content-center pt-3">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="/question/add" class="btn btn-primary btn-lg btn-block">Add New</a>
                            </div>
                        </div>
                    </div>
                </div>

                <br><br>

{{--                <div class="table-responsive">--}}
                <div class="">
                    <h4 class="text-primary">Questions in draft</h4>
                    <table class="table">
                        <thead class=" text-primary">
                            <th>
                                No
                            </th>
                            <th>
                                Exam
                            </th>
                            <th>
                                Subject
                            </th>
                            <th>
                                Chapter
                            </th>
                            <th class="text-right">
                                Action
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>SPM</td>
                                <td>Add Math</td>
                                <td>Linear Law</td>
                                <td class="text-right"><a class="btn btn-primary">Continue</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-5">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="numbers">
                            <p class="card-category">Total Questions Submitted</p>
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
</div>


@endsection
