@extends('layouts.app')
@section('title','About Us')
@section('content')
{{--text--}}
<div class="container pt-3">
  <div class="row">
    <div class="col text-center pyt-1">
      <h1 class="h2" id="OrangeText">About Us</h1>
    </div>
  </div>
  <div class="row pt-5">
    <div class="col-md-7 d-flex align-items-center">
     <div>
      <h2 class="h3" id="OrangeText">few words about us:</h2>
      <p class="h4">
       Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit repudiandae itaque pariatur quae odio nulla quasi quis fugiat excepturi officia? Reiciendis alias, enim repellendus itaque odit vero error tempora possimus!
      </p>
     </div>
    </div>
    <div class="col-md-5 d-flex align-items-center justify-content-center">
      @include('components.SVG3')
    </div>
  </div>
</div>
{{----}}
@endsection