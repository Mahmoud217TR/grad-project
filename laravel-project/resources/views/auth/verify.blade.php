@extends('layouts.app')
@section('header')
<style>
body{
    background: url("{{ asset('images/background.jpg') }}");
    background-size: cover;
    background-size: 100% 100%;
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
                      <div class="text-center pb-2 head-line">{{ __('Verify Your Email Address') }}</div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                   
                   <p class="base-line">{{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email,') }}</p>
                    <form class="" method="POST">
                        @csrf
                        <div class="row mb-0 text-center">
                            <div class="py-2">
                               <p>"Click the button to request another"</p>
                                <button type="submit" class="btn button-primary TB" action="{{ route('verification.resend') }}" >
                                    {{ __('request') }}
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
