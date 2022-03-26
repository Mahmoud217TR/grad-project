@extends('layouts.app')
@section('title','Search Results')
@section('content')
        <div class="container mt-5">
             {{--search bar --}}
              <div class="input-group">
                <div class="input-group-btn col-12 col-md-2 col-lg-1 col-xl-1 me-lg-5 me-xl-3 dropdown">
                   <button type="button" class="btn dropdown-toggle text-primary" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                     <i class="bi bi-funnel-fill pe-2"></i><span id="search_concept">Filter by</span>
                   </button>
                   <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                     <li><a href="#">c++</a></li>
                     <li><a href="#">php</a></li>
                   </ul>
                </div>
                <input type="hidden" value="all" id="search_param">         
                <input type="text" class="form-control" placeholder="Search term...">
                <button class="btn button-primary m-0" type="button">
                    <i class="bi bi-search"></i>
                </button>
              </div>
             {{--end search bar --}}  

             {{--All results tab --}}
             <ul class="nav nav-tabs mt-5">
                <li class="nav-item">
                    <a href="#" data-toggle="tab" aria-expanded="true" class="nav-link active base-line">
                        All results
                    </a>
                </li>
              </ul>
                  <div class="row mt-3">
                     <div class="col-md-12">
                        <div class="search-item border-bottom mt-4">
                         <a href="#" class="unstyled-anchor mb-1 head-line">Result1</a>
                         <p class="mb-0 base-line">Lorem ipsum dolor sit
                          </p>
                        </div>
                        <div class="search-item border-bottom mt-4">
                         <a href="#" class="unstyled-anchor mb-1 head-line">Result2</a>
                         <p class="mb-0 base-line">Lorem ipsum dolor sit
                          </p>
                        </div>
                        <div class="search-item border-bottom mt-4">
                         <a href="#" class="unstyled-anchor mb-1 head-line">Result3</a>
                         <p class="mb-0 base-line">Lorem ipsum dolor sit
                          </p>
                        </div>
                     </div>
                  </div>
             {{-- end All results tab --}}
        </div>
        {{--end container --}}
@endsection
