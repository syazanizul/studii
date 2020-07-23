@extends('dashboard.tutor.tutorApp')

@section('nav-contribute')
    class="active"
@endsection

@section('content')
    @isset($question_set_1)
        <section id="div-no-set-yet">
            <div>
                <div class="row">
                    <div class="col-lg-12">
                        <h3>You are not working on any set right now</h3>
                    </div>
                </div>
            </div>
            <div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="font-weight-bold">Choose a set here</h5>
                            <p>Once you have chosen a set, you will have to upload all the questions in that set first before choosing another set.</p>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>No</th>
                                <th>File Name</th>
                                <th>Download</th>
                                <th>By</th>
                                <th>Action</th>
                                </thead>
                                <tbody>

                                @foreach($question_set_1 as $m)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td class="font-weight-bold">{{$m->file_name_actual}}</td>
                                        <td><a href="{{asset('/storage/question_set/'.$m->file_name_actual)}}" class="btn btn-secondary" download>Download</a></td>
                                        <td>{{\App\User::find($m->submitter_id)->firstname}} {{\App\User::find($m->submitter_id)->lastname}}</td>
                                        <td><a href="/tutor/contribute/choose-set/{{$m->id}}" class="btn btn-primary">DO THIS SET</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section id="div-set-info">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3>Question Set Property</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>File Name: <span class="font-weight-bold">{{$have_set->first()->file_name_actual}}</span></p>
                                    <p>Created By: <span class="font-weight-bold">{{\App\User::find($have_set->first()->submitter_id)->firstname}} {{\App\User::find($have_set->first()->submitter_id)->lastname}}</span></p>
                                    <p>Created Date: <span class="font-weight-bold">{{$have_set->first()->created_at->format('d M Y')}}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <p>File name:</p>
                            <p>{{$have_set->first()->file_name_actual}}</p>
                            <a href="/storage/question_set/{{$have_set->first()->file_name_actual}}" class="btn btn-primary m-0 mb-3" download>Download file</a>
                            <p>Note: The file name will be added with some random digits to ensure no file share the same name.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @if($set_element_done->get()->isNotEmpty())
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            <h5>Uploaded Questions:</h5>
                            <h2 class="d-inline-block"><b>{{$set_element_done->count()}}</b></h2>
                            <a href="/tutor/contribute/see-set/{{$have_set->first()->id}}" class="btn btn-secondary d-inline-block ml-5 mt-0">See</a>
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-lg-6">
                    <a href="/tutor/contribute/add-property/{{$have_set->first()->id}}" class="btn btn-primary btn-lg btn-block m-3">Add Question</a>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-lg-8"></div>
                @if($set_element_done->get()->isNotEmpty())

                <div class="col-lg-4">
                    <div class="card m-3">
                        <div class="card-body">
                            <p>More Stuff:</p>
                            <form action="/tutor/contribute/see-set/declare-uploaded/{{$have_set->first()->id}}" method="post">
                                @csrf
                                <input type="submit" value="Declare Set Finish" class="btn btn-primary btn-lg btn-block">
                            </form>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </section>

    @endisset
@endsection
