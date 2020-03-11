@extends('layouts.app')

@section('link-in-head')

@endsection

<style>
    @section('style')
       @import url('https://fonts.googleapis.com/css?family=Solway&display=swap');

    .headline {
        font-family: 'Solway', cursive;
        font-size:57px;
        color:black;
    }

    .big-p {
        font-size:24px;
    }

    @media only screen and (max-width: 780px) {
        .headline {
            font-size: 45px;
        }

        .section-image {
            background-size:50%;
        }
    }

    @media only screen and (max-width: 780px) {
        .headline {
            font-size: 45px;
        }

        .section-image {
            background-size:200%;
        }
    }

    @media only screen and (max-width: 462px) {
        .headline {
            font-size: 30px;
        }
    }

    @endsection
</style>

@section('content')
    <section class="py-4 section-image" style="margin-top: -25px; background-image: url({{asset('images/sea.jpg')}}); background-size: 100%;">
        <div class="container">
            <div class="row">
                <div class="col-md-11">
                    <h1 class="headline" style="text-align: right; color: white">Studii</h1>
                    <p class="big-p" style="text-align: right; color: white">Studii is a platform that provides exercise questions for SPM, PT3, & UPSR school students.
                        <br>Students can practice directly. No download or anything. Just practice!</p>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-5" style="background-color: white;">
        <div class="container" style="margin-bottom: 70px">
            <div class="my-1 row">
                <div class="col-md-8">
                    <h1 class="headline">Compensation for contributors</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <p class="big-p my-1">Every question in Studii is pieces of people's contribution.</p>
                    <p class="big-p my-4"><b>When a question is attempted, all of the contributors will get their fair compensation.</b></p>
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <img src="{{asset('images/assets/compensation.png')}}" alt="" style="width:100%">
                </div>
            </div>
        </div>
    </section>

    <section class="my-5">
        <div class="container" style="margin-bottom: 20px">
            <div class="my-1 row">
                <div class="col-lg-12">
                    <h1 class="headline">Understanding each role</h1>
                </div>
            </div>
            <div class="my-4 row">
                <div class="col-lg-2 justify-content-center">
                    <div style="background-color: #449fc9; width:50px; border-radius: 30px; height:50px; border:3px solid black">
                        <h1 style="text-align: center">1</h1>
                    </div>
                </div>
                <div class="col-lg-10">
                    <h1 class="headline">Creator</h1>
                    <p class="big-p ml-2">The creator is the person who create the question. The question is made by this creator and thus is owned by this creator.
                    Also, every question must be paired with its answer, so that we can check whether we get it right or wrong.</p>
                    <p class="big-p ml-2"><b>From brain &#129504; -> to a written question (Microsoft Word, Google Docs, etc)</b></p>
                </div>
            </div>
            <div class="my-4 row">
                <div class="col-lg-2 justify-content-center">
                    <div style="background-color: #296b75; width:50px; border-radius: 30px; height:50px; border:3px solid black">
                        <h1 style="text-align: center">2</h1>
                    </div>
                </div>
                <div class="col-lg-10">
                    <h1 class="headline">Uploader</h1>
                    <p class="big-p ml-2">This person uploads the question made by the creator into <b>Studii</b>. The job is to write again whatever is written
                    by the creator to a format acceptable by <b>Studii</b>.</p>
                    <p class="big-p ml-2"><b>Note:</b> If the question contains mathematical equation, then the uploader must know about Mathjax (a tool to write
                        mathematical equations). But don't worry, we will explain how to use it to you.</p>
                    <p class="big-p ml-2"><b>From Microsoft Word or Google Docs -> to Studii</b></p>
                </div>
            </div>
            <div class="my-4 row">
                <div class="col-lg-2 justify-content-center">
                    <div style="background-color: #43a370; width:50px; border-radius: 30px; height:50px; border:3px solid black">
                        <h1 style="text-align: center">3</h1>
                    </div>
                </div>
                <div class="col-lg-10">
                    <h1 class="headline">Submit Working</h1>
                    <p class="big-p ml-2">This person uploads the working to solve the question. The working does not necessarily must come from the creator.
                    If the creator does not provide the working, then you can make it yourself, given that the working is correct (will be verified by the creator).</p>
                    <p class="big-p ml-2"><b>From brain &#129504; -> to Google Docs or to Studii</b></p>
                </div>
            </div>
            <div class="my-4 row">
                <div class="col-lg-2 justify-content-center">
                    <div style="background-color: #d6bb5a; width:50px; border-radius: 30px; height:50px; border:3px solid black">
                        <h1 style="text-align: center">4</h1>
                    </div>
                </div>
                <div class="col-lg-10">
                    <h1 class="headline">Verified By (2 person)</h1>
                    <p class="big-p ml-2">Every question submitted must be verified by another 2 teachers. This is to ensure all questions submitted to <b>Studii</b> is correct and reliable.</p>
                </div>
            </div>
            <div class="my-4 row">
                <div class="col-lg-2 justify-content-center">
                    <div style="background-color: #ba2d2d; width:50px; border-radius: 30px; height:50px; border:3px solid black">
                        <h1 style="text-align: center">5</h1>
                    </div>
                </div>
                <div class="col-lg-10">
                    <h1 class="headline">Translator (Language)</h1>
                    <p class="big-p ml-2">This person translates the question to a different language.</p>
                    <p class="big-p ml-2">For compensation calculation, it is a bit complicated. The core of this method is we compensate the person who writes in the language of the attempted question.</p>
                    <p class="big-p ml-2">For example, lets say a given question has two versions, English and Bahasa Melayu. If a student attempts the question using English, then
                    the uploader for English will be compensated. If a student attempts using Bahasa Melayu, then the uploader for Bahasa Melayu will be compensated. </p>
                    <p class="big-p ml-2"><b>Note:</b> When an <b>Uploader</b> uploads a question, they will automatically fills 2 sections for the question, and that is the <b>Uploader</b> section
                        and the <b>Language</b> section (according to what language he use to upload the question).</p>
                </div>
            </div>

            <div style="height:50px"></div>
            <hr>

            <div class="row">
                <div class="col-lg-12" style="text-align: center">
                    <h1 class="headline">The more you contribute, the more you get</h1>
                    <p class="big-p my-2"><b>Everytime a student attempts any of your contributions, you will be compensated accordingly.</b></p>
                </div>
            </div>
        </div>
    </section>

    <section id="" style="background-color: #c3d8e8;">
        <div class="container">
            <div class="row py-5">
                <div class="col my-2 mb-4">
                    <h1 class="headline mb-4" style="color;">If you like the idea, join us!</h1>
                    <p class="big-p mt-4">Just spend a few minutes to register your own account. It's totally free. Thank you so much :)</p>
                    <a href="/register/form?c=teacher" class="btn btn-info btn-block mt-4"><h3 class="m-3">Click Here To Register</h3></a>
                </div>
            </div>
        </div>
    </section>

@endsection

<script>
    @section('script')

    @endsection
</script>
