@extends('dashboard.teacher.teacherApp')

@section('dashboard-name')
    User Profile
@endsection

@section('nav-user-details')
    class="active"
@endsection

@section('link-in-head')
<style>
    .p-bigger {
        font-size:1.2em;
    }
</style>
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-7">
                @if($completed['edit_profile'] == 1 || $completed['teaching_details'] == 1 || $completed['add_image'] == 1 || $completed['resume'] == 1)
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @if($completed['edit_profile'] == 1)
                                        <p style="font-size:1.7em">Edit Profile <span style="color:green">&#10003</span></p>
                                    @endif
                                    @if($completed['teaching_details'] == 1)
                                            <p style="font-size:1.7em">Teaching Details <span style="color:green">&#10003</span></p>
                                    @endif
                                    @if($completed['add_image'] == 1)
                                            <p style="font-size:1.7em">Add Image <span style="color:green">&#10003</span></p>
                                    @endif
                                    @if($completed['resume'] == 1)
                                            <p style="font-size:1.7em">Upload Resume <span style="color:green">&#10003</span></p>
                                    @endif
{{--                                    @if($completed['bank_details'] == 1)--}}
{{--                                            <p style="font-size:1.7em">Bank Details <span style="color:green">&#10003</span></p>--}}
{{--                                    @endif--}}
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <p class="font-weight-bold" style="font-size:1.3em;">Your data submitted here is safe</p>
                                    <p style="font-size:1.15em">Any data saved by us is purely for you, so that you have a good experience using this platform and will not be given to any other parties without your consent.</p>
                                    <p></p>
                                </div>
                                <div class="col-md-3">
                                    <img src="{{asset('images/assets/shut-it.png')}}" class="w-75 d-block m-auto">
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            @if($i!=0)
            <div class="col-md-4">
                <div class="card mb-1">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p><b>Complete these steps to set up your profile</b></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <h1 class="text-center mb-0">{{$i}}</h1>
                                <p class="text-center mt-0">@if($i != 1) steps more @else step more @endif</p>
                            </div>
                            <div class="col-sm-8">
                                @if($completed['edit_profile'] == 0)
                                    <p class="my-1">- Edit Profile</p>
                                @endif
                                @if($completed['teaching_details'] == 0)
                                    <p class="my-1">- Teaching Details</p>
                                @endif
                                @if($completed['add_image'] == 0)
                                    <p class="my-1">- Add Image</p>
                                @endif
                                @if($completed['resume'] == 0)
                                    <p class="my-1">- Add Resume</p>
                                @endif
{{--                                @if($completed['bank_details'] == 0)--}}
{{--                                    <p class="my-1">- Add Bank Details</p>--}}
{{--                                @endif--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="col-md-4">
                <div class="card mb-1">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h3><b>You have finished setting up your profile!</b></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <p class="font-weight-bold" style="font-size:1.2em">Please note that this page is best shown on a computer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
{{--            <div class="col-md-4">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        <h4 class="card-title">Team Members</h4>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <ul class="list-unstyled team-members">--}}
{{--                            <li>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-2 col-2">--}}
{{--                                        <div class="avatar">--}}
{{--                                            <img src="../assets/img/faces/ayo-ogunseinde-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-7 col-7">--}}
{{--                                        DJ Khaled--}}
{{--                                        <br />--}}
{{--                                        <span class="text-muted">--}}
{{--                          <small>Offline</small>--}}
{{--                        </span>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-3 col-3 text-right">--}}
{{--                                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-2 col-2">--}}
{{--                                        <div class="avatar">--}}
{{--                                            <img src="../assets/img/faces/joe-gardner-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-7 col-7">--}}
{{--                                        Creative Tim--}}
{{--                                        <br />--}}
{{--                                        <span class="text-success">--}}
{{--                          <small>Available</small>--}}
{{--                        </span>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-3 col-3 text-right">--}}
{{--                                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-2 col-2">--}}
{{--                                        <div class="avatar">--}}
{{--                                            <img src="../assets/img/faces/clem-onojeghuo-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-ms-7 col-7">--}}
{{--                                        Flume--}}
{{--                                        <br />--}}
{{--                                        <span class="text-danger">--}}
{{--                          <small>Busy</small>--}}
{{--                        </span>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-3 col-3 text-right">--}}
{{--                                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            @if($completed['edit_profile'] == 0)
            <div class="col-md-11">
                <div class="card card-user" style="border:3px solid grey">
                    <div class="card-header">
                        <p class="float-right m-3 font-weight-bold">Please fill in this section first</p>
                        <h5 class="card-title">Basic Information About You</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/teacher/details/edit-profile">
                            @csrf
                            <div class="row my-1">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <select name="title" class="form-control pt-1" required>
                                            <option value="0" disabled>Select</option>
                                            <option value="1">Cikgu</option>
                                            <option value="2">Tuan</option>
                                            <option value="3">Puan</option>
                                            <option value="4">Mr</option>
                                            <option value="5">Miss</option>
                                            <option value="6">Bro</option>
                                            <option value="7">Sis</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" name="firstname" placeholder="First Name" value="{{\Illuminate\Support\Facades\Auth::user()->firstname}}" required>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="{{\Illuminate\Support\Facades\Auth::user()->lastname}}" required>
                                    </div>
                                </div>
                            </div>


                            <div class="row my-1">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select name="gender" class="form-control pt-2" required>
                                            <option value="">Select</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>IC Number</label>
                                        <input type="number" class="form-control" name="ic" placeholder="IC Number" min="0" required>
                                        <p class="ml-1 mt-1">Without minus sign. Eg: 880314095197</p>
                                    </div>
                                </div>
                            </div>



                            <div class="row my-1">
{{--                                <div class="col-md-5">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>Email address</label>--}}
{{--                                        <input name="email" type="email" class="form-control" placeholder="Email">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Phone Number</label>
                                        <input name="phone" type="number" class="form-control" placeholder="Phone Number" min="0" required>
                                        <p class="ml-1 mt-1">Also without minus sign. Eg: 01920333215</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">How should we reach you?</label>
                                        <select name="preferred_communication" class="form-control pt-1" required>
                                            <option value="1">Whatsapp (Best)</option>
                                            <option value="2">Call & SMS</option>
                                            <option value="3">Email</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <input type="submit" class="btn btn-primary btn-lg m-2 float-right" value="Submit">

                        </form>
                    </div>
                </div>
                <div>

                </div>
            </div>
            @endif
        </div>
        <div class="row">
            @if($completed['resume'] == 0)
            <div class="col-md-6">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Upload Resume</h5>
                        <p>For verification purposes - please submit a <span class="font-weight-bold">pdf format document</span>.</p>
                        <div>
                            <form method="post" action="/teacher/details/add-resume" enctype="multipart/form-data">
                                @csrf
                                <input type="file" class="mx-2 p-2" name="resume" style="background-color:grey; border-radius:5px; color:white" accept="application/pdf">
                                <input type="submit" value="Upload" class="my-2 mx-2" @if($completed['edit_profile'] == 0) disabled @endif>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if ($message = Session::get('success'))
                <div class="col-lg-12">
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{$message}}</strong>
                    </div>
                </div>
            @endif
        </div>
        <div class="row">
            @if($completed['teaching_details'] == 0)
            <div class="col-md-8">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Teaching Details</h5>
                        <p><b>Note:</b> This part can be complicated to fill in - reach <i>Syazani</i> at 019-209 9853 for assistance.</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <div>
                                    <form action="/teacher/details/teaching-details/exam" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exam">You teach for which exam?</label>
                                            <div class="d-flex">
                                                <select name="exam" class="form-control m-1 pt-2" required>
                                                    <option value="">Choose Exam</option>
                                                    @foreach($data['exam'] as $n)
                                                        <option value="{{$n->id}}">{{$n->name_shortened}}</option>
                                                    @endforeach
                                                </select>
                                                <input type="submit" class="btn btn-primary d-inline-block m-1" value="Add Exam" @if($completed['edit_profile'] == 0) disabled @endif>
                                            </div>
                                        </div>
                                    </form>
                                    <form action="/teacher/details/teaching-details/subject" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">You are a teacher of what subject?</label>
                                            <div class="d-flex">
                                                <select name="exam" class="form-control m-1 pt-2" onchange="subject_based_on_exam(this.value)" required>
                                                    @if(!$data['exam_chosen']->isEmpty())
                                                        <option value="">Choose Exam</option>
                                                        @foreach($data['exam_chosen'] as $n)
                                                            <option value="{{$n->exam_id}}">{{\App\Exam::exam_name($n->exam_id)}}</option>
                                                        @endforeach
                                                    @else
                                                        <option value="">No exam</option>
                                                    @endif
                                                </select>
                                                <select name="subject" id="select_subject_teaching_details" class="form-control m-1 pt-1" required>
                                                    @if(!$data['exam_chosen']->isEmpty())
                                                        <option value="">Choose Subject</option>
                                                        @foreach($data['subject'] as $b)
                                                            @if($b->exam == $data['exam_chosen'][0]->exam_id)
                                                                <option value="{{$b->id}}">{{$b->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <option>No Subject</option>
                                                    @endif
                                                </select>
                                                @if(!$data['exam_chosen']->isEmpty())
                                                    <button class="btn btn-primary d-inline-block m-1" @if($completed['edit_profile'] == 0) disabled @endif>Add Subject</button>
                                                @else
                                                    <button class="btn btn-primary d-inline-block m-1" disabled>Add Exam First</button>
                                                @endif
                                            </div>
                                            <p>Eg: Add Math for SPM, or Science for STPM</p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-4 p-2">
                                @if(!$data['exam_chosen']->isEmpty())
                                    <p>You teach:</p>
                                    @foreach($data['exam_chosen'] as $n)
                                        <table class="p-5 my-3" style="border:2px solid #d4d4d4; border-radius:10px">
                                            <tr>
                                                <th class="p-2"><b>{{\App\Exam::exam_name($n->exam_id)}}</b></th>
                                            </tr>
                                            @foreach($data['subject_chosen'] as $m)
                                                @if($m->exam_id == $n->exam_id)
                                                    <tr>
                                                        <td class="px-2">{{\App\Subject::subject_name($m->subject_id)}}</td>
                                                        <td class="px-2"><button class="btn btn-primary m-1" disabled>Remove</button></td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </table>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <form id="school_name_form" action="/teacher/details/teaching-details" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name of School</label>
                                        <select name="schoolname1" class="form-control pt-2" id="hidediv" required>
                                            <option value="0">Choose School</option>
                                            @foreach($data['school_list'] as $n)
                                                <option value="{{$n->id}}">{{$n->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <a class="btn-primary btn m-0" onclick="not_in_list(); this.style.display = 'none'" @if($completed['edit_profile'] == 0) disabled @endif>If your school is not in the list, click here</a>
                                </div>
                                <div class="col-md-12" id="revealdiv" style="visibility: hidden;">
                                    <input id="schoolname2" class="form-control" type="text" name="schoolname2" placeholder="School Name">
                                    <p class="mt-2"><b>Please put school name together with the location:</b> Eg : Mahad Attarbiyah Al-Islamiyah, Beseri, Perlis.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <hr>
                                    <a onclick="submit_form()" class="btn btn-primary btn-lg m-2 float-right" @if($completed['edit_profile'] == 0) disabled @endif>Done</a>
                                    @if($completed['edit_profile'] == 0) <p>Please fill in <b>Profile (top)</b> section first.</p> @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif
            @if($completed['add_image'] == 0)
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="{{asset('images/user_images/background.jpg')}}" alt="Background" style="object-fit: stretch;">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="#">
                                <img class="avatar border-gray" src="{{asset('images/user_images/unknown.png')}}" alt="User Image" style="object-fit: cover;">
                                <h5 class="title">{{Auth::user() -> firstname }} {{Auth::user() -> lastname }}</h5>
                            </a>
{{--                            <p class="description">--}}
{{--                                &#64{{Auth::user() -> firstname }}{{Auth::user() -> lastname }}--}}
{{--                            </p>--}}
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <button class=" btn btn-primary btn-block" onclick="this.style.display='none'; document.getElementById('form_add_button').style.display='block'" @if($completed['edit_profile'] == 0) disabled @endif>Add an image</button>
                                <form id="form_add_button" style="display: none" action="/teacher/details/add-image" method="POST" role="form" enctype="multipart/form-data">
                                    @csrf
                                    <label for="fileupload"> Add an image of you</label>
                                    <input type="file"
                                           id="avatar" name="avatar"
                                           accept="image/png, image/jpeg"
                                    >
                                    <input class="btn btn-primary" type="submit" value="Add Image" @if($completed['edit_profile'] == 0) disabled @endif>
                                </form>
                                <a href="#" onclick="document.getElementById('text-dont-have').innerText = 'Are you sure you dont want to add any?'; document.getElementById('btn-dont-have').style.visibility = 'visible'" class="my-4 btn btn-primary btn-block" @if($completed['edit_profile'] == 0) disabled @endif>I don't want any image</a>

                                {{--                        <p class="description text-center">--}}
                                {{--                            "I like the way you work it--}}
                                {{--                            <br> No diggity--}}
                                {{--                            <br> I wanna bag it up"--}}
                                {{--                        </p>--}}
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <hr>
                        <p class="text-center" id="text-dont-have">We don't have your image yet</p>
                        <a href="/teacher/details/add-image/no-image" id="btn-dont-have" class="mb-3 btn btn-primary btn-block" style="visibility: hidden;"  @if($completed['edit_profile'] == 0) disabled @endif>Yes I'm sure</a>
                        @if($completed['edit_profile'] == 0) <p class="text-center">Please fill in <b>Profile (top)</b> section first.</p> @endif
{{--                        <div class="button-container">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-lg-3 col-md-6 col-6 ml-auto">--}}
{{--                                    <h5>12--}}
{{--                                        <br>--}}
{{--                                        <small>Files</small>--}}
{{--                                    </h5>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">--}}
{{--                                    <h5>2GB--}}
{{--                                        <br>--}}
{{--                                        <small>Used</small>--}}
{{--                                    </h5>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-3 mr-auto">--}}
{{--                                    <h5>24,6$--}}
{{--                                        <br>--}}
{{--                                        <small>Spent</small>--}}
{{--                                    </h5>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
            @endif
        </div>
       {{--        If done...--}}

    <div class="row">

        @if($completed['add_image'] == 1 || $completed['edit_profile'] == 1 || $completed['teaching_details'] == 1  || $completed['resume'] == 1)
            <div class="col-lg-12">
                <h3>Saved Info</h3>
            </div>
        @endif

        @if($completed['add_image'] == 1)
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="{{asset('images/user_images/background.jpg')}}" alt="Background" style="object-fit: stretch;">
                    </div>
                    <div class="card-boy">
                        <div class="author">
                            <a href="#">
                                @if(\App\Teacher::profile_image(\Illuminate\Support\Facades\Auth::user()->id) == 1)
                                    <img class="avatar border-gray" src="{{asset('images/user_images/id-'.\Illuminate\Support\Facades\Auth::user()->id.'.jpg?n='.rand(1,10))}}" alt="User Image" style="object-fit: cover;">
                                @else
                                    <img class="avatar border-gray" src="{{asset('/images/user_images/unknown.png')}}" alt="User Image" style="object-fit: cover;">
                                @endif
                                <h5 class="title">{{Auth::user() -> firstname }} {{Auth::user() -> lastname }}</h5>
                            </a>
                        </div>
                    </div>
                    <div class="card-footer">
                        <hr>
                    </div>
                </div>
            </div>
        @endif

        @if($completed['edit_profile'] == 1)
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="card-body">
                        <h5 class="card-title">Your Profile</h5>
                        <div class="row m-1">
                            <div class="col-md-12">
                                <p class="font-weight-bold p-bigger">
                                    {{$data['profile_title']}} {{\Illuminate\Support\Facades\Auth::user()-> firstname}} {{\Illuminate\Support\Facades\Auth::user()-> lastname}}
                                </p>
                            </div>
                            <div class="col-md-12">
                                <p class="p-bigger">Gender: @if($data['profile']-> gender == 1) Male @elseif(($data['profile']-> gender == 2)) Female   @endif</p>
                            </div>
                            <div class="col-md-12">
                                <p class="p-bigger">IC number: {{$data['profile']->ic}}</p>
                            </div>
                            <div class="col-md-12">
                                <p class="p-bigger">Phone number: {{$data['profile']->phone}}</p>
                            </div>
                            <div class="col-md-12">
                                <p class="p-bigger">You prefer: {{$data['profile_mode_comm']}}</p>
                            </div>
                            @if($completed['teaching_details'] == 1)
                                <div class="col-md-12">
                                    <p class="p-bigger" style="text-transform: capitalize">School: {{\App\User::school_name(\Illuminate\Support\Facades\Auth::user()->id)}}</p>
                                </div>
                            @endif
                        </div>
                        <hr>
                        <a href="" class="btn btn-primary btn-lg m-2 float-right" disabled>Edit</a>
                    </div>
                </div>
            </div>
        @endif

        @if($completed['teaching_details'] == 1)
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Teaching Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-8 p-2">
                                @if($data['exam_chosen']->isNotEmpty())
                                    @foreach($data['exam_chosen'] as $n)
                                        <table class="p-5 my-3" style="border:2px solid #d4d4d4; border-radius:10px; width: 100%">
                                            <tr>
                                                <th class="p-2"><b>{{\App\Exam::exam_name($n->exam_id)}}</b></th>
                                            </tr>
                                            @foreach($data['subject_chosen'] as $m)
                                                @if($m->exam_id == $n->exam_id)
                                                    <tr>
                                                        <td class="px-2">{{\App\Subject::subject_name($m->subject_id)}}</td>
{{--                                                        <td class="px-2"><button class="btn btn-primary m-1" disabled>Remove</button></td>--}}
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </table>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <hr>
                        <a onclick="" class="btn btn-primary btn-lg m-2 float-right" disabled>Edit</a>

                    </div>
                </div>
            </div>
        @endif

        @if($completed['resume'] == 1)
            <div class="col-md-3">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Resume</h5>
                    </div>
                    <div class="card-footer">
                        <a href="{{asset('/storage/resume_upload/' . Auth::user()->id . '.pdf')}}" class="btn btn-block" download>Download</a>
                    </div>
                </div>
            </div>
        @endif

        @if($completed['edit_profile'] == 1 || $completed['teaching_details'] == 1)
            <div class="col-lg-12">
                <p>The <b>edit button</b> is under development.</p>
            </div>
        @endif
    </div>


{{--        @if($completed['edit_profile'] == 1)--}}
{{--            <div class="col-md-11">--}}
{{--                <div class="card card-user">--}}
{{--                    <div class="card-header">--}}
{{--                        <h5 class="card-title">Edit Profile</h5>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <form method="post" action="/teacher/details/edit-profile">--}}
{{--                            @csrf--}}
{{--                            <div class="row my-1">--}}
{{--                                <div class="col-md-2">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>Title</label>--}}
{{--                                        <select name="title" class="form-control pb-2" required>--}}
{{--                                            <option value="0">Select</option>--}}
{{--                                            <option value="1" @if($data['profile']->title == 1) selected @endif>Cikgu</option>--}}
{{--                                            <option value="2" @if($data['profile']->title == 2) selected @endif>Tuan</option>--}}
{{--                                            <option value="3" @if($data['profile']->title == 3) selected @endif>Puan</option>--}}
{{--                                            <option value="4" @if($data['profile']->title == 4) selected @endif>Mr</option>--}}
{{--                                            <option value="5" @if($data['profile']->title == 5) selected @endif>Miss</option>--}}
{{--                                            <option value="6" @if($data['profile']->title == 6) selected @endif>Bro</option>--}}
{{--                                            <option value="7" @if($data['profile']->title == 7) selected @endif>Sis</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>First Name</label>--}}
{{--                                        <input type="text" class="form-control" name="firstname" placeholder="First Name" value="{{\Illuminate\Support\Facades\Auth::user()->firstname}}" required>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-5">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>Last Name</label>--}}
{{--                                        <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="{{\Illuminate\Support\Facades\Auth::user()->lastname}}" required>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}


{{--                            <div class="row my-1">--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>Gender</label>--}}
{{--                                        <select name="gender" class="form-control" required>--}}
{{--                                            <option value="">Select</option>--}}
{{--                                            <option value="1" @if($data['profile']->gender == 1) selected @endif>Male</option>--}}
{{--                                            <option value="2" @if($data['profile']->gender == 2) selected @endif>Female</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>IC Number</label>--}}
{{--                                        <input type="number" class="form-control" name="ic" placeholder="{{$data['profile']->ic}}" min="0" required>--}}
{{--                                        <p class="ml-1 mt-1">Without minus sign. Eg: 880314095197</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}



{{--                            <div class="row my-1">--}}
{{--                                --}}{{--                                <div class="col-md-5">--}}
{{--                                --}}{{--                                    <div class="form-group">--}}
{{--                                --}}{{--                                        <label>Email address</label>--}}
{{--                                --}}{{--                                        <input name="email" type="email" class="form-control" placeholder="Email">--}}
{{--                                --}}{{--                                    </div>--}}
{{--                                --}}{{--                                </div>--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="">Phone Number</label>--}}
{{--                                        <input name="phone" type="number" class="form-control" placeholder="{{$data['profile']->phone}}" min="0" required>--}}
{{--                                        <p class="ml-1 mt-1">Also without minus sign. Eg: 01920333215</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-3">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="">How should we reach you?</label>--}}
{{--                                        <select name="preferred_communication" class="form-control pb-2" required>--}}
{{--                                            <option value="1" @if($data['profile']->preferred_mode_communication == 1) selected @endif>Whatsapp (Best)</option>--}}
{{--                                            <option value="2" @if($data['profile']->preferred_mode_communication == 2) selected @endif>Call & SMS</option>--}}
{{--                                            <option value="3" @if($data['profile']->preferred_mode_communication == 3) selected @endif>Email</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <hr>--}}
{{--                            <input type="submit" class="btn btn-primary btn-lg m-2 float-right" value="Submit">--}}

{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}
    </div>
@endsection

@section('modal')

    <!-- Typeahead.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
@endsection

<script>
    @section('script')

    function subject_based_on_exam(exam)    {
        $.ajax({
            type: 'get',
            url: '/ajax/dashboard/teacher/details/subject_based_on_exam',
            data: {
                exam: exam
            },
            success: function (response) {
                document.getElementById('select_subject_teaching_details').innerHTML = response;
            }
        });
    }

    $("#input_school_name").typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    },{
        source: engine.ttAdapter(),

        // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
        name: 'usersList',

        // the key from the array we want to display (name,id,email,etc...)
        templates: {
            empty: [
                '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
            ],
            header: [
                '<div class="list-group search-results-dropdown">'
            ],
            suggestion: function (data) {
                return '<a href="' + data.profile.username + '" class="list-group-item">' + data.name + '- @' + data.profile.username + '</a>'
            }
        }
    });

    function not_in_list()  {
        document.getElementById('revealdiv').style.visibility = 'visible';
        document.getElementById('hidediv').style.display = 'none';
    }

    function submit_form()  {
        let value1 = document.getElementById('hidediv').value;
        let value2 = document.getElementById('schoolname2').value;

        if (value1 == 0 && value2 == "")   {
            window.alert('choose your school first');
        }   else    {
            document.getElementById('school_name_form').submit();
        }
    }

    @endsection
</script>

