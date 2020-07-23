@extends('dashboard.teacher.teacherApp')

@section('link-in-head')

@endsection

@section('dashboard-name')
    Contribute Set 	&#8594; Template &#8594; Submit
@endsection

@section('nav-submit-question')
    class="active"
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-10">
            <p style="font-size:2.5em">Submit Set of Question</p>
        </div>
        <div class="col-lg-2">
            <a class="btn btn-primary btn-lg float-right m-3" href="/teacher/set/template">Back</a>
        </div>
    </div>
    <form action="/teacher/set/submit/post" method="post" enctype="multipart/form-data">
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
            <div class="col-sm-3" id="div_upload_file" style="visibility: hidden">
                <div class="card" style="">
                    <div class="card-body">
                        <p class="text-center my-1">Click here to finish:</p>
                        <button type="submit" class="btn btn-primary btn-block btn-lg">Submit Set</button>
                    </div>
                </div>
            </div>
        </div>
    </form>



@endsection

<script>
    @section('script')

    function myFunction() {
        document.getElementById('div_upload_file').style.visibility = 'visible';
    }

    @endsection
</script>
