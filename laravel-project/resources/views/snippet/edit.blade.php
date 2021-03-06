@extends('layouts.app')
@section('title','Edit Snippet')
@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center pyt-1">
        <h1 class="page-title orange-text pt-5">Edit {{ $snippet->code->title }} For {{ $snippet->language->name }}</h1>
        </div>
    </div>
    <div class="row my-2 my-md-4">
        <div class="codesubmit container  py-4 my-4 col-md-7 col-10">
            <form method="POST" action="{{ route('snippet.update',$snippet->id) }}">
                @method('patch')
                @csrf
                @include('snippet.form',['snippet'=>$snippet,'codes'=>$codes,'languages'=>$languages])
                <div class="row mb-0 text-center">
                    <div class="py-2">
                        <button type="submit" class="btn button-primary TB ">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
      </div>

    </div>
@endsection