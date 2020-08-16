@extends('dashboard.teacher.teacherApp')

@section('dashboard-name')
    teacher's dashboard
@endsection

@section('link-in-head')
    <style>
    </style>
@endsection

@section('nav-promo')
    class="active"
@endsection

@section('content')
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <p style="font-size:2.3em">Promo <span class="font-weight-bold">30 questions = RM50</span>.</p>
                        <div style="font-size:1.50em; font-family: 'Rubik', sans-serif;">
                            <p>The process:</p>
                            <ol style="line-height: 1.8em;">
                                <li @if($stage == 0) class="font-weight-bold"  @endif>Fill in your details in the user details column. @if($stage > 0) <span class="font-weight-bold" style="color:green">&#10003</span>  @endif</li>
                                <li @if($stage == 1) class="font-weight-bold"  @endif>Upload your question set containing 30 questions. @if($stage > 1) <span class="font-weight-bold" style="color:green">&#10003</span>  @endif</li>
                                <li @if($stage == 2) class="font-weight-bold"  @endif>Wait for us to verify your contribution. @if($stage > 2) <span class="font-weight-bold" style="color:green">&#10003</span>  @endif</li>
                                <li @if($stage == 3) class="font-weight-bold"  @endif>Tell us your banking details. @if($stage > 3) <span class="font-weight-bold" style="color:green">&#10003</span>  @endif</li>
                                <li @if($stage == 4) class="font-weight-bold"  @endif>The money is transferred. @if($stage > 4) <span class="font-weight-bold" style="color:green">&#10003</span>  @endif</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        @if($stage == 5)
                            <p class="font-weight-bold text-center" style="font-size:2em; color:green">CLAIMED</p>
                        @else
                            <p class="font-weight-bold text-center" style="font-size:2em; color:red">NOT CLAIMED</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @if($stage != 5)
        <div class="row">
            <div class="col-lg-11">
                <div class="card">
                    <div class="card-body">
                        <p style="font-size:1.7em">Terms and conditions</p>
                        <div style="font-size:1.4em; font-family: 'Rubik', sans-serif;">
                            <ul>
                                <li class="my-3">This promo is valid for SPM subjects only.</li>
                                <li class="my-3">As a general rule, any contribution from all subjects are welcomed at Studii. However, right now we
                                    are focusing more on science subjects such as Science, Add Math, Math, Physics, Biology, and Chemistry.</li>
                                <li class="my-3">This promo is valid only once for each teacher. Teachers will need to verify their identity by submitting us their CV.</li>
                                <li class="my-3">The submitted questions must be of teacher's original work and not copied from any other sources. </li>
                                <li class="my-3">The submission must be of good quality work. Studii is made so that students can have access to high quality questions
                                for free, so we really appreciate all the good questions that can help students to study better.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
            <div class="row">
                <div class="col-lg-11">
                    <div class="card">
                        <div class="card-body">
                            <p style="font-size:1.7em" class="font-weight-bold">Do you know that your contributions will continue to give you earnings?</p>
                            <div style="font-size:1.4em; font-family: 'Rubik', sans-serif;">
                                <p>Studii runs using crowdsourced questions. Crowdsourced from where? From great teachers like you.</p>
                                <p>Everytime any of your 30 questions is attempted by students, you will be compensated for it at a price of 1 cent
                                    (not the actual value. Actual value depends on the length of question).</p>
                                <p>You can track how many attempts students made on your question everyday at your dashboard.</p>
                                <p>Also, you can continue to contribute more questions! The more you contribute, the more abundant Studii's library becomes, which means the more
                                questions the students can practice with :)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
@endsection

@section('modal')

@endsection

<script>
    @section('script')

    @endsection
</script>
