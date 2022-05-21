@extends('layouts.app')
@section('title',$report->title)

@section('content')
<div class="container py-5">
  <div class="card sheet-box bg-dark">
    <div class="card-header mx-2 row bottom-line">
      <div class="col-10 col-md-11 d-flex align-items-end">
          @include('components.svg20',['width'=>50,'height'=>50])
          <h2 class="orange-text hade-line ms-4" style="margin-top: -15px">{{ $report->title }}</h2>
      </div>
    </div> 
    <div class="row py-3 justify-content-center px-4">
      @if ($report->user)
        <div class=" justify-content-center px-5 pt-2">
          <p class="base-line">Reporter ID : {{ $report->user->name }}
        </div>
      @endif
      <div class=" justify-content-center px-5">
        <p class="base-line"> Report Describtion:  
      </div>
      <div class=" justify-content-center px-5">
        <p class="base-line"> {{ $report->description }} </p>
      </div>
      
    </div>
    <div class="row justify-content-center  justify-content-md-end  mx-2 py-4">
      <div class="col-md-2 col-5">
        @can('delete',$report)
          <remove-component 
              text="Remove"
              action="{{ route('sheet.destroy',$report->id) }}"
              title="Removing {{ $report->title }}"
              msg="Are you Sure you want to REMOVE {{ $report->title }}??"
          ></remove-component>
        @endcan
      </div>
     </div>
   
  </div>
</div>
@endsection