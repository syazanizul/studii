@extends('dashboard.admin.adminApp')

@section('dashboard-name')
    admin's dashboard
@endsection

@section('link-in-head')

@endsection

@section('nav-price-manipulator')
    class="active"
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-10">
            <div class="card card-stats">
                <div class="card-body"
                <p>Price Manipulator</p>
                    <form method="get">
                        <label for="changes" class="m-2">Changes</label>
                        <input type="number" name="changes" step="0.01" placeholder="changes value" class="m-2">
                        <input type="submit" value="go">
                    </form>
                </div>
            </div>

        @if ($success == 1)
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Success</strong>
            </div>
        @endif
        </div>
    </div>
@endsection

@section('modal')

@endsection

<script>
    @section('script')
    @endsection
</script>
