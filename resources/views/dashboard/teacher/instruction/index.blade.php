@extends('layouts.dashboardApp')

@section('link-in-head')
<style>
    a:hover   {
        text-decoration: none;
    }

    #link-1:hover {
        border:2px solid #00A6ED;
    }

    #link-2:hover   {
        border:2px solid #7FB800;
    }

    #link-3:hover   {
        border:2px solid #E6C79C;
    }

</style>
@endsection

@section('dashboard-name')
    Instruction
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
        <li class="active">
            <a href="/teacher/instruction">
                <p>Instruction</p>
            </a>
        </li>
    </ul>
@endsection

@section('content')
    <h1>Read about :</h1>
    <div class="row">
        <div class="col-lg-10 mb-3">
            <a href="/teacher/instruction/process-upload-questions">
                <div id="link-1"  class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <h3><b>Process to add questions into Studii</b></h3>
                                <h5>Step-to-step guidelines to add questions into Studii.</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-10">
            <a href="/about/teacher/compensation-for-contributors">
                <div id="link-2" class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <h3><b>Roles in adding questions</b></h3>
                                <h5>There are 5 roles in uploading questions into Studii. Read about them here.</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-10">
            <a href="#under-development">
                <div id="link-3" class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <h3><b>Mathjax</b></h3>
                                <h5>The tool we use to write mathematical equations into Studii</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <p>still under development</p>
                    </div>
                </div>
            </a>
        </div>
    </div>


@endsection
