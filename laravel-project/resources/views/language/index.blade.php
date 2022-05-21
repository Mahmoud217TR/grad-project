@extends('layouts.app')
@section('title','Languages')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            @auth
                <a href="{{ route('language.create') }}" class="btn button-primary mx-2">Create a Language</a>
                @if (auth()->user()->isWebAdmin())
                    <a href="{{ route('language.requested') }}" class="btn button-primary mx-2">Requested Languages</a>
                @endif
            @endauth
        </div>
    </div>
    @foreach ($languages->chunk(3) as $languageChunk)
        <div class="row">
            @foreach ($languageChunk as $language)
                <div class="col-md-4">
                    @include('language.card',$language)
                </div>
            @endforeach
        </div>
    @endforeach
    <hr>
    <div class="row">
        <div class="col d-flex justify-content-center align-items-center">
            <!-- Previous link -->
            <a class='btn mx-2
                @if($languages->currentPage() > 1)
                    button-secondary
                @else
                    btn-secondary unclickable
                @endif'
                @if($languages->currentPage() > 1)
                    href="{{ $languages->previousPageUrl() }}"
                @else
                    href='#'
                @endif
            >Previous</a>
            

            <!-- Current Page Number -->
            <span class="btn btn-light mx-2 cursor-auto"> {{ $languages->currentPage() }} </span>

            <!-- Next link -->
            <a class='btn mx-2
                @if($languages->hasMorePages())
                    button-secondary
                @else
                    btn-secondary unclickable
                @endif'
                @if($languages->hasMorePages())
                    href="{{ $languages->nextPageUrl() }}"
                @else
                    href='#'
                @endif
            >Next</a>
        </div>
    </div>
</div>
@endsection