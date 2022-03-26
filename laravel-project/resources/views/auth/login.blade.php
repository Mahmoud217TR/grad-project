@extends('layouts.app')
@section('title','Login')

@section('header')
<style>
body{
    background: url("{{ asset('images/background.jpg') }}");
    background-size:cover;
}
</style>
@endsection
@section('content')

<div class="container py-5 my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col">
            <div class="card registration-box">
                <div class="card-body">
                    <div class="border-bottom border-2">
                        <div class="text-center pb-2 head-line">Welcome To {{ config('app.name', 'Laravel') }}</div>
                        <div class="row row-cols-auto justify-content-center py-3">
                            <a class="mx-auto my-1 unstyled-anchor" href="{{ route('register') }}"><p class="base-line">New Account</p></a>
                            <a class="mx-auto my-1 bottom-line unstyled-anchor" href="{{ route('login') }}"><p class="base-line">Login</p></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row mb-3 px-4">
                            <label for="email" class="col-form-label text-start">{{ __('Email Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 px-4">
                            <label for="password" class="col-form-label text-start">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 px-4">
                            <div class="py-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0 text-center">
                            <div class="py-2">
                                @if (Route::has('password.request'))
                                    <a class="unstyled-anchor" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                            <div class="py-2">
                                <button type="submit" class="btn button-primary TB ">
                                    {{ __('Submit') }}
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
