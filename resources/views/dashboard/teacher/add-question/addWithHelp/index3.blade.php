@extends('dashboard.teacher.teacherApp')

@section('link-in-head')
    <style>
        .list  {
            padding: 10px;
        }
    </style>
@endsection

@section('dashboard-name')
    teacher's dashboard
@endsection

@section('nav-submit-question')
    class="active"
@endsection

@section('content')
    @if(Session('upload_status') == 1)
    <h1>Succeed!</h1>
    <h3>You have successfully uploaded your question set to us. Please give it a few days for us to upload the questions into Studii. We will contact
    you once we have finished uploading it. Thank you :)</h3>
    <h3>You can contact us at <b>studii.malaysia@gmail.com</b>.</h3>
    @else
    <h1>Failed!</h1>
    <h3>Hm we don't know why. Please contact us to tell us more, so that we can fix this issue, thank you.</h3>
    <h3>You can contact us at <b>studii.malaysia@gmail.com</b>.</h3>
    @endif
@endsection

<script>
    @section('script')
    @endsection
</script>
