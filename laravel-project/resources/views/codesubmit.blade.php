@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center pyt-1">
        <h1 class="page-title orange-text pt-5">your code</h1>
        </div>
    </div>
    <div class="row my-2 my-md-4">
        <div class="codesubmit container  py-4 my-4 col-md-7 col-10">
            <form method="POST" action="{{ route('codesubmit') }}">
                @csrf

                <div class="row mb-3 px-5">
                    <label for="codetitle" class="col-form-label text-start ">{{ __('Code Title') }}</label>

                    <div class="">
                        <input id="codetitle" type="text" class="form-control @error('codetitle') is-invalid @enderror" name="codetitle" value="{{ old('codetitle') }}" required autofocus>
                    </div>
                </div>

                <div class="row mb-3 px-5">
                        <label for="codedescription" class="col-form-label text-start">{{ __('Code Description') }}</label>

                        <div class="">
                            <textarea  rows="5" id="codedescription"  class="form-control @error('codedescription') is-invalid @enderror" name="codedescription" value="{{ old('codedescription') }}" required >

                            </textarea>
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

    </div>
@endsection