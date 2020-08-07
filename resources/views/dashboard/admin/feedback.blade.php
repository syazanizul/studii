@extends('dashboard.admin.adminApp')

@section('dashboard-name')
    admin's dashboard
@endsection

@section('link-in-head')
    <link rel="stylesheet" href="{{asset('css/alertify/alertify.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/alertify/default.min.css')}}" />

    <script src="js/alertify/alertify.min.js"></script>
@endsection

@section('nav-feedback')
    class="active"
@endsection

@section('content')
    <div>

        <div class="row">
            <div class="col-lg-10">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <table class="table mx-4">
                                <thead class=" text-primary">
                                    <th>
                                        No
                                    </th>
                                    <th>
                                        Feedback
                                    </th>
                                </thead>
                                <tbody>

                                @foreach($suggestions as $m)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$m->suggestion}}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer ">

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-2">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            Feedback = {{round($feedback_average, 3)}}
                        </div>
                    </div>
                </div>
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
