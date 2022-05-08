@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col text-start pyt-1">
                <h1 class="page-title orange-text pt-5">Edite your Sheet</h1>
            </div>
        </div>
            <div class="row my-2 ms-md-4">
                <div class="codesubmit container  py-3 my-4 col-md-8 col-10 ps-3">
                    <form method="POST" action=" " class="ps-3">
                        <div class="row pt-2">
                            <div class=" col-md-4  col-12 mb-2">
                                <label> Title of Sheet</label>
                            </div>
                            <div class="row">
                                <div class="col-md-7 col-12">
                                    <input type="text" class="form-control  box" id="title-sheet" placeholder="enter title">
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="form-group col-11">
                                <label for="editeSheet1" class="mb-2">Details</label>
                                <textarea class="form-control" id="editeSheet1" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="row justify-content-center  justify-content-lg-end  pt-4">
                            <div class="col-md-3 text-end col-5 mb-3">
                                <button type="submit" class="btn button-primary TB box ">
                                    {{ __('Save') }}
                                </button>
                            </div>
                            <div class="col-md-2 col-5">
                                <button type="submit" class="btn button-primary TB box  ">
                                    {{ __('Cancle') }}
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
