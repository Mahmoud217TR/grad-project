@extends('layouts.app')
@section('title',"Sheets")
@section('content')
{{--view cheats,edit&delete--}}
<div class="container">
  <div class="row g-3">
    <div class="col-md-4 text-start pt-5 ">
      <h1 class=" orange-text my-3">Sheets</h1>
    </div>
    <div class="col text-end pt-4 "style="margin-left: +150px">
      @auth
        <a href="{{ route('sheet.create') }}" class="btn button-pri-sheet TB ">create</a>
      @endauth
    </div>
    <div class="row g-3">
      @forelse ($sheets as $sheet)
      
        <div class="col-xl-4 col-lg-2 col-md-1">
          <div class="p-4 card bg-dark">
            <h5 class="orange-text bold bottom-line">{{ $sheet->title }}</h5>
            <div class="row">
              <div class="text-truncate my-3">
                {!! $sheet->description !!}
              </div>
            </div>
            <div class="row g-2 justify-content-between">
              @can('update',$sheet)
                <div class="col-6"><a href="{{ route('sheet.edit',$sheet) }}" class="btn button-pri-sheet TB mx-2">edit</a></div>
              @endcan
              @can('delete',$sheet)
                <remove-component 
                    text="Remove"
                    action="{{ route('sheet.destroy',$sheet->id) }}"
                    title="Removing {{ $sheet->title }}"
                    msg="Are you Sure you want to REMOVE {{ $sheet->title }}??"
                ></remove-component>
              @endcan
            </div></div>
        </div>
      
      @empty
        <div class="col">
          <div class="display-5">
            No sheets yet.
          </div>
        </div>
      @endforelse
  </div>
  <hr>
  <div class="row">
      <div class="col d-flex justify-content-center align-items-center">
          <!-- Previous link -->
          <a class='btn mx-2
              @if($sheets->currentPage() > 1)
                  button-secondary
              @else
                  btn-secondary unclickable
              @endif'
              @if($sheets->currentPage() > 1)
                  href="{{ $sheets->previousPageUrl() }}"
              @else
                  href='#'
              @endif
          >Previous</a>
          

          <!-- Current Page Number -->
          <span class="btn btn-light mx-2 cursor-auto"> {{ $sheets->currentPage() }} </span>

          <!-- Next link -->
          <a class='btn mx-2
              @if($sheets->hasMorePages())
                  button-secondary
              @else
                  btn-secondary unclickable
              @endif'
              @if($sheets->hasMorePages())
                  href="{{ $sheets->nextPageUrl() }}"
              @else
                  href='#'
              @endif
          >Next</a>
      </div>
</div>
@endsection