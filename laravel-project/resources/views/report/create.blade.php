@extends('layouts.app')
@section('title', 'Report')

@section('content')
{{--create report--}}
<div class="container">
  <div class="row">
    <div class="col text-start pyt-1">
      <h1 class="orange-text pt-5">TELL US WHAT'S HAPPENING... ?</h1>
    </div>
  </div>
  <div class="row my-2 my-md-4">
    <div class="codesubmit container  py-3 my-4 col-md-7 col-10 ps-3">
      <form method="POST" action="{{ route('report.store') }}" class="ps-3">
        @csrf
        @guest
        <div class="row pt-2 col-3">
          <label for="email" class="col-form-label text-start">{{ __('Your Email :') }}</label>
        </div>
        <div class="row">
          <div class="col-6">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
        </div>
        @else
        <input id="email" type="email" name='email' hidden value="{{ auth()->user()->email }}">
        <input id="user_id" type="text" name='user_id' hidden value="{{ auth()->id() }}">
        @endguest
        <div class="row pt-2">
          <div class=" col-3">
            <label> Title :</label>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <input type="text" class="form-control box" id="title" name='title'>
          </div>
        </div>
        <div class="row pt-3">
            <div class="form-group col-11">
                <label for="description">Explain the problem</label>
                <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                @error('description')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
        </div>
        <div class="row justify-content-center  justify-content-md-end  mx-1 pt-4">
            <div class="col-md-3 text-end col-5 mb-3">
                <button type="submit" class="btn button-pri-sheet TB box ">
                    {{ ('Submit') }}
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