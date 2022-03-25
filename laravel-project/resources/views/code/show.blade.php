@extends('layouts.app')
@section('content')
<div class="container pt-3">
    <div class="row my-2 my-md-4">
        <div class="codesubmit container codeinfo py-2 my-4 col-md-7 col-10">
            <h1 class="page-title orange-text ">{{ $code->title }}</h1>
             <hr>
             <p>{{ $code->description }}</p>
        </div>
      </div>

    </div>
@endsection