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

    <section class="mt-5">
        <div class="container" style="margin-bottom: 70px">
            <div class="my-1 row">
                <div class="col-md-7">
                    <h1 class="headline">Role of teachers here</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p class="big-p my-1">We are just a platform. We don't work without the teachers. We want to collaborate with you to have your exercise questions in our library.</p>
                    <p class="big-p my-4"><b>You make the exercise questions, we provide the platform. Then the students study :)</b></p>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <img class="d-block ml-auto mr-auto" src="{{asset('images/assets/contents.jpg')}}" style="width:100%">
                </div>
            </div>
        </div>
    </section>

    <section class=" py-4" style="background-image: url({{asset('images/assets/about_joinus_teacher.jpg')}}); background-size: 100%;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="headline" style="text-align:center">1 attempt = 1 cent !</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="my-5">
        <div class="container" style="margin-bottom: 20px">
            <div class="my-1 row">
                <div class="col-lg-12">
                    <h1 class="headline">We appreciate your contribution</h1>
                    <p class="big-p mt-4">For every question that you submit, and a student attempts it, you will get compensated for it.</p>
                    <p class="big-p my-2"><b>1 cent for every attempt</b></p>
                    <p style="font-size:1em">* 1 cent = 1 attempt is apart of the <b>Early Involvement Offer</b>, up until August 2020 (Estimated) only. After that the rate may reduced.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <img src="{{asset('images/assets/relationships.jpg')}}" alt="" style="width:100%">
                </div>
            </div>
            <div class="my-1 row">
                <div class="col-lg-12" style="text-align: center">
                    <h1 class="headline">It works like this</h1>
                    <p class="big-p my-2"><b>You will submit your question to us and we will display them for students. When one student attempts your question, you will get 1 cent. It's really easy.</b></p>
                </div>
            </div>
        </div>
    </section>

    <section style="background-color: white;">
        <div class="container">
            <div class="row py-3">
                <div class="col-lg-8 my-2 mb-4">
                    <h1 class="headline mb-4" style="color;">Every question is pieces of people's contribution</h1>
                </div>
                <div class="col-lg-4">
                    <h4 class="mt-2">Click here to read more about this</h4>
                        <a href="/about/teacher/compensation-for-contributors" class="btn btn-info btn-block mt-4"><h3 class="m-3">Read More</h3></a>
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

    <section id="" style="">
        <div class="container">
            <div class="row py-5">
                <div class="col my-2 mb-4">
                    <h1 class="headline mb-4" style="">Or if you want to talk to us first, feel free to leave your phone number below</h1>
                    <form id="submitted" action="/about/submit/phone-number" method="get">
                        <div class="row my-2">
                            <div class="col-md-4 my-2">
                                <label class="big-p">Name:</label>
                                <input name="name" type="text" class="form-control w-100">
                            </div>
                            <div class="col-md-6 my-2">
                                <label class="big-p">Phone number:</label>
                                <input name="phone" type="text" class="form-control w-100">
                            </div>
                            <div class="col-md-2 my-2">
                                <label>&nbsp</label>
                                <input type="submit" value="Submit" class="btn btn-primary btn-block btn-lg">
                            </div>
                        </div>
                    </form>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Your phone number is recorded. We will contact you in a short time :)</strong>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection

<script>
    @section('script')

    @endsection
</script>
