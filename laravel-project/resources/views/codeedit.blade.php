@extends('layouts.app')
@section('content')
<link href="{{ asset('css/ide.css') }}" rel="stylesheet">
<div id="app" >
    <!-- the bigger div content all element of editor  -->
    <div class="container ide text-white">
        <!-- the header of it contain label and  selector  -->
        <div  class="row header bg-header p-2">
            <!-- this for label  -->
            <div class="col ml-2 text-center text-lg-start my-3">
                <h2 class="m-0"> Code Editor</h2>
            </div>
            <!-- this for selector1  -->
            <div class="col-lg my-2 my-lg-0 text-center text-lg-start">
                <div class="row">
                    <div class="col-4 d-flex align-items-center justify-content-end">
                        <label for ="language" class="me-2" >Language:</label>
                    </div>
                    <div class="col-8 d-flex align-items-center justify-content-start">
                        <select id ="language" name="language" class="form-select d-inline" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                    </div>
                </div>
            </div>
            <!-- this for selector2  -->
            <div class="col-lg my-2 my-lg-0 text-center text-lg-start">
                <div class="row">
                    <div class="col-4 d-flex align-items-center justify-content-end">
                        <label for ="theme" class="me-2" >Theme:</label>
                    </div>
                    <div class="col-8 d-flex align-items-center justify-content-start">
                        <select id ="theme" name="theme" class="form-select d-inline" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                    </div>
                </div>
            </div>
        </div>
        <!-- the secound part is for code text  and output  -->
        <div  class="row" >
            <!-- this for code  -->
            <div class="col-md-8">
                <!-- this is for code   -->
                <div class="code-editor">

                </div>
            </div>
             <!-- this for out   -->
             <div class="col-md-4">
                 <!-- this for output label   -->
                 <div class="row bg-header">
                   <div class="col mb-2 d-flex justify-content-center">
                    <h2> Output</h2>
                   </div>
                 </div>
                 <!-- this for output   -->
                 <div class="row bg-output ">
                    <div class="col">
                        <p class="output p-2">
                            
                        </p>
                    </div>
                  </div>
                   <!-- this for button   -->
                  <div class="row py-2 bg-header">
                  <!-- this for button run  -->
                    <div class="col p-1">
                        <button class="btn  Rigester TB d-flex align-items-center">
                            <i class="bi bi-play-btn-fill icons pe-2"></i>
                            <span>Run</span>
                        </button>
                    </div>
                     <!-- this for button save  -->
                     <div class="col p-1">
                        <button class="btn  Rigester TB d-flex align-items-center">
                            <i class="bi bi-save2-fill icons pe-2 mb-0"></i>
                            <span>Save</span>
                        </button>
                     </div>
                     <!-- this for button undo  -->
                     <div class="col p-1">
                        <button class="btn  Rigester TB d-flex align-items-center">
                            <i class="bi bi-arrow-counterclockwise icons pe-1"></i>
                            <span>Undo</span>
                        </button>
                     </div>
                     <!-- this for button redo   -->
                     <div class="col p-1">
                        <button class="btn  Rigester TB d-flex align-items-center">
                            <i class="bi bi-arrow-clockwise icons pe-1"></i>
                            <span>Redo</span>
                        </button>
                     </div>
                  </div>
                    
                </div>

            </div>
        </div>

       
       
    </div>
</div>

    

    
@endsection