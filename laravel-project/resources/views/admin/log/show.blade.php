@extends('layouts.app')
@section('title',$log->title)

@section('content')
<div class="container pt-3">
    <div class="row my-2 my-md-4">
        <div class="codesubmit container codeinfo py-2 my-4 col-md-7 col-10">
            <h1 class="page-title orange-text ">{{ $log->title }}</h1>
             <hr>
             <p>{{ $log->data }}</p>
             <p class="text-muted">Recorded at {{ $log->created_at }}</p>
        </div>
      </div>
    </div>
</div>
@endsection