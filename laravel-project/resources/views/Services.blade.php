@extends('layouts.app')
@section('title','Services')
@section('content')

{{--text--}}
  <div class="container">
    <div class="row">
      <div class="col text-center pyt-1">
        <h1 class="h2 pt-5" id="OrangeText">services</h1>
      </div>
    </div>
    <div class="row my-4">
      <div class="col-md-7 d-flex align-items-center">
       <div>
        <h2 class="h3" id="OrangeText">1- online ide with multiple languages</h2>
        <p class="h4">
         Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit repudiandae itaque pariatur quae odio nulla quasi quis fugiat excepturi officia? Reiciendis alias, enim repellendus itaque odit vero error tempora possimus!
        </p>
       </div>
      </div>
      <div class="col-md-5 d-flex align-items-center justify-content-center">
        @include('components.SVG1')
      </div>
    </div>
    <div class="row my-4">
      <div class="col-md-5 d-flex align-items-center">
        @include('components.SVG2')
      </div>
      <div class="col-md-7 d-flex align-items-center">
        <div>
          <h2 class="h3" id="OrangeText">2- blogger for experienced devloper</h2>
          <p class="h4">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit repudiandae itaque pariatur quae odio nulla quasi quis fugiat excepturi officia? Reiciendis alias, enim repellendus itaque odit vero error tempora possimus!
          </p>
        </div>
      </div>
    </div>
    <div class="row my-4">
      <div class="col-md-7 d-flex align-items-center">
        <div>
          <h2 class="h3" id="OrangeText">3- providing codes or built-in function in different languages to ease search</h2>
          <p class="h4">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit repudiandae itaque pariatur quae odio nulla quasi quis fugiat excepturi officia? Reiciendis alias, enim repellendus itaque odit vero error tempora possimus!
          </p>
        </div>
      </div>
      <div class="col-md-5 d-flex align-items-center justify-content-center">
        @include('components.SVG1')
      </div>
    </div>
    <div class="row my-4">
      <div class="col-md-5 d-flex align-items-center justify-content-center">
        @include('components.SVG2')
      </div>
      <div class="col-md-7 d-flex align-items-center">
        <div>
          <h2 class="h3" id="OrangeText">4- making their own cheat sheets</h2>
          <p class="h4">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit repudiandae itaque pariatur quae odio nulla quasi quis fugiat excepturi officia? Reiciendis alias, enim repellendus itaque odit vero error tempora possimus!
          </p>
        </div>
      </div>
    </div>
    <div class="row my-4">
      <div class="col-md-7 d-flex align-items-center">
        <div>
          <h2 class="h3" id="OrangeText">5- taking mcq quests for different languages</h2>
          <p class="h4">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit repudiandae itaque pariatur quae odio nulla quasi quis fugiat excepturi officia? Reiciendis alias, enim repellendus itaque odit vero error tempora possimus!
          </p>
        </div>
      </div>
      <div class="col-md-5 d-flex align-items-center justify-content-center">
        @include('components.SVG1')
      </div>
    </div>
  </div>
{{----}}
@endsection