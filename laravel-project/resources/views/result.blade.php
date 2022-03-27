@extends('layouts.app')
@section('title','Search Results')
@section('content')
        <div class="container mt-5">
             {{--search bar --}}
              <form action="{{ route('search') }}" method="GET">
                @csrf
                <div class="input-group">
                  <div class="input-group-btn col-12 col-md-2 col-lg-1 col-xl-1 me-lg-5 me-xl-3 dropdown">
                     <button type="button" class="btn btn-default dropdown-toggle  text-primary" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                       <i class="bi bi-funnel-fill pe-2"></i><span id="search_concept">Filter by</span>
                     </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        @foreach ($filters as $filter)
                          <li class="dropdown-item form-check" id='li-{{ $filter }}' onclick="document.getElementById('{{  $filter  }}').checked^= 1;document.getElementById('{{  $filter  }}-check').hidden^= 1;document.getElementById('{{  $filter  }}-uncheck').hidden^= 1;">
                            <div class="container">
                              <div class="row">
                                <div class="col d-flex justify-content-between">
                                  <input type="checkbox" class="form-check-input" name='filters[]' id='{{ $filter }}' value="{{ $filter }}" hidden @if(in_array($filter,$selected)) checked = true @endif>
                                  <label class="form-check-label" for="{{ $filter }}">{{ $filter }}</label> 
                                  <i id='{{ $filter }}-check' class="bi bi-check-square-fill" @if(!in_array($filter,$selected)) hidden @endif></i>
                                  <i id='{{ $filter }}-uncheck' class="bi bi-check-square" @if(in_array($filter,$selected)) hidden @endif></i>
                                </div>
                              </div>
                            </div>
                          </li>
                        @endforeach
                      </ul>
                     
                  </div>
                  <input type="hidden" value="all" id="search_param">         
                  <input type="search" id="keyword" name='keyword' class="form-control" placeholder="Search..." value="{{ $keyword??old('keyword') }}">
                  <button class="btn button-primary m-0" type="submit">
                      <i class="bi bi-search"></i>
                  </button>
                </div>
              </form>
             {{--end search bar --}}  

             {{--All results tab --}}
             @foreach ($total_results as $result_type=>$results)
              <ul class="nav nav-tabs mt-5">
                <li class="nav-item">
                    <a href="{{ route('search',['keyword'=>$keyword,'limit'=>100,'filters'=>[$result_type]]) }}" data-toggle="tab" aria-expanded="true" class="nav-link active base-line">
                        {{ $result_type }} ({{ $results->count() }}@if($results->hasMorePages())+@endif)
                    </a>
                </li>
              </ul>
              @foreach ($results as $result)
                <div class="row mt-3">
                  <div class="col-md-12">
                    <div class="search-item border-bottom mt-4">
                      <a href="{{ route(strtolower($result_type).'.show',$result->id) }}" class="unstyled-anchor mb-1 head-line">{{ $result->name??$result->title }}</a>
                      <p class="mb-0 text-muted">{{ $result->description }}</p>
                    </div>
                  </div>
                </div>
              @endforeach
             @endforeach
             {{-- end All results tab --}}
             @if (sizeof($selected) == 1)
             <div class="row my-4">
              <div class="col d-flex justify-content-center align-items-center">
                  <!-- Previous link -->
                  <a class='btn mx-2
                      @if($results->currentPage() > 1)
                          button-secondary
                      @else
                          btn-secondary unclickable
                      @endif'
                      @if($results->currentPage() > 1)
                          href="{{ $results->previousPageUrl()."&keyword=".$keyword."&limit=100&filters%5B0%5D=".$result_type }}"
                      @else
                          href='#'
                      @endif
                  >Previous</a>
                  
      
                  <!-- Current Page Number -->
                  <span class="btn btn-light mx-2 cursor-auto"> {{ $results->currentPage() }} </span>
      
                  <!-- Next link -->
                  <a class='btn mx-2
                      @if($results->hasMorePages())
                          button-secondary
                      @else
                          btn-secondary unclickable
                      @endif'
                      @if($results->hasMorePages())
                          href="{{ $results->nextPageUrl()."&keyword=".$keyword."&limit=100&filters%5B0%5D=".$result_type }}"
                      @else
                          href='#'
                      @endif
                  >Next</a>
              </div>
          </div>
             @endif
        </div>
        {{--end container --}}
@endsection
