@extends('layouts.app')
@section('title',$language->name)
@section('content')
    <div class="container pt-3">
        <div class="row my-2 my-md-4">
            <div class="codesubmit container codeinfo py-2 my-4 col-md-7 col-10">
                <h1 class="page-title orange-text ">{{ $language->name }}</h1>
                <hr>
                <p>{!! $language->description !!}</p>
            </div>
        </div>
    </div>

@endsection
