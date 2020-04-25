@extends('dashboard.teacher.teacherApp')

@section('link-in-head')
<style>
.card-body p   {
    font-size: 1.25em;
}

table, th, td {
    border: 1px solid black;
}

th, td {
    padding: 10px;
}
</style>
@endsection

@section('dashboard-name')
    Teacher's Dashboard
@endsection

@section('nav-instruction')
    class="active"
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
