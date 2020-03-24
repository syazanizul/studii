@extends('layouts.dashboardApp')

@section('link-in-head')
<style>
.card-body p   {
    font-size: 1.35em;
}
</style>
@endsection

@section('dashboard-name')
    Teacher's Dashboard
@endsection

@section('side-nav')
    <ul class="nav">
        <li>
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
        <li class="active">
            <a href="/teacher/instruction">
                <p>Instruction</p>
            </a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-9">
            @yield('headline')
        </div>
        <div class="col-lg-2">
            <a class="btn btn-primary float-right" href="/teacher/instruction">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-11">
            <div class="card card-stats">
                <div class="card-body pl-4">
                    @yield('contents')
                    <div style="height:100px">

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
