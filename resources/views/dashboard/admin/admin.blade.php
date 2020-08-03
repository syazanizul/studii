@extends('dashboard.admin.adminApp')

@section('dashboard-name')
    admin's dashboard
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
    <div>

        <div class="row my-2">
        </div>

        <div class="row">
            <div class="col-lg-10">

            </div>
        </div>

    </div>
@endsection

@section('modal')

{{--    @if($noti[1] == 1)--}}

{{--     @endif--}}

@endsection

<script>
    @section('script')
    @endsection
</script>
