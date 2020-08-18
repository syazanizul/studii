@extends('dashboard.teacher.teacherApp')

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

    #link-4:hover   {
        border:2px solid #c2aeac;
    }

</style>
@endsection

@section('dashboard-name')
    Read
@endsection

@section('nav-read')
    class="active"
@endsection

@section('content')
    <p style="font-family: 'Rubik', sans-serif; font-size:2.3em" class="text-center">Read about :</p>
    <div class="row" style="font-family: 'Rubik', sans-serif;">
        <div class="col-lg-5 mb-3">
            <a href="/teacher/read/pricing">
                <div id="link-1"  class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <img src="{{asset('images\assets\pricing.png')}}" class="w-100">
                                <p style="font-size:2em" class="mt-2 mb-0 font-weight-bold">Mechanism for compensation</p>
                                <p style="font-size:1.4em">How are the teachers compensated?</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

{{--        <div class="col-lg-10 mb-3">--}}
{{--            <a href="/teacher/read/process-upload-questions">--}}
{{--                <div id="link-1"  class="card card-stats">--}}
{{--                    <div class="card-body ">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-12 col-md-12">--}}
{{--                                <h3><b>Process to add questions into Studii - Add Manually</b></h3>--}}
{{--                                <h5>Step-to-step guidelines to add questions into Studii manually.</h5>--}}
{{--                                <h5>Do note that this is not the guide to <b>Upload With Help</b></h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card-footer ">--}}
{{--                        <hr>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--        </div>--}}
    </div>

{{--    <div class="row">--}}
{{--        <div class="col-lg-10">--}}
{{--            <a href="/about/teacher/compensation-for-contributors">--}}
{{--                <div id="link-2" class="card card-stats">--}}
{{--                    <div class="card-body ">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-12 col-md-12">--}}
{{--                                <h3><b>Roles in adding questions</b></h3>--}}
{{--                                <h5>There are 5 roles in uploading questions into Studii. Read about them here.</h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card-footer ">--}}
{{--                        <hr>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="row">--}}
{{--        <div class="col-lg-10 mb-3">--}}
{{--            <a href="/teacher/read/disclaimer">--}}
{{--                <div id="link-3"  class="card card-stats">--}}
{{--                    <div class="card-body ">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-12 col-md-12">--}}
{{--                                <h3><b>Disclaimer - Add Question</b></h3>--}}
{{--                                <h5>Read this before submit your questions.</h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card-footer ">--}}
{{--                        <hr>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </div>--}}


{{--    <div class="row">--}}
{{--        <div class="col-lg-10">--}}
{{--            <a href="#under-development">--}}
{{--                <div id="link-4" class="card card-stats">--}}
{{--                    <div class="card-body ">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-12 col-md-12">--}}
{{--                                <h3><b>Mathjax</b></h3>--}}
{{--                                <h5>The tool we use to write mathematical equations into Studii</h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card-footer ">--}}
{{--                        <hr>--}}
{{--                        <p>still under development</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </div>--}}


@endsection
