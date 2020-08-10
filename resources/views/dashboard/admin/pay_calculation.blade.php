@extends('dashboard.admin.adminApp')

@section('dashboard-name')
    admin's dashboard
@endsection

@section('link-in-head')

@endsection

@section('nav-pay-calculation')
    class="active"
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-5">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form>
                                <input type="number" class="m-2" name="day" placeholder="day">
                                <input type="submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(isset($data))
    <div class="row">
        <div class="col-lg-3">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <p> Attempt Today : {{$data['attempt']}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <p>To pay for today : {{$data['to_pay']}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

@endsection

@section('modal')

@endsection

<script>
    @section('script')

    @endsection
</script>
