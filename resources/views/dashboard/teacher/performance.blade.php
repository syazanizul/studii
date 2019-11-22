@extends('dashboard.dashboardApp')

@section('dashboard-name')
    teacher's dashboard
@endsection

@section('side-nav')
    <ul class="nav" data-step="7" data-intro="And here is the navigation area. Feel free to explore around :)">
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
        <li class="active">
            <a href="/teacher/performance">
                <p>Performance</p>
            </a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <h1 class="m-4">Coming real soon</h1>
    </div>
@endsection

@section('modal')

@endsection

<script>
    @section('script')

    @endsection
</script>

