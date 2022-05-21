@extends('layouts.app')

@section('title','Reported')

@section('content')
{{--receiving message--}}
<div class="container">

  <div class="row">
    <div class="col text-center pyt-3">
    <h1 class="orange-text pt-5">WE RECIEVE YOUR REPORT</h1>
    <h2 class="orange-text pt-5">THANK YOU DARLING</h2>
    </div>
  </div>
  <div class="row g-3 ">
    <div class="col-2 "></div>

    <div class="col-8 pt-5">
      <div class="row justify-content-center">
        <a href="{{ route('welcome') }}" class="unstyled-anchor">
         @include('components.SVG19',['width'=>80,'height'=>80])
        </a>
      </div>
    </div>

    <div class="col-2"></div>

  </div>

  <div class="row g-3 ">
    <div class="col-4 "></div>

    <div class="col-4 ">
       <div class="row justify-content-center text-center">
         <a href="{{ route('welcome') }}" class="btnReport button-primary TB box ">
            {{ ('go to home page') }}
        </a>
      </div>
    </div>

    <div class="col-4"></div>

  </div>
</div>
@endsection