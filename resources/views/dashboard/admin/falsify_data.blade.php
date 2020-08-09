@extends('dashboard.admin.adminApp')

@section('dashboard-name')
    admin's dashboard
@endsection

@section('link-in-head')

@endsection

@section('nav-falsify-data')
    class="active"
@endsection

@section('content')
    <div class="row">
        @if($done_falsify->isNotEmpty())
            <div class="col-lg-4">
                <div class="card card-stats">
                    <div class="card-body">
                        <p>Already falsify for today</p>
                        <p>Min : {{$done_falsify->first()->minimum}} <br> Max : {{$done_falsify->first()->maximum}}</p>
                    </div>
                </div>
            </div>
        @else
            <div class="col-lg-4">
                <div class="card card-stats">
                    <div class="card-body">
                        <p>Falsify Data</p>
                        <form method="get">
                            <div class="m-2">
                                <label>Minimum :</label>
                                <input type="number" name="min_value" placeholder="Minimum Value">
                            </div>
                            <div class="m-2">
                                <label>Maximum :</label>
                                <input type="number" name="max_value" placeholder="Maximum Value">
                            </div>
                            <input class="m-2 float-right" type="submit" value="go">
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('modal')

@endsection

<script>
    @section('script')
    @endsection
</script>
