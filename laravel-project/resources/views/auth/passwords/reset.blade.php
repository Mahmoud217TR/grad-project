@extends('layouts.app')
@section('title','reset passowrd')
@section('header')
<style>
body{
    background: url("{{ asset('images/background.jpg') }}");
    background-size: cover;
}
</style>
@endsection
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col">
            <div class="card registration-box">
                <div class="card-body">
                    <div class="border-bottom border-2">
                        <div class="text-center pb-2 head-line">{{ __('Reset Password') }}</div>
                      </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end"><p class="base-line">{{ __('Email Address') }}</p></label>

                            <div class="col-md-6 py-2">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end"><p class="base-line">{{ __('Password') }}</p></label>

                            <div class="col-md-6 py-2">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end"><p class="base-line">{{ __('Confirm Password') }}</p></label>

                            <div class="col-md-6 py-2">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0 text-center">
                            <div class="py-2">
                                <button type="submit" class="btn button-primary TB" >
                                    {{ __('reset') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
