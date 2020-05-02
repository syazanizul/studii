@extends('layouts.app')

<style>
@section('style')
    .title-1   {
        font-size:1.7em;
        font-weight: bold;
    }

    .title-2    {
        font-size:1.3em;
        font-weight: bold;
    }
@endsection
</style>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mt-4 p-4" style="background-color: white; box-shadow: #9CAFB7 15px 15px; border: 2px solid grey;">
                <p class="title-1">Data Protection Statement</p>
                <div>
                    <div>
                        <p class="title-2">Scope of the processing of personal data</p>
                        <p>We only collect and use our users’ personal data of insofar as this is necessary to provide a functional website as well as our contents and services. The collection and use of our users’ personal data takes place regularly and only with the user's consent. An exception applies in those cases where prior consent cannot be obtained for real reasons and the processing of the data is permitted by law.</p>
                        <p>Studii is entitled, with your voluntary consent, to collect, process and store, combine with other data, archive and use your personal data for the purpose of serving your study related needs better. You give your consent either in writing or by clicking on the corresponding declaration. In particular, personal data will only be passed on to third parties if you have given your express prior consent or if we are obliged to surrender the data, for example due to an official order.</p>
                    </div>
{{--                    <div class="mt-4">--}}
{{--                    </div>--}}
                </div>

            </div>
        </div>
        <div style="height:100px"></div>
    </div>
@endsection
