@extends('layouts.app')
@section('title','confirm passowrd')
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
                        <div class="text-center pb-2 head-line">{{ __('Confirm Password') }}</div>
                      </div>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4"><p class="base-line">{{ __('Please confirm your password before continuing.') }}</p></div>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="row">
                            <label for="password" class="col-md-4 col-form-label text-md-end"><p class="base-line">{{ __('password') }}</p></label>

                            <div class="col-md-6 py-2">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0 text-center">
                            <div class="py-2">
                                <button type="submit" class="btn button-primary TB" >
                                    {{ __('confirm') }}
                                </button>
                                @if (Route::has('password.request'))
                                <a class="btn unstyled-anchor" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
