@extends('layouts.dashboardApp')

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

@section('side-nav')
    <ul class="nav">
        <li>
            <a href="/teacher">
                <p>Dashboard</p>
            </a>
        </li>
        <li>
            <a href="/teacher/details">
                <p>User details</p>
            </a>
        </li>
        <li class="active">
            <a href="/teacher/question">
                <p>Add Question</p>
            </a>
        </li>
        <li>
            <a href="/teacher/performance">
                <p>Performance</p>
            </a>
        </li>
        <li>
            <a href="/teacher/instruction">
                <p>Instruction</p>
            </a>
        </li>
    </ul>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-11">
            <div class="card">
                <div class="card-header">
                    <h3 class="">Understanding the purpose of this page</h3>
                    <div style="font-size:1.35em">
                        <p>This page is for you to upload you Microsoft Word (.docs) file that contains sets of questions that you want to
                            submit to Studii.</p>
                        <p>If you write your questions using Google Docs, you must download that file as Microsoft Words, and then upload that Microsoft Words
                            file here. (Go to <b>File</b> -> <b>Download</b> -> <b>Microsoft Docs</b> )</p>
                        <p>Here you can see a sample.</p>
                        <img class="ml-auto mr-auto d-block" src="{{asset('images/assets/teacher/instruction/sample-question-2.PNG')}}" width="50%" style="border:2px solid grey">
                        <p class="text-center">Example: A snippet of Microsoft Words containing questions.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="">Before we get started ...</h3>
                    <p style="font-size:1.3em">Please check the following before proceeding to upload your question:</p>
                    <ol style="font-size: 1.3em">
                        <li class="list">This set of questions must be of the same characteristic. If it is of subtopic <b>Intro</b>, it must all be of subtopic <b>Intro</b> (cannot mix).</li>
                        <li class="list">It is of Microsoft Words (.docs) file format.</li>
                        <li class="list">This set of questions must be original, of your own working, and must not be copied from any other sources.</li>
                        <li class="list">Syaz, ingat. nanti tambah checkbox untuk macam 'I hereby confirm that this submission question is of my own working gitu'</li>
                    </ol>
                </div>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="">Steps</h3>
                    <ol style="font-size: 1.3em">
                        <li class="list">Upload the questions in a Microsoft Word file.</li>
                        <li class="list">Fill in the information of this questions.</li>
                        <li class="list">Wait a few days for us to upload your questions into Studii.</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <br><hr><br>
    <h2>Upload Question</h2>
    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="">Upload your submission here</h3>
                    <p>We only accept Microsoft Word (.docs) file</p>
                    <form action="/teacher/upload/with-help/upload-file" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="question_set">
                        <input type="submit" value="Upload File">
                    </form>
                    &nbsp
                    <hr>
                    <label style="display: inline-block">
                        <input style="vertical-align: middle" type="checkbox" />
                        <span style="vertical-align: middle">I hereby confirm that this submission is original, of my own working, and are not copied from any other sources. (made and owned by myself).</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

@endsection
