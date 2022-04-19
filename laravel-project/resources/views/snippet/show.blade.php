@extends('layouts.app')
@section('title',$snippet->code->title.' for '.$snippet->language->name)
@section('content')
<div class="container pt-3">
    <div class="row my-2 my-md-4">
        <div class="codesubmit container codeinfo py-2 my-4 col-md-7 col-10">
            <h1 class="page-title orange-text">{{ $snippet->code->title }} <span class="text-light">For</span> {{ $snippet->language->name }}</h1>
             <hr>
                <md-component content="```{{  $snippet->code_snippet  }}```"></md-component>
             <hr>
             <h2 class="ps-2 orange-text">Note:</h2>
             <p>{!! $snippet->note !!}</p>
             <hr>
             <h2 class="ps-2 orange-text">Other Languages ({{ $snippet->code->snippets->count() }}):</h2>
             <div class="col-md-4">
                <ul class="list-group">
                    @foreach ($snippet->code->snippets as $similar_snippet)
                        <a class="unstyled-anchor1 list-group-item list-group-item-dark @if($similar_snippet->id==$snippet->id)active @endif" href="{{ route('snippet.show',$similar_snippet) }}"><b>Check this Code in <span class="@if($similar_snippet->id==$snippet->id)text-Secondary @else orange-text @endif">{{ $similar_snippet->language->name }}</span></b></a>
                    @endforeach
                 </ul>
             </div>
        </div>
      </div>
    </div>
</div>
@endsection