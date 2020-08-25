@extends('dashboard.admin.adminApp')

@section('dashboard-name')
    admin's dashboard
@endsection

@section('link-in-head')

@endsection

@section('nav-user')
    class="active"
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-6">
            <div class="card card-stats">
                <div class="card-body table-responsive" style="max-height:600px; overflow:auto">
                    <table class="table mx-4">
                        <thead class=" text-primary">

                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        @foreach($users as $m)
                        @endforeach
                        <tr>
                            <td>{{$m->id}}</td>
                            <td>{{$m->full_name()}}</td>
                            <td><a class="btn btn-primary" href="/admin/user/{{$m->id}}">See</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @if(Session::get('completed'))
            <div class="col-lg-6">
                <div class="card">
                    <div class="row">
                        <div class="col-lg-4">
                            @if(\App\Teacher::profile_image(Session::get('user')->id) == 1)
                                <img src="{{asset('images/user_images/id-'.Session::get('user')->id.'.jpg?n='.rand(1,1000))}}" class="w-100">
                            @else
                                <img src="{{asset('/images/user_images/unknown.png')}}" class="w-75 mx-auto d-block my-2">
                            @endif

                            @if(Session::get('completed')['add_image'] != 1)
                                <p class="font-weight-bold">Image Not Added</p>
                            @endif
                        </div>
                        <div class="col-lg-8">
                            <div class="p-3">
                                <p class="font-weight-bold" style="font-size: 2em">{{Session::get('user')->full_name()}}</p>
                                @if(Session::get('completed')['resume'] == 1)
                                    <a href="{{asset('/storage/resume_upload/' . Session::get('user')->id . '.pdf')}}" class="btn btn-block" download>Resume / CV</a>
                                @else
                                    <p>No CV Uploaded</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if(Session::get('completed')['edit_profile'] == 1)
                            <div class="col-lg-12">
                                <div class="row m-1">
                                    <div class="col-md-6">
                                        <p class="p-bigger">Gender: @if(Session::get('data')['profile']-> gender == 1) Male @elseif((Session::get('data')['profile']-> gender == 2)) Female   @endif</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="p-bigger">IC number: {{Session::get('data')['profile']->ic}}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="p-bigger">Phone number: {{Session::get('data')['profile']->phone}}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="p-bigger">You prefer: {{Session::get('data')['profile_mode_comm']}}</p>
                                    </div>
                                    @if(Session::get('completed')['teaching_details'] == 1)
                                        <div class="col-md-12">
                                            <p class="p-bigger" style="text-transform: capitalize">School: {{\App\User::school_name(\Illuminate\Support\Facades\Session::get('user')->id)}}</p>
                                        </div>
                                    @else
                                        <p class="font-weight-bold">No school</p>
                                    @endif
                                </div>
                            </div>
                        @else
                            <p class="font-weight-bold">Edit Details Not Completed</p>
                        @endif
                    </div>
                    <hr>
                    <div class="row">
                        @if(Session::get('completed')['teaching_details'] == 1)
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-8 offset-2 p-2">
                                        <p>Teaching Details</p>
                                        @if(Session::get('data')['exam_chosen']->isNotEmpty())
                                            @foreach(Session::get('data')['exam_chosen'] as $n)
                                                <table class="p-5 my-3" style="border:2px solid #d4d4d4; border-radius:10px; width: 100%">
                                                    <tr>
                                                        <th class="p-2"><b>{{\App\Exam::exam_name($n->exam_id)}}</b></th>
                                                    </tr>
                                                    @foreach(Session::get('data')['subject_chosen'] as $m)
                                                        @if($m->exam_id == $n->exam_id)
                                                            <tr>
                                                                <td class="px-2">{{\App\Subject::subject_name($m->subject_id)}}</td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </table>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @else
                            <p class="font-weight-bold">Teaching Details not completed</p>
                        @endif
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
