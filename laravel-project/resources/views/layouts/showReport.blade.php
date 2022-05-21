@extends('layouts.app')
@section('title','Profile')

@section('content')
<div class="container py-5">
  <div class="card sheet-box ">
    <div class="card-header mx-2 row bottom-line">
      <div class="col-10 col-md-11 justify-content-md-end">
        <a  href="{{ route('welcome') }}" class="unstyled-anchor">
          @include('components.svg20',['width'=>50,'height'=>50])
          <h2 class="orange-text hade-line ms-4" style="margin-top: -15px">report info</h2>
        </a>
      </div>
      <div class="col-2 col-md-1 justify-content-md-start py-4">
        <a  href="{{ route('welcome') }}" class="unstyled-anchor" >
          @include('components.svg21',['width'=>50,'height'=>50])
        </a>
      </div>
    </div> 
    <div class="row py-3 justify-content-center px-4">
      <div class=" justify-content-center px-5 pt-2">
        <p class="base-line"> reporter email : bla bla bla @gmail.com
      </div>
      <div class=" justify-content-center px-5">
        <p class="base-line"> report type : email calidate  
      </div>
      <div class=" justify-content-center px-5">
        <p class="base-line"> report describtion:  
      </div>
      <div class=" justify-content-center px-5">
        <p class="base-line"> ipsum dolor sit amet consectetur adipisicing elit. Aspernatur et quibusdam numquam, itaque alias accusamus? Sint quidem minima illum soluta, et veniam similique ullam corporis a deleniti expedita ratione mollitia.
      </div>
      
    </div>
    <div class="row justify-content-center  justify-content-md-end  mx-1 pt-4">
      <div class="col-md-3 text-end col-5 mb-3">
         <button type="submit" class="btn button-primary TB box ">
             {{ ('Reply') }}
         </button>
      </div>
      <div class="col-md-2 col-5">
         <button type="submit" class="btn button-sec-sheet TB box  ">
             {{ ('Close') }}
         </button>
      </div>
     </div>
   
  </div>
</div>
@endsection