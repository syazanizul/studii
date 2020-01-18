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
    </style>

</head>

<body>
<div class="row w-100" style="background-color: #2F4858; color:white">
    <h2 class="m-4 ml-5">Add Question (1)</h2>
</div>
<div class="container">
    <div class="mt-4">
        <div class="row" style="font-size:1.5em">
            <div class="col-md-8">
                <form method="post" action="/question/add/save/property">
                    @csrf
                    <table class="w-100 my-3">
                        <tr>
                            <th>Subject</th>
                            <td>
                                <select name="s_subject" id="s_subject" class="form-control" onchange="fetch1()">
                                    <option value="0">Select</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{$subject -> id}}">{{$subject -> name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Level</th>
                            <td>
                                <select name="s_level" id="s_level" class="form-control" onchange="fetch1()">
                                    <option value="0">Select</option>
                                    @foreach ($levels as $level)
                                        <option value="{{$level -> id}}">{{$level -> name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Chapter</th>
                            <td>
                                <select name="s_chapter" id="s_chapter" class="form-control">
                                    <option>Select</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Paper</th>
                            <td>
                                <select name="s_paper" id="s_paper" class="form-control">
                                    <option value="1">Paper 1</option>
                                    <option value="2">Paper 2</option>
                                    <option value="3">Paper 3</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Difficulty</th>
                            <td>
                                <select name="s_difficulty" id="s_difficulty" class="form-control">
                                    <option value="1">1 Ez</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5 Hardest</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Source</th>
                            <td>
                                <select name="s_source" id="s_source" class="form-control">
                                    @foreach ($sources as $source)
                                        <option value="{{$source -> id}}">{{$source -> name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Filling for someone?</th>
                            <td>
                                <div class="checkbox">
                                    <label><input name="checkbox" id="checkbox" type="checkbox" value="" onclick="checkbox1()">Yes</label>
                                </div>
                                <div id="divnew" style="visibility: hidden">
                                    <input name="submitter1" type="text" class="form-control" placeholder="His or Her ID?">
                                </div>
                            </td>
                        </tr>
                    </table>



                    <input class="btn btn-lg float-right" type="submit" value="Save Property!">
                </form>
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
                        <h4>Add New Into Subject</h4>
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
            </div>
        </div>
        <div style="min-height:200px">
        </div>
    </div>
</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  <!--?-->

<script>
    function fetch1()
    {
        //First Ajax
        $.ajax({
            type: 'get',
            url: '../ajax/fetch1',
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

    function fetch2()
    {
        //First Ajax
        $.ajax({
            type: 'get',
            url: '../ajax/fetch2',
            data: {
                subject: document.getElementById('s_subject').value,
                level: document.getElementById('s_level').value
            },
            success: function (response) {
                if (response !== '<option value="0">All</option>') {
                    document.getElementById('s_chapter').innerHTML = response;
                }   else {
                    document.getElementById('s_chapter').innerHTML = '<option value="0">No Data</option>';
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

