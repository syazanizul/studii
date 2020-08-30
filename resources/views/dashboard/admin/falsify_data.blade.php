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
            <div class="col-lg-4">
                <div class="card card-stats">
                    <div class="card-body">
                        <p>Undo falsify (delete)</p>
                        <a href="/admin/falsify-data/delete" class="btn btn-secondary">Undo</a>
                    </div>
                </div>
            </div>
            @if (Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Success</strong>
                </div>
            @endif
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
            <div class="col-lg-5">
                <div class="card card-stats">
                    <div class="card-body">
                        <p>Not Trusted User</p>
                        <table class="table mx-4">
                            <thead class="text-primary">
                                <th>Name</th>
                                <th>AntiTrust Level</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($specified_user_falsify_data as $m)
                                    <tr>
                                        <td>{{$m->user->full_name()}}</td>
                                        <td>{{$m->antitrust_level}}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <div>
                            <p>Add New</p>
                            <form action="/admin/falsify-data/add-antitrust">
                                <div>
                                    <label for="user_id">User ID</label>
                                    <input type="number" name="user_id" class="form-control">
                                </div>
                                <div>
                                    <label for="level">Level</label>
                                    <input type="number" name="level" min="0" max="10" class="form-control">
                                </div>
                                <input type="submit" value="Submit" class="btn ">
                            </form>
                        </div>
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
