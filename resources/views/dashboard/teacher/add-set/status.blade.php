@extends('dashboard.teacher.teacherApp')

@section('link-in-head')

@endsection

@section('dashboard-name')
    Contribute Set 	&#8594; Template &#8594; Submit
@endsection

@section('nav-submit-question')
    class="active"
@endsection

@section('content')

    @if(isset($status))

    @if($status == 1)
    <div class="row">
        <div class="col-lg-10">
            <p style="font-size:4em; color:green" class="font-weight-bold">Success :)</p>
            <p style="font-size:1.8em">Thank you! We will spend about 1-2 days to upload the set you just uploaded. After it is ready, we will notify you.</p>
        </div>
    </div>
    @elseif($status == 0)
    <div class="row">
        <div class="col-lg-10">
            <p style="font-size:4em; color:red" class="font-weight-bold">Fail :(</p>
            <p style="font-size:1.8em">We do not understand why. Can you please contact us at 019-209 9853 to tell us what happened? We need to know your feedback to ensure this
            does not repeat in the future.</p>
        </div>
    </div>
    @endif

    @else

        <p style="font-size:4em; color:red" class="font-weight-bold">Fail, this is a bug :(</p>

    @endif

@endsection

<script>
    @section('script')

    @endsection
</script>

