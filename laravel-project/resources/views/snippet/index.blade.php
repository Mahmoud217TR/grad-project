@extends('layouts.app')
@section('title','Snippets')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <a href="{{ route('snippet.create') }}" class="btn button-primary mx-2">Create a Snippet</a>
            <a href="{{ route('snippet.requested') }}" class="btn button-primary mx-2">Requested Snippets</a>
        </div>
    </div>
    @foreach ($snippets->chunk(3) as $snippetChunk)
        <div class="row">
            @foreach ($snippetChunk as $snippet)
                <div class="col-md-4">
                    @include('snippet.card',$snippet)
                </div>
            @endforeach
        </div>
    @endforeach
    <hr>
    <div class="row">
        <div class="col d-flex justify-content-center align-items-center">
            <!-- Previous link -->
            <a class='btn mx-2
                @if($snippets->currentPage() > 1)
                    button-secondary
                @else
                    btn-secondary unclickable
                @endif'
                @if($snippets->currentPage() > 1)
                    href="{{ $snippets->previousPageUrl() }}"
                @else
                    href='#'
                @endif
            >Previous</a>
            

            <!-- Current Page Number -->
            <span class="btn btn-light mx-2 cursor-auto"> {{ $snippets->currentPage() }} </span>

            <!-- Next link -->
            <a class='btn mx-2
                @if($snippets->hasMorePages())
                    button-secondary
                @else
                    btn-secondary unclickable
                @endif'
                @if($snippets->hasMorePages())
                    href="{{ $snippets->nextPageUrl() }}"
                @else
                    href='#'
                @endif
            >Next</a>
        </div>
    </div>
</div>
@endsection