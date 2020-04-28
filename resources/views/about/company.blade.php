@extends('layouts.app')

@section('link-in-head')

@endsection

<style>
    @section('style')
       @import url('https://fonts.googleapis.com/css?family=Solway&display=swap');

    .headline {
        font-family: 'Solway', cursive;
        font-size:54px;
        color:black;
    }

    .headline-2 {
        font-size: 43px;
        margin:0px auto;
    }

    .big-p {
        font-size:28px;
    }

    @media only screen and (max-width: 780px) {
        .headline {
            font-size: 43px;
        }

        .section-image {
            background-size:50%;
        }

        .headline-2 {
            font-size: 38px;
        }
    }

    @media only screen and (max-width: 780px) {
        .headline {
            font-size: 40px;
        }

        .section-image {
            background-size:200%;
        }

        .headline-2 {
            font-size: 34px;
        }
    }

    @media only screen and (max-width: 462px) {
        .headline {
            font-size: 30px;
        }

        .headline-2 {
            font-size: 28px;
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
                    <p style="font-size:24px; text-align: right; color: white">Studii is a platform that provides exercise questions for SPM school students.
                        <br>Students can practice directly. No download or anything. Just practice!</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5" style="background-color: white">
        <div class="container my-5">
            <div class="my-1 row">
                <div class="col-md-12">
                    <h1 class="headline" style="text-align: center">A chance to impact thousands of students in Malaysia!</h1>
                </div>
                <div class="offset-md-4 col-md-4 mt-5">
                    <img class="d-block ml-auto mr-auto" src="{{asset('images/assets/malaysia.jpg')}}" style="width:100%">
                </div>
                <div class="col-md-12 mt-5" style="text-align: center">
                    <h1 class="headline">Become our <span style="color:green">sponsor</span> for : </h1>
                    <p class="headline-2 mt-5">Only RM1000 a month</p>
                    <p class="headline-2">Minimum one month</p>
                    <p class="headline-2">Stop anytime</p>
                    <p class="big-p mt-3 mt-2">Note: We are only searching for 2 sponsors</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5" style="background-color: #c3d8e8">
        <div class="container my-5">
            <div class="row py-5">
                <div class="col my-2 mb-4 text-center">
                    <h1 class="headline mb-4" style="">What will you get?</h1>
                    <p class="headline-2 mt-5">Company logo in our front page</p>
                    <p class="headline-2">25% Adspace</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5" style="background-color: white">
        <div class="container my-5">
            <div class="row py-5">
                <div class="col my-2 mb-4">
                    <h1 class="headline mb-4" style="">Understanding how Stud<span style="color: green">ii</span> is run</h1>
                    <p class="big-p mt-3"><b>Studii</b> is a self-funded side project by a group of university students who work on this in our free time.</p>
                    <p class="big-p">We have big dreams but we're still young. Most of the times we are clueless on what to do, but we take our time, figure it out slowly,
                    then we work again.</p>
                    <p class="big-p">We would love it to get some adult supervision and advice. By becoming our sponsor, you automatically become our mentor too!</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5" style="background-color: #E8FCCF">
        <div class="container my-5">
            <div class="row pt-3">
                <div class="col my-2 mb-4 text-center">
                    <hr style=" border: 3px solid #96E072; border-radius: 2px;">
                    <h1 class="headline my-4" style="color:#134611;">More detailed contract to be discussed further</h1>
                    <h1 class="headline my-4" style="color:#134611;">~ Negotiation is also okay</h1>

                    <hr style=" border: 2px solid #96E072; border-radius: 1px; width:95%">
                    <hr style=" border: 3px solid #96E072; border-radius: 2px;">
                </div>
            </div>
            <div class="row" style="background-color: #03312E; border-radius: 25px">
                <div class="col-lg-6 p-4">
                    <h1 class="headline-2" style="color:#c5f9df;">Reach the captain - <br><b>Syazani Zulkhairi</b></h1>
                </div>
                <div class="col-lg-6 p-4 text-center" style="background-color: #C5F9DF; border-radius: 25px; border:8px solid #679289">
                    <h1 class="headline-2" style="color:#03312E;"><b>019-209 9853</b></h1>
                    <h1 class="headline-2" style="color:#03312E;"><b>syazanizul@gmail.com</b></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5" style="background: url({{asset('images/assets/stripes.jpg')}}); background-repeat: no-repeat; background-size: auto;">
        <div class="container my-5">
            <div class="row py-5">
                <div class="col py-4 m-1"  style="background-color: #73C1C6; border-radius: 30px; box-shadow: 15px 15px #a8a8a8; border:4px solid #878787">
                    <h1 class="headline ml-3" style="">Or let us contact you instead!</h1>
                    <p class="big-p mb-4 ml-3">Just drop your info below. </p>
                    <form id="submitted" action="/about/for-company/submit" method="post">
                        @csrf
                        <div class="row py-2">
                            <div class="col-md-5 my-2">
                                <label class="big-p">Name:</label>
                                <input name="name" type="text" class="form-control w-100" required>
                            </div>
                            <div class="col-md-5 my-2">
                                <label class="big-p">Company:</label>
                                <input name="company" type="text" class="form-control w-100" required>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-6 my-2">
                                <label class="big-p">Email:</label>
                                <input name="email" type="email" class="form-control w-100" required>
                            </div>
                            <div class="col-md-4 my-2">
                                <label class="big-p">Phone Number:</label>
                                <input name="phone" type="text" class="form-control w-100" required>
                            </div>
                            <div class="col-md-2 my-2">
                                <label>&nbsp</label>
                                <input type="submit" value="Send!" class="btn btn-primary btn-block btn-lg mt-3">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @if(Session::get('success') )
    <section id="info-submitted" class="py-5" style="background-color: white">
        <div class="container">
            <div class="row">
                <div class="col my-2 mb-4 text-center">
                    <p class="headline">Your info is successfully sent!</p>
                </div>
            </div>
        </div>
    </section>
    @endif

@endsection

<script>
    @section('script')

    @endsection
</script>
