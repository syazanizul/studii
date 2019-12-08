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
                <div class="col-md-12">
                    <h1 class="headline mb-4">Disclaimer</h1>
                    <p class="big-p my-1">Studii is an online open-content study platform. This means, Studii merely provide a platform where students can come and practice exercise questions, but Studii does not necessarily own the exercise questions. Even though Studii does own some, most of the exercise questions provided come from our collaborators, the school teachers who submitted their own work of exercise questions to us.
                        <br><br>
                        Studii has clearly instructed our collaborators, which are the teachers, that their contributions to Studii must be owned and made by themselves.
                        <br><br>
                        Studii is not responsible for any exercise questions that we receive from teachers. Those exercise questions that we receive are rightfully owned by that teacher, and any copyright issues must be directed to them.
                    </p>
                </div>
            </div>
        </div>
    </section>



@endsection

<script>
    @section('script')

    @endsection
</script>
