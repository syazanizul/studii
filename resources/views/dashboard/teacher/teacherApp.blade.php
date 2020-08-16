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
            <a href="/teacher/set">
                <p>Contribute</p>
            </a>
        </li>
        <li @yield('nav-promo')>
            <a href="/teacher/promo">
                <p>30 Questions = RM50</p>
            </a>
        </li>
{{--        <li @yield('nav-submission-status')>--}}
{{--            <a href="/teacher/submission-status">--}}
{{--                <p>Upload With Help - Status</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        @if(Session::has('need_nav_performance') && Session('need_nav_performance') == 1)--}}
{{--            <li @yield('nav-performance')>--}}
{{--                <a href="/teacher/performance">--}}
{{--                    <p>Performance</p>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        @endif--}}
{{--        <li @yield('nav-instruction')>--}}
{{--            <a href="/teacher/instruction">--}}
{{--                <p>Instruction</p>--}}
{{--            </a>--}}
{{--        </li>--}}
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

