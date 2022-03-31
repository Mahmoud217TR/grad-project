@extends('layouts.app')
@section('title','New Code')
@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center pyt-1">
        <h1 class="page-title orange-text pt-5">Add a new Code</h1>
        </div>
    </div>
    <div class="row my-2 my-md-4">
        <div class="codesubmit container  py-4 my-4 col-md-7 col-10">
            <form method="POST" action="{{ route('code.store') }}">
                @csrf
                @include('code.form',['code'=>$code])
                <div class="row mb-0 text-center">
                    <div class="py-2">
                        <button type="submit" class="btn button-primary TB ">
                            {{ auth()->user()->isWebAdmin()?'Create':'Request' }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
      </div>

    </div>
@endsection