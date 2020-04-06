@extends('layouts.dashboardApp')

@section('dashboard-name')
    @yield('dashboard-name')
@endsection

@section('link-in-head')
    @yield('link-in-head')
@endsection

@section('side-nav')
    <ul class="nav">
        <li @yield('nav-dashboard')>
            <a href="/teacher">
                <p>Dashboard</p>
            </a>
        </li>
        <li @yield('nav-user-details')>
            <a href="/teacher/details">
                <p>User details</p>
            </a>
        </li>
        <li @yield('nav-submit-question')>
            <a href="/teacher/question">
                <p>Submit Question</p>
            </a>
        </li>
        <li @yield('nav-submission-status')>
            <a href="/teacher/submission-status">
                <p>Upload With Help - Status</p>
            </a>
        </li>
        <li @yield('nav-performance')>
            <a href="/teacher/performance">
                <p>Performance</p>
            </a>
        </li>
        <li @yield('nav-instruction')>
            <a href="/teacher/instruction">
                <p>Instruction</p>
            </a>
        </li>
    </ul>
@endsection

@section('content')
    @yield('content')
@endsection

@section('modal')
    @yield('modal')
@endsection


@section('script')
    @yield('script')
@endsection

