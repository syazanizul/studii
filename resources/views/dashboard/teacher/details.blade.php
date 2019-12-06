@extends('layouts.dashboardApp')

@section('dashboard-name')
    teacher's dashboard
@endsection

@section('side-nav')
    <ul class="nav" data-step="7" data-intro="And here is the navigation area. Feel free to explore around :)">
        <li>
            <a href="/teacher">
                <p>Dashboard</p>
            </a>
        </li>
        <li class="active">
            <a href="/teacher/details">
                <p>User details</p>
            </a>
        </li>
        <li>
            <a href="/teacher/question">
                <p>Add Question</p>
            </a>
        </li>
        <li>
            <a href="/teacher/performance">
                <p>Performance</p>
            </a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <h1 class="m-4">Coming real soon</h1>
    </div>
@endsection

@section('contentnotfinished')
    <div class="content">
        <div class="row">
{{--            <div class="col-md-4">--}}
{{--                <div class="card card-user">--}}
{{--                    <div class="image">--}}
{{--                        <img src="../assets/img/damir-bosnjak.jpg" alt="...">--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="author">--}}
{{--                            <a href="#">--}}
{{--                                <img class="avatar border-gray" src="../assets/img/mike.jpg" alt="...">--}}
{{--                                <h5 class="title">Chet Faker</h5>--}}
{{--                            </a>--}}
{{--                            <p class="description">--}}
{{--                                @chetfaker--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                        <p class="description text-center">--}}
{{--                            "I like the way you work it--}}
{{--                            <br> No diggity--}}
{{--                            <br> I wanna bag it up"--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                    <div class="card-footer">--}}
{{--                        <hr>--}}
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
{{--                    </div>--}}
{{--                </div>--}}
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
            <div class="col-md-8">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Edit Profile</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">You teach for which exam?</label>
                                        <div class="d-flex">
                                            <select class="form-control m-1">
                                                <option>Choose Exam</option>
                                                <option>SPM</option>
                                                <option>PT3</option>
                                            </select>
                                            <button class="btn btn-primary d-inline-block m-1">Add Exam</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Exam:</label>
                                        <p>SPM</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">You are a teacher of what subject?</label>
                                        <div class="d-flex">
                                            <select class="form-control m-1">
                                                <option>Choose Subject</option>
                                                <option>Add Math</option>
                                                <option>Math Mod</option>
                                                <option>Sejarah</option>
                                            </select>
                                            <button class="btn btn-primary d-inline-block m-1">Add Subject</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Subject:</label>
                                        <p>Add Math</p>
                                    </div>
                                </div>
                            </div>
{{--                            <div class="row">--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>Name of School</label>--}}
{{--                                        <input id="input_school_name" type="text" class="form-control" placeholder="School Name and Location" onkeyup="">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <div>--}}
{{--                                        <a href="" class="m-3" style="height:50px;">--}}
{{--                                            <p>Mahad Attarbiyah Al-Islamiyah</p>--}}
{{--                                        </a>--}}
{{--                                        <a href="" class="m-3" style="height:50px;">--}}
{{--                                            <p>SMK Taman Selayang</p>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')

    <!-- Typeahead.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
@endsection

<script>
    @section('script')

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

    // function showHint(str) {
    //     if (str.length === 0) {
    //         document.getElementById("txtHint").innerHTML = "";
    //     } else {
    //         $.ajax({
    //             type: 'get',
    //             url: '/ajax/dashboard/teacher/details/school_name',
    //             data: {
    //                 'str' : str,
    //             },
    //             success: function (response) {
    //                 document.getElementById('txtHint').innerHTML = response;
    //             },
    //         });
    //     }
    // }

    @endsection
</script>

