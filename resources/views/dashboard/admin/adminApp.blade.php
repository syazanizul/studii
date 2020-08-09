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
            <a href="/admin">
                <p>Dashboard</p>
            </a>
        </li>
        <li @yield('nav-question-database')>
            <a href="/admin/question-database">
                <p>Question Database</p>
            </a>
        </li>
        <li @yield('nav-pay-calculation')>
            <a href="/admin/pay-calculation">
                <p>To Pay</p>
            </a>
        </li>
        <li @yield('nav-earning-tracker')>
            <a href="/admin/earning-tracker">
                <p>Earning Tracker</p>
            </a>
        </li>
        <li @yield('nav-verify-question')>
            <a href="/admin/verify-question">
                <p>Verify Question</p>
            </a>
        </li>
        <li @yield('nav-set-price')>
            <a href="/admin/set-price">
                <p>Set Price</p>
            </a>
        </li>
        <li @yield('nav-price-manipulator')>
            <a href="/admin/price-manipulator">
                <p>Price Manipulator</p>
            </a>
        </li>
        <li @yield('nav-falsify-data')>
            <a href="/admin/falsify-data">
                <p>Falsify Data</p>
            </a>
        </li>
        <li @yield('nav-feedback')>
            <a href="/admin/feedback">
                <p>Feedback</p>
            </a>
        </li>
        <li @yield('nav-question')>
            <a href="/admin/question">
                <p>Question</p>
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

