@extends('layouts.app')
@section('content')
<div class="container pt-3">
    <div class="row my-2 my-md-4">
        <div class="codesubmit container codeinfo py-2 my-4 col-md-7 col-10">
            <h1 class="page-title orange-text ">{{ $code->title }}</h1>
             <hr>
             <p>{{ $code->description }}</p>
             <h2 class="ps-2 orange-text">Available in ({{ $code->snippets->count() }}) Languages:</h2>
              <div class="col-md-4">
                <ul class="list-group">
                  @foreach ($code->snippets as $snippet)
                    <a class="unstyled-anchor1 list-group-item list-group-item-dark" href="{{ route('snippet.show',$snippet) }}"><b>Check this Code in <span class="orange-text">{{ $snippet->language->name }}</span></b></a>
                  @endforeach
                </ul>
              </div>
        </div>
      </div>
    </div>
@endsection