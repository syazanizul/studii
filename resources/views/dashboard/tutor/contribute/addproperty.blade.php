<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('images/cat.png')}}">
    <link rel="icon" type="image/png" href="{{asset('images/cat.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Studii - Dashboard
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link href="{{asset('css/paper-dashboard/bootstrap.min.css')}}" rel="stylesheet" />

    <style>
        th, td {
            padding: 10px;
            text-align: left;
        }

        #div_recent {
            box-shadow:
                -12px -12px 12px 0 rgba(255, 255, 255, 1),
                12px 12px 12px 0 rgba(200, 200, 200, 1);
        }

        #table_recent th {
            padding: 0;
        }

        #table_recent td {
            padding: 0;
        }

    </style>

</head>

<body>
<div class="row w-100" style="background-color: #2F4858; color:white">
    <h2 class="m-4 ml-5">Add Question (1)</h2>
</div>

<div class="w-100" style="">
    <div class="float-right">
        <a href="/" class="d-inline-block mx-4">Home</a>
        <a href="/teacher" class="d-inline-block mx-4">Dashboard</a>
    </div>
</div>

<div class="container">
    <div class="mt-4">
        <div class="row" style="font-size:1.5em">
            <div class="col-md-8">
                <form method="post" action="/tutor/contribute/add-property/store">
                    @csrf
                    <table class="w-100 my-3">
                        <tr>
                            <th>Subject *</th>
                            <td>
                                <select name="s_subject" id="s_subject" class="form-control" onchange="fetch_subject_level_change_chapter()" required>
                                    {{--                                <select name="s_subject" id="s_subject" class="form-control" onchange="fetch_subject_change_chapter()">--}}
                                    <option value="0" disabled selected>Select</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{$subject -> id}}">{{$subject -> name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Level *</th>
                            <td>
                                <select name="s_level" id="s_level" class="form-control" onchange="fetch_subject_level_change_chapter()" required>
                                    <option value="0" disabled selected>Select</option>
                                    @foreach ($levels as $level)
                                        <option value="{{$level -> id}}">{{$level -> name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Chapter *</th>
                            <td>
                                <select name="s_chapter" id="s_chapter" class="form-control" onchange="fetch_chapter_change_subtopic()" required>
                                    <option value="0" disabled selected>Select</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Subtopic</th>
                            <td>
                                <select name="s_subtopic" id="s_subtopic" class="form-control" required>
                                    <option value="0" selected>Select</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Paper *</th>
                            <td>
                                <select name="s_paper" id="s_paper" class="form-control" required>
                                    <option value="1">Paper 1</option>
                                    <option value="2">Paper 2</option>
                                    <option value="3">Paper 3</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Difficulty *</th>
                            <td>
                                <select name="s_difficulty" id="s_difficulty" class="form-control" required>
                                    <option value="1">1 Ez</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5 Hardest</option>
                                </select>
                            </td>
                        </tr>
                    </table>

                    <input type="hidden" name="set_id" value="{{$set_id}}">
                    <input class="btn btn-lg float-right" type="submit" value="Save Property!">
                </form>
                <p  style="font-size:0.8em">Note: * means must have value</p>
            </div>
            <div class="col-md-4" style="font-size: 0.8em;">
                @if(session('recent_add_property') != null && false)
                    <form  method="post" action="/tutor/contribute/add-property/store">
                        <div id="div_recent" class="card m-5">
                            @csrf
                            <div class="card-body">
                                <h3 class="mb-3">Recent Property</h3>
                                <table id="table_recent">
                                    <tr>
                                        <td>
                                            <p>Subject :</p>
                                        </td>
                                        <td style="text-align: right">
                                            <p>{{App\Subject::find(session('recent_add_property')["s_subject"])->name}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Level :</p>
                                        </td>
                                        <td style="text-align: right">
                                            <p>{{App\Level::find(session('recent_add_property')["s_level"])->name}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Chapter :</p>
                                        </td>
                                        <td style="text-align: right">
                                            <p>{{App\Chapter::find(session('recent_add_property')["s_chapter"])->name}}</p>
                                        </td>
                                    </tr>
                                    @if(session('recent_add_property')["s_subtopic"] != "0")
                                        <tr>
                                            <td>
                                                <p>Subtopic :</p>
                                            </td>
                                            <td style="text-align: right">
                                                <p>{{App\Subtopic::find(session('recent_add_property')["s_subtopic"])->name}}</p>
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td>
                                            <p>Paper :</p>
                                        </td>
                                        <td style="text-align: right">
                                            <p>Paper {{session('recent_add_property')["s_paper"]}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Difficulty :</p>
                                        </td>
                                        <td style="text-align: right">
                                            <p>{{session('recent_add_property')["s_difficulty"]}}</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <input type="hidden" name="s_subject" value="{{session('recent_add_property')["s_subject"]}}">
                            <input type="hidden" name="s_level" value="{{session('recent_add_property')["s_level"]}}">
                            <input type="hidden" name="s_chapter" value="{{session('recent_add_property')["s_chapter"]}}">
                            <input type="hidden" name="s_subtopic" value="{{session('recent_add_property')["s_subtopic"]}}">
                            <input type="hidden" name="s_paper" value="{{session('recent_add_property')["s_paper"]}}">
                            <input type="hidden" name="s_source" value="1">
                            <input type="hidden" name="s_difficulty" value="{{session('recent_add_property')["s_difficulty"]}}">
                            <input type="hidden" name="set_id" value="{{$set_id}}">
                            <input type="submit" value="Submit">
                        </div>
                    </form>
                @endif
            </div>
        </div>
        <br>
        <hr>
        <div class="row">
            <div class="col-md-8">
                <div class="card m-3" style="background-color: #493548; color:white">
                    <div class="card-body">
                        <h4>Add New Into Subject</h4>
                        <form method="post" action="/question/add/newproperty/1">
                            @csrf
                            <p class="">Subject Name</p>
                            <input class="form-control m-2" type="text" name="thing">
                            <input class="btn m-3 float-right" type="submit">
                        </form>
                    </div>
                </div>
                <div class="card m-3" style="background-color: #493548; color:white">
                    <div class="card-body">
                        <h4>Add New Into Chapter</h4>
                        <form method="post" action="/question/add/newproperty/2">
                            @csrf
                            <p>Chapter Name</p>
                            <select name="subject" class="form-control m-2 w-25 d-inline-block">
                                @foreach ($subjects as $subject)
                                    <option value="{{$subject -> id}}">{{$subject -> name}}</option>
                                @endforeach
                            </select>
                            <select name="level" class="form-control m-2 w-25 d-inline-block">
                                <option value="1">Form 4</option>
                                <option value="2">Form 5</option>
                            </select>
                            <input  class="form-control m-2 w-25 d-inline-block" type="text" name="thing" placeholder="Chapter Name">
                            <input class="btn m-3 float-right" type="submit">
                        </form>
                    </div>
                </div>
                <div class="card m-3" style="background-color: #493548; color:white">
                    <div class="card-body">
                        <h4>Add New Into Subtopic</h4>
                        <form method="post" action="/question/add/newproperty/3">
                            @csrf
                            <p>Subtopic Name</p>
                            <select name="subject" id="s_subject_2" class="form-control m-2 w-25 d-inline-block" onchange="fetch_subject_level_change_chapter_2()">
                                <option value="0">Select</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{$subject -> id}}">{{$subject -> name}}</option>
                                @endforeach
                            </select>
                            <select name="level" id="s_level_2" class="form-control m-2 w-25 d-inline-block" onchange="fetch_subject_level_change_chapter_2()">
                                <option value="0">Select</option>
                                <option value="1">Form 4</option>
                                <option value="2">Form 5</option>
                            </select>
                            <select name="chapter" id="s_chapter_2" class="form-control m-2 w-25 d-inline-block">
                                <option>Select Chapter</option>
                            </select>
                            <input  class="form-control m-2 w-50 d-inline-block" type="text" name="thing" placeholder="Subtopic Name">
                            <input class="btn m-3 float-right" type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div style="min-height:200px">
        </div>
    </div>
</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  <!--?-->

<script>
    function fetch_subject_change_chapter()
    {
        $.ajax({
            type: 'get',
            url: '/ajax/fetch_subject_change_chapter',
            data: {
                subject: document.getElementById('s_subject').value,
            },
            success: function (response) {
                if (response !== '<option value="0">All</option>') {
                    document.getElementById('s_chapter').innerHTML = response;
                    //console.log(response);
                }   else {
                    //console.log('yes');
                    document.getElementById('s_chapter').innerHTML = '<option value="0">No Data</option>';
                }
            }
        });
    }

    function fetch_subject_level_change_chapter()
    {
        $.ajax({
            type: 'get',
            url: '/ajax/fetch_subject_level_change_chapter',
            data: {
                type:0,
                subject: document.getElementById('s_subject').value,
                level: document.getElementById('s_level').value
            },
            success: function (response) {
                if (response !== '') {
                    document.getElementById('s_chapter').innerHTML = '<option value="0" selected disabled>Select</option>' + response;
                }   else {
                    document.getElementById('s_chapter').innerHTML = '<option value="0">No Data (Please select level or add new chapter)</option>';
                }
            }
        });

    }

    $.when(fetch_subject_change_chapter()).done(fetch_chapter_change_subtopic());

    function fetch_chapter_change_subtopic()
    {
        $.ajax({
            type: 'get',
            url: '/ajax/fetch_chapter_change_subtopic',
            data: {
                type:0,
                chapter: document.getElementById('s_chapter').value,
            },
            success: function (response) {
                if (response !== '') {
                    document.getElementById('s_subtopic').innerHTML = response + '<option value="0">No Subtopic (this is a valid option)</option>';
                }   else {
                    document.getElementById('s_subtopic').innerHTML = '<option value="0">No Subtopic (this is a valid option)</option>';
                }
            }
        });
    }

    function fetch_subject_level_change_chapter_2()
    {
        $.ajax({
            type: 'get',
            url: '/ajax/fetch_subject_level_change_chapter',
            data: {
                type:0,
                subject: document.getElementById('s_subject_2').value,
                level: document.getElementById('s_level_2').value
            },
            success: function (response) {
                if (response !== '') {
                    document.getElementById('s_chapter_2').innerHTML = response;
                }   else {
                    document.getElementById('s_chapter_2').innerHTML = '<option value="0" disabled selected>No Data (Add New Chapter First)</option>';
                }
            }
        });
    }

    function checkbox1() {
        // Get the checkbox
        let checkBox = document.getElementById("checkbox");
        // Get the output text
        let divnew = document.getElementById("divnew");

        // If the checkbox is checked, display the output text
        if (checkBox.checked === true){
            divnew.style.visibility = "visible";
        } else {
            divnew.style.visibility = "hidden";
        }
    }
</script>

