@extends('layouts.app')

<style>
@section('style')
    #heading {
    margin:35px auto 25px auto;
    }

    .left-card	{
    margin-left:50px
    }

    .header {
    text-align:center;
    margin-bottom:15px;
    }

    .card-holder {
    width:270px;
    }

    .card {
    /* Add shadows to create the "card" effect */
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width:230px;
    margin:auto 80px 100px 80px;
    }

    a {
        color:black;
    }

    a:hover {
        color:black;
        text-decoration:  none;
    }

    /* On mouse-over, add a deeper shadow */
    .card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    border:3px #65d898 solid;
    }

    /* Add some padding inside the card container */
    .container {
    padding: 2px 16px;
    }

    #p-title	{
    font-size:25px;
    }

    #text_choose {
        margin-top: -60px;
    }

    @media (max-width: 1250px){
    .left-card {
    margin-left:0px;
    }
    .card	{
    width:75%;
    }

    .card-holder {
    width:230px;
    }

    #text_choose {
        margin-top: -60px;
    }

}

@media (max-width: 1050px){

    .left-card {
        padding-left:0px;
        margin-left:0px;
    }

    .card {
        width:80%;
        margin-left:10%;
        margin-right:10%;
    }

    .card-holder {
        width:22%;
        height:250px;
    }

    #text_choose {
        margin-top: 70px;
    }
    .role_text   {
        font-size:22px;
    }
}

@media (max-width: 820px){

    .left-card {
        padding-left:0px;
        margin-left:0px;
    }

    .card {
        width:80%;
        margin-left:20%;
        margin-right:20%;
    }

    .card-holder {
        width:45%;
        height: 400px;
    }

    #text_choose {
        margin-top: 10px;
    }
    .role_text   {
        font-size:22px;
    }
}

@media (max-width: 700px){
    .left-card {
    margin-left:0px;
    }

    .card	{
    width:85%;
    margin-left:20%;
    margin-right:20;
    }

    .card-holder	{
    width:40%;
    height:315px;
    }

    #text_choose {
        margin-top: 40px;
    }
    .role_text   {
        font-size:22px;
    }
}

@media (max-width: 550px){
    .left-card {
    margin-left:0px;
    }

    .card	{
    width:90%;
    margin-left:20%;
    margin-right:50%;
    }

    .card-holder {
    width:45%;
    height:310px;
    }

    #text_choose {
        margin-top: 80px;
    }

    .role_text   {
        font-size:21px;
    }
}
@media (max-width: 450px) {
    .card	{
        width:90%;
        margin-left:10%;
        margin-right:10%;
    }

    .card-holder {
        width:45%;
        height:300px;
    }

    #text_choose {
        margin-top: 80px;
    }

    .role_text   {
        font-size:16px;
    }
}



@endsection
</style>

@section('content')
<section>
    <div class="row">
        <header class="col-sm-12" id="heading">
            <h1 class="" style="text-align: center">Learn   <span
                    class="txt-rotate"
                    data-period="2000"
                    data-rotate='[ "Smarter", "Simpler", "Easier", "Better", "Faster", "More" , "Deeper" , "Happier" ]'></span>
            </h1><br>
            <h4 style="text-align: center; font-size:2em;">I am a :</h4>
        </header>
    </div>


    <div class="row">
        <div class="container-fluid" style="margin:auto auto auto auto">
            <div class="col-sm-12 register-form">
                <div class="left-card card-holder" style="display:inline-block;">
                    <div class="card">
{{--                        <a href="/register/form?c=student">--}}
                        <a>
                            <img src="images/student.png" alt="Avatar" style="width:100%">
                            <div class="container">
                                <h2 class="role_text"><b>Student <br>(Coming Soon)</b></h2>
                                <p>&nbsp</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="card-holder"	style="display:inline-block">
                    <div class="card">
                        <a href="/register/form?c=teacher">
                            <img src="images/teacher.png" alt="Avatar" style="width:100%">
                            <div class="container">
                                <h2 class="role_text"><b>Teacher</b></h2>
                                <p>&nbsp</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="card-holder" style="display:inline-block">
                    <div class="card">

                        <!--	<a href="register-page-second.php?ca=3"> -->
                        <a>
                            <img src="images/parent.png" alt="Avatar" style="width:100%">
                            <div class="container">
                                <h2 class="role_text"><b>Parent <br>(Coming Soon)</b></h2>
                                <p>&nbsp</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="card-holder"	style="display:inline-block">
                    <div class="card">
                        <!--	<a href="register-page-second.php?ca=4"> -->
{{--                        <a href="/register/form?c=volunteer">--}}
                        <a>
                            <img src="images/volunteer.png" alt="Avatar" style="width:100%">
                            <div class="container">
                                <h2 class="role_text"><b>Volunteer<br>(Coming Soon)</b></h2>
                                <p>&nbsp</p>
                            </div>
                        </a>
                    </div>
                </div>

            </div>

            <h5 id="text_choose" style="text-align: center; margin-bottom:35px; ">choose which one applies to you</h5>
        </div>
    </div>

</section>
@endsection

<script>
    @section('script')

    var TxtRotate = function(el, toRotate, period) {
            this.toRotate = toRotate;
            this.el = el;
            this.loopNum = 0;
            this.period = parseInt(period, 10) || 2000;
            this.txt = '';
            this.tick();
            this.isDeleting = false;
        };

    TxtRotate.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
            this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
            this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

        var that = this;
        var delta = 300 - Math.random() * 100;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
            delta = this.period;
            this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
            this.isDeleting = false;
            this.loopNum++;
            delta = 500;
        }

        setTimeout(function() {
            that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('txt-rotate');
        for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-rotate');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
                new TxtRotate(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".txt-rotate > .wrap { border-right: 0.08em solid #666 }";
        document.body.appendChild(css);
    };
    @endsection
</script>
