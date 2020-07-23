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
            <a href="/tutor">
                <p>Dashboard</p>
            </a>
        </li>
        <li @yield('nav-contribute')>
            <a href="/tutor/contribute">
                <p>Contribute</p>
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

