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
    }

    @media only screen and (max-width: 462px) {
        .headline {
            font-size: 30px;
        }
    }

    @endsection
</style>

@section('content')
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

    <section class=" py-4" style=";background-image: url({{asset('images/assets/about_joinus_teacher.jpg')}}); background-size: 100%;">
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
                    <p style="font-size:1em">* 1 cent = 1 attempt is apart of the <b>Early Involvement Offer</b>, up until July 2020 only. After that the rate may reduced.</p>
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

    <section id="register-form" style="background-color: #c3d8e8;">
        <div class="container">
            <div class="row py-5">
                <div class="col">
                    <h1 class="headline mb-4" style="color;">If you like the idea, join us!</h1>
                    <p class="big-p mt-4">Just fill in few information about you. Use the scroll to move the form. Thank you so much :)</p>
                    <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSeM6eFUUkAstKOgle2r9OW0Ua95z9bmBjDioS14nt-Lm5_XCw/viewform?embedded=true" width="100%" height="650" frameborder="" marginheight="0" marginwidth="0">Loading…</iframe>
                    <p class="big-p mt-5">If you cannot fill in the form here, you can do it at Google's page too. Just click <a href="https://forms.gle/oQKFEiFLzTphTVi88">here</a>.</p>
                </div>
            </div>
        </div>
    </section>


@endsection

<script>
    @section('script')

    @endsection
</script>
