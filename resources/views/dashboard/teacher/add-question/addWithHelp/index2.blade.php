@extends('dashboard.teacher.teacherApp')

@section('link-in-head')
    <style>
        .list  {
            padding: 10px;
        }
    </style>
@endsection

@section('dashboard-name')
    teacher's dashboard
@endsection

@section('nav-submit-question')
    class="active"
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-9">
            <h1>Submit Question</h1>
        </div>
        <div class="col-lg-2">
            <a class="btn btn-primary float-right" href="/teacher/upload/with-help">Back</a>
        </div>
    </div>
    <form action="/teacher/upload/with-help/upload-file" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-5" id="upload">
                <div class="card">
                    <div class="card-header">
                        <h3 class="">Submit your submission here</h3>
                        <p>We only accept Microsoft Word (.docx) file</p>
                            <input type="file" name="question_set" accept=".docx, .doc" onchange="document.getElementById('textpopup').style.visibility = 'visible'">
{{--                            <input type="file" name="question_set" onchange="document.getElementById('textpopup').style.visibility = 'visible'">--}}
                        &nbsp
                        <hr>
                        <label style="display: inline-block; visibility: hidden" id="textpopup">
                            <input style="vertical-align: middle; width: 1.5em; height: 1.5em" type="checkbox"  onclick="myFunction()"/>
                            <span style="vertical-align: middle; font-size:1.2em">I hereby confirm that this submission is original, of my own working, and are not copied from any other sources. (made and owned by myself).</span>
                        </label>
                        <br><br>
                    </div>
                </div>
            </div>
            <div class="col-sm-7" id="div_upload_file" style="visibility: hidden">
                <div class="card" style="">
                    <div class="card-header">
                        <h3 class="">Tell us the information of your submission</h3>
                        <div class="row">
                            <div class="col-lg-2">
                                <label for="s_exam" style="font-size: 1.2em">Exam</label>
                            </div>
                            <div class="col-lg-10">
                                <select name="s_exam" id="s_exam" class="form-control">
                                    <option value="1">SPM</option>
                                </select>
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-lg-2">
                                <label for="s_subject" style="font-size: 1.2em">Subject</label>
                            </div>
                            <div class="col-lg-10">
                                <select name="s_subject" id="s_subject" class="form-control" onchange="fetch_subject_level_change_chapter()">
                                    <option value="0">Select Subject</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{$subject -> id}}">{{$subject -> name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-lg-2">
                                <label for="s_level" style="font-size: 1.2em">Level</label>
                            </div>
                            <div class="col-lg-10">
                                <select name="s_level" id="s_level" class="form-control" onchange="fetch_subject_level_change_chapter()">
                                    <option value="0">Select Level</option>
                                    @foreach ($levels as $level)
                                        <option value="{{$level -> id}}">{{$level -> name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-lg-2">
                                <label for="s_subject" style="font-size: 1.2em">Chapter</label>
                            </div>
                            <div class="col-lg-10">
                                <select name="s_chapter" id="s_chapter" class="form-control" onchange="fetch_chapter_change_subtopic()">
                                    <option>Select Chapter</option>
                                </select>
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-lg-2">
                                <label for="s_subtopic" style="font-size: 1.2em">Subtopic</label>
                            </div>
                            <div class="col-lg-10">
                                <select name="s_subtopic" id="s_subtopic" class="form-control">
                                    <option>Select Subtopic</option>
                                </select>
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-lg-2">
                                <label for="s_paper" style="font-size: 1.2em">Paper</label>
                            </div>
                            <div class="col-lg-10">
                                <select name="s_paper" id="s_paper" class="form-control">
                                    <option value="1">Paper 1</option>
                                    <option value="2">Paper 2</option>
                                    <option value="3">Paper 3</option>
                                </select>
                            </div>
                        </div>

                        <hr>
                        <input id="btn_upload_file" type="submit" value="Upload File">
                        <br>&nbsp<br>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <hr>
    <h2>This part is for if there are no desired Subject, Chapter, or Subtopic in the selection. (Usually, you will not use this part)</h2>
    <div class="row" id="div_upload_file2" style="visibility: hidden">
        <div class="col-md-8">
            <div class="card m-3">
                <div class="card-body">
                    <h4>Add New Into Subject</h4>
                    <form method="post" action="/question/add/newproperty/1">
                        @csrf
                        <p class="">Subject Name</p>
                        <input class="form-control m-2 w-75" type="text" name="thing">
                        <input class="btn btn-primary m-3 float-right" type="submit">
                    </form>
                </div>
            </div>
            <div class="card m-3"   >
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
                        <input class="btn btn-primary m-3 float-right" type="submit">
                    </form>
                </div>
            </div>
            <div class="card m-3">
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
                        <input class="btn btn-primary m-3 float-right" type="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

<script>
    @section('script')

    function myFunction() {
        document.getElementById('div_upload_file').style.visibility = 'visible';
        document.getElementById('div_upload_file2').style.visibility = 'visible';
    }

    function checkbox_verified()    {
        document.getElementById('btn_upload_file').style.display = 'none';
    }

    function fetch_subject_level_change_chapter()
    {
        $.ajax({
            type: 'get',
            url: '/ajax/fetch_subject_level_change_chapter',
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
        console.log('yos');
    }

    function fetch_chapter_change_subtopic()
    {
        $.ajax({
            type: 'get',
            url: '/ajax/fetch_chapter_change_subtopic',
            data: {
                chapter: document.getElementById('s_chapter').value,
            },
            success: function (response) {
                if (response !== '<option value="0">All</option>') {
                    document.getElementById('s_subtopic').innerHTML = response;
                }   else {
                    document.getElementById('s_subtopic').innerHTML = '<option value="0">No Subtopic (This option is valid)</option>';
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
                subject: document.getElementById('s_subject_2').value,
                level: document.getElementById('s_level_2').value
            },
            success: function (response) {
                if (response !== '<option value="0">All</option>') {
                    document.getElementById('s_chapter_2').innerHTML = response;
                }   else {
                    document.getElementById('s_chapter_2').innerHTML = '<option value="0">No Data</option>';
                }
            }
        });
    }


    @endsection
</script>
