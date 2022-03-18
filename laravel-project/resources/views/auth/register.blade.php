@extends('layouts.app')
<style>
    body{
      background: url("{{ asset('images/background.jpg') }}");
      background-size: cover;
    }
  </style>
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card registration-box">
                <div class="card-body">
                    <div class="border-bottom border-2">
                        <div class="text-center pb-2 head-line">Welcom To {{ config('app.name', 'Laravel') }}</div>
                        <div class="row row-cols-auto justify-content-center py-3">
                           <a class="mx-auto my-1 bottom-line unstyled-anchor" href="/register"><p class="base-line">New Account</p></a>
                           <a class="mx-auto my-1 unstyled-anchor" href="/logIn"><p class="base-line">Log In</p></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3 px-5">
                            <label for="name" class="col-form-label text-start ">{{ __('Name') }}</label>

                            <div class="">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 px-5">
                            <label for="email" class="col-form-label text-start">{{ __('Email Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 px-5">
                            <label for="password" class="col-form-label text-start">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 px-5">
                            <label for="password-confirm" class="col-form-label text-start">{{ __('Confirm Password') }}</label>

                            <div class="">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3 px-5">
                            <label for="bdate" class="col-form-label text-start">{{ __('Birth Date:') }}</label>

                            <div class="">
                                <input id="bdate" type="date" class="form-control @error('bdate') is-invalid @enderror" name="bdate" value="{{ old('bdate') }}" required autocomplete="bdate">

                                @error('bdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0 text-center">
                            <div class="py-2">
                                <button type="submit" class="btn button-primary TB ">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="text-center registration-box my-5">
                <div class="row justify-content-center text-center py-1 head-line">or register with</div>
                <a class="row row-cols-auto justify-content-center pt-3 my-2 mx-5 box-or unstyled-anchor" href="/">
                    <i class="bi bi-google py-2"></i>
                    <p class="base-line py-2">your google account</p>
                </a>
                <a class="row row-cols-auto justify-content-center pt-3 my-2 mx-5 box-or unstyled-anchor" href="/">
                    <i class="bi bi-facebook py-2"></i>
                    <p class="base-line py-2">your facebook account</p>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
