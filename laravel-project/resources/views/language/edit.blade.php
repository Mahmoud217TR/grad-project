@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center pyt-1">
        <h1 class="page-title orange-text pt-5">Edit {{ $language->name }} Code</h1>
        </div>
    </div>
    <div class="row my-2 my-md-4">
        <div class="codesubmit container  py-4 my-4 col-md-7 col-10">
            <form method="POST" action="{{ route('language.update',$language->id) }}">
                @method('patch')
                @csrf
                @include('language.form',['language'=>$language])
                <div class="row mb-0 text-center">
                    <div class="py-2">
                        <button type="submit" class="btn button-primary TB ">
                            {{ __('Update') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
      </div>

    </div>
@endsection