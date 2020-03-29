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

    #register-form li  {
        background-color:#141414;
        border-top:2px solid #323232;
        border-bottom:2px solid #323232;
    }

    #register-form li:hover  {
        border-top:2px solid #323232;
        border-bottom:2px solid #323232;
    }

    #btn-submit {
        color:#FFAC41;
        border:2px solid #FFAC41;
        background-color: #454545;
    }

    #btn-submit:hover {
        color:#141414;
        border:2px solid #FFAC41;
        background-color: #f7b865;
        cursor:pointer;
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
    <section class="mt-3">
        <div class="container" style="margin-bottom: 50px">
            <div class="my-1 row">
                <div class="col-lg-7">
                    <h1 class="headline">Contact Us</h1>
                    <p class="big-p my-1">We would love to help you with anything you need. Whether it is a question, a suggestion, or anything else. <br>Feel free :)</p>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-4" style="text-align: center">
                    <div class="mt-4">
                        <h4>Email :</h4>
                        <h2><b>studii.malaysia@gmail.com</b></h2>
                    </div>
                    <div class="mt-4">
                        <h4>Telephone, Whatsapp :</h4>
                        <h3><b>019-209 9853 <br>(Syazani Zulkhairi)</b></h3>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section id="register-form" style="background-image:url('images/assets/kuala.jpg');  background-repeat: no-repeat; background-size: 100%;">
        <div class="container">
            <div class="row py-5">
                <div class="col-lg-6 offset-lg-3">
                    <form method="get" action="/contact/submit">
                        <div class="card mb-1" style="font-size: 1.2em; background-color: #141414; color:#FFAC41; border: 6px solid #FFAC41">
                            <div class="card-body">
                                <h1 class="headline text-center" style="font-size:2.9em; color:#FFAC41">How can we help?</h1>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="my-2">
                                        <label for="name" class="d-inline-block mx-2">Your Name</label>
                                        <input type="text" name="name" class="form-control d-inline-block w-75" placeholder="What is your name?">
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="my-2">
                                        <label for="email" class="d-inline-block mx-2">Your Email</label>
                                        <input type="email" name="email" class="form-control d-inline-block w-75" placeholder="So that we can reply to you later">
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <label for="message">Your Message</label>
                                    <textarea name="message" class="form-control" style="width: 100%" rows="6" placeholder="What is your message?"></textarea>
                                    <br>
                                    <br>
                                    <input id="btn-submit" type="submit" value="Send Message" class="btn-lg float-right">
                                </li>
                            </ul>
                        </div>
                    </form>

                    @if(Session('update_status'))
                    <div style="font-size: 1.2em; background-color: #141414; color:#FFAC41; border: 6px solid #FFAC41; border-radius: 30px">
                        @if(Session('update_status') == 1)
                            <p style="font-size:1.3em; text-align: center; margin:1em; ">Message sent! We will reply to your soon.</p>
                        @else
                            <p style="font-size:1.3em; text-align: center; margin:1em; ">There is an error. Your message is not sent.</p>
                        @endif
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
