@extends('layouts.app')

@section('title','Codes')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <a href="{{ route('code.create') }}" class="btn button-primary">Create a new Code</a>
        </div>
    </div>
    @foreach ($codes->chunk(3) as $codeChunk)
        <div class="row">
            @foreach ($codeChunk as $code)
                <div class="col-md-4">
                    @include('code.card',$code)
                </div>
            @endforeach
        </div>
    @endforeach
    <hr>
    <div class="row">
        <div class="col d-flex justify-content-center align-items-center">
            <!-- Previous link -->
            <a class='btn mx-2
                @if($codes->currentPage() > 1)
                    button-secondary
                @else
                    btn-secondary unclickable
                @endif'
                @if($codes->currentPage() > 1)
                    href="{{ $codes->previousPageUrl() }}"
                @else
                    href='#'
                @endif
            >Previous</a>
            

            <!-- Current Page Number -->
            <span class="btn btn-light mx-2 cursor-auto"> {{ $codes->currentPage() }} </span>

            <!-- Next link -->
            <a class='btn mx-2
                @if($codes->hasMorePages())
                    button-secondary
                @else
                    btn-secondary unclickable
                @endif'
                @if($codes->hasMorePages())
                    href="{{ $codes->nextPageUrl() }}"
                @else
                    href='#'
                @endif
            >Next</a>
        </div>
    </div>
</div>
@endsection