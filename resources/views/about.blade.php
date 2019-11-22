@extends('layouts.app')

@section('link-in-head')

@endsection

<style>
    @section('style')
        @import url('https://fonts.googleapis.com/css?family=Lobster+Two&display=swap');

        #headline {
            margin-top: 1em;
            font-family: 'Lobster Two', cursive;
            font-size:60px;
            color:black;
        }

    @endsection
</style>

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 id="headline">Meet the crew</h1>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="row">
            <div style="min-height:300px;">
            </div>
        </div>
    </section>

@endsection

<script>
    @section('script')

    @endsection
</script>
