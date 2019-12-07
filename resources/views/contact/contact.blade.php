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
                <div class="col-lg-7">
                    <h1 class="headline">Contact Us</h1>
                    <p class="big-p my-1">In order to improve, we want to know what do you think of the platform and the ideas. We appreciate all kinds of responses.</p>
                    <p class="big-p my-4"><b>You have a direct impact in our direction, so feel free</b></p>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-4" style="text-align: center">
                    <div class="mt-4">
                        <h4>Email :</h4>
                        <h2><b>studii.malaysia@gmail.com</b></h2>
                    </div>
                    <div class="mt-5">
                        <h4>Telephone, Whatsapp :</h4>
                        <h3><b>019-209 9853 <br>(Syazani Zulkhairi)</b></h3>
                    </div>
                </div>
            </div>

        </div>
    </section>



    <section id="register-form" style="background-color: #c3d8e8;">
        <div class="container">
            <div class="row py-5">
                <div class="col">
                    <h1 class="headline mb-4" style="color;">You can also reach us using this simple form <below></below></h1>
                    <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSdVCuNBiShsipWec0PtR4YE8UHm1rmuD-6t0uRsxq2MTzSXRg/viewform?embedded=true" width="100%" height="650" frameborder="" marginheight="0" marginwidth="0">Loading…</iframe>
                    <div style="height:40px"></div>
                </div>
            </div>
        </div>
    </section>

    <section id="register-form" style="background-color: ;">
        <div class="container">
            <div class="row py-5">
                <div class="col">
                    <h1 class="headline mb-4" style="color;">Feedback Form</h1>
                    <p class="big-p mt-4">Your contribution will mean so much for our improvement, thank you</p>
                    <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSeC75Mey4ZfUA2NiLZK0o8aVLo5ChmvtSMmybuLCR1LjTeOww/viewform?embedded=true" width="100%" height="650" frameborder="" marginheight="0" marginwidth="0">Loading…</iframe>
                    <p class="big-p mt-5">If you cannot fill in the form here, you can do it at Google's page too. Just click <a href="https://docs.google.com/forms/d/e/1FAIpQLSeC75Mey4ZfUA2NiLZK0o8aVLo5ChmvtSMmybuLCR1LjTeOww/viewform?usp=sf_link">here</a>.</p>
                </div>
            </div>
        </div>
    </section>


@endsection

<script>
    @section('script')

    @endsection
</script>
