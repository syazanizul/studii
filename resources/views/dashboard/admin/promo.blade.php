@extends('dashboard.admin.adminApp')

@section('dashboard-name')
    admin's dashboard
@endsection

@section('link-in-head')

@endsection

@section('nav-promo')
    class="active"
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-10">
            <div class="card card-stats">
                <div class="card-body ">
                    <p>30 questions = RM50</p>
                    <table class="table mx-4">
                        <thead class=" text-primary">
                            <th>Teacher</th>
                            <th>User ID</th>
                            <th>Stage</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($teacher as $m)
                                @if(\App\Teacher::is_active($m->id))
                                @endif
                                <tr>
                                    <td>{{$m->full_name()}}</td>
                                    <td>{{$m->id}}</td>
                                    <td>{{\App\PromoTracking::is_stage($m->id)}}</td>
                                    <td>
                                        @if(\App\PromoTracking::is_stage($m->id) == 1)
                                            <form action="/admin/promo/stage" >
                                                <input type="hidden" name="teacher_id" value="{{$m->id}}">
                                                <input type="hidden" name="stage" value="2">
                                                <input type="submit" value="Verify user is eligible" class="btn btn-primary">
                                            </form>
                                        @elseif (\App\PromoTracking::is_stage($m->id) == 2)
                                            <form action="/admin/promo/stage" >
                                                <input type="hidden" name="teacher_id" value="{{$m->id}}">
                                                <input type="hidden" name="stage" value="3">
                                                <input type="submit" value="Verify submitted 30 questions" class="btn btn-primary">
                                            </form>
                                        @elseif (\App\PromoTracking::is_stage($m->id) == 3)
                                            <form action="/admin/promo/stage" >
                                                <input type="hidden" name="teacher_id" value="{{$m->id}}">
                                                <input type="hidden" name="stage" value="4">
                                                <input type="submit" value="Verify 30 questions is correct" class="btn btn-primary">
                                            </form>
                                        @elseif (\App\PromoTracking::is_stage($m->id) == 5)
                                            <form action="/admin/promo/stage" >
                                                <input type="hidden" name="teacher_id" value="{{$m->id}}">
                                                <input type="hidden" name="stage" value="6">
                                                <input type="submit" value="Transfer the money - done" class="btn btn-primary">
                                            </form>
                                        @elseif (\App\PromoTracking::is_stage($m->id) == 6)
                                            <p>Money transferred</p>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('modal')

@endsection

<script>
    @section('script')

    @endsection
</script>
