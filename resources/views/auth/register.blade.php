@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if($category == 'teacher')
        <div class="col-md-8">
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <p>As a start, we are focusing on <b>PT3</b> and <b>SPM</b> subjects first. However, if you are teaching for <b>UPSR</b>, <b>STAM</b> or <b>STPM</b>, but you
                would like to join us, you can still register. </p>
            </div>
        </div>
        @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-transform: capitalize">{{ __('Register') }} As A <b>{{$category}}</b></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-4">
                                <input id="firstname" type="text" class="form-control @error('name') is-invalid @enderror" name="firstname" value="{{ old('name') }}" placeholder="First name" required autocomplete="given-name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="lastname" type="text" class="form-control @error('name') is-invalid @enderror" name="lastname" value="{{ old('name') }}" placeholder="Last name" required autocomplete="family-name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" style="width: 100%">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-3 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <input type="hidden" name="role" value="{{$role}}">

                        <button type="submit" class="float-right btn btn-lg btn-primary m-3">
                            {{ __('Register') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8 mt-4 p-4" style="background-color: white; box-shadow: #9CAFB7 15px 15px; border: 2px solid grey;">
            <div>
                <p><b>Data Protection Statement</b></p>
{{--                <p>We attach great importance to the protection of your personal data. We therefore strictly adhere to the legal provisions governing the admissibility of the handling of personal data and have taken appropriate technical and organisational precautions. The following declaration gives you an overview of how we guarantee this protection and what kind of data we collect for what purpose.</p>--}}
                We attach great importance to the protection of your personal data. We therefore strictly adhere to the legal provisions governing the admissibility of the handling of personal data and have taken appropriate technical and organisational precautions.
                <p>Click here for the declaration. <a href="/register/data-protected" class="btn btn-primary mx-4 my-2">Read Declaration</a></p>
                <p>By registering in Studii, you admit that you understand that your data saved and generated in Studii will not be exploited or sold, unless
                    for the the benefit of you, in which will be check and approved by you first.</p>
            </div>
        </div>
    </div>
    <div style="height:100px"></div>
</div>
@endsection
