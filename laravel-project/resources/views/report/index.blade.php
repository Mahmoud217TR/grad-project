@extends('layouts.app')
@section('title',"Reports")

@section('content')
{{--report index--}}
<div class="container">
  <div class="row">
    <div class="col text-start">
        <h1 class=" orange-text pt-4">REPORTS</h1>
    </div>
  </div>
  <div class="row">
    @forelse ($reports as $report)  
    <a href="{{ route('report.show',$report) }}">
      <div class="col-11 text-truncate text-start px-2">
        {{ $report->title }}, {{ $report->description }}
      </div>
    </a>
    @empty
        <div class="col">
          <div class="display-5">
            No Reports Yet.
          </div>
        </div>
    @endforelse
    </div>
  <hr>
  <div class="row">
      <div class="col d-flex justify-content-center align-items-center">
          <!-- Previous link -->
          <a class='btn mx-2
              @if($reports->currentPage() > 1)
                  button-secondary
              @else
                  btn-secondary unclickable
              @endif'
              @if($reports->currentPage() > 1)
                  href="{{ $reports->previousPageUrl() }}"
              @else
                  href='#'
              @endif
          >Previous</a>
          

          <!-- Current Page Number -->
          <span class="btn btn-light mx-2 cursor-auto"> {{ $reports->currentPage() }} </span>

          <!-- Next link -->
          <a class='btn mx-2
              @if($reports->hasMorePages())
                  button-secondary
              @else
                  btn-secondary unclickable
              @endif'
              @if($reports->hasMorePages())
                  href="{{ $reports->nextPageUrl() }}"
              @else
                  href='#'
              @endif
          >Next</a>
      </div>
</div>
@endsection