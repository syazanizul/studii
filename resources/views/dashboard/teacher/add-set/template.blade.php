@extends('dashboard.teacher.teacherApp')

@section('link-in-head')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;1,400&display=swap');

        .div-link:hover {
            border:2px solid #42b3f5;
        }
    </style>
@endsection

@section('dashboard-name')
    Contribute Set 	&#8594; Template
@endsection

@section('nav-submit-question')
    class="active"
@endsection

@section('content')

<div class="row">
    <div class="col-lg-10">
        <p style="font-size:2.5em">Template and Check</p>
    </div>
    <div class="col-lg-2">
        <a href="/teacher/set" class="btn btn-primary btn-lg float-right m-3">Back</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-10">
        <div class="card">
            <div class="card-header">
                <p style="font-size:1.8em">Have you downloaded the template?</p>
                <p style="font-size:1.50em; font-family: 'Rubik', sans-serif;" class="mb-0">This <span class="font-weight-bold">Microsoft Words</span> template is to be used as a reference on how to submit your set of questions. <br>
                    You can download it here : </p>
                <a href="{{asset('/storage/templat_cikgu_Studii.docx')}}" class="btn mt-2 mb-4">Templat_Cikgu_Studii.docx</a>
                <p style="font-size:1.50em; font-family: 'Rubik', sans-serif;">You can type in your questions in the given template and submit it to us when it is ready.</p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header">
                <p style="font-size:1.8em" class="font-weight-bold">Last check</p>
                <p style="font-size:1.50em; font-family: 'Rubik', sans-serif;">Are you ready with your :</p>
                <ol style="font-size:1.50em; font-family: 'Rubik', sans-serif;">
                    <li>Set of questions written in the Microsoft Word template given?</li>
                    <li>The question is original - made by yourself?</li>
                </ol>
                <p style="font-size:1.50em; font-family: 'Rubik', sans-serif;">If yes, continue by clicking the ready button below.</p>
            </div>
        </div>
    </div>

</div>
<br>

<a HREF="/teacher/set/submit" class="btn btn-lg btn-primary float-right btn-block">I am ready to upload my new set of questions</a>


@endsection

