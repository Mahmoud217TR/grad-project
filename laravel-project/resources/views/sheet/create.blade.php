@extends('layouts.app')
@section('title','Edit '.$sheet->title)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col text-start pyt-1">
                <h1 class="page-title orange-text pt-5">Edit your Sheet</h1>
            </div>
        </div>
            <div class="row my-2 ms-md-4">
                <div class="codesubmit container  py-3 my-4 col-md-8 col-10 ps-3">
                    <form method="POST" action="{{ route('sheet.store') }}" class="ps-3">
                        @csrf
                        @include('sheet.form')
                        
                        <div class="row justify-content-center  justify-content-lg-start  pt-4">
                            <div class="col-md-6 mb-3">
                                <button type="submit" class="btn button-primary TB box ">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
    
                
                <div class="col-md-4 col-2 d-md-block d-none  svgEditeSheet"  >
                    @include('components.SVG8')
                </div>
            </div>
        </div>
       
    </div>
  

   
@endsection
