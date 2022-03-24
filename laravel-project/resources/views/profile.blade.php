@extends('layouts.app')
@section('title','Profile')

@section('header')
<style>
  .profile-image{
    width:16rem;
    height:16rem;

  }
</style>
@endsection

@section('content')
<div class="container mt-5">
    <div class="container">
          <div class="row">
            {{--card image--}}
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{ asset('images/1.jpg') }}" class="profile-image rounded-circle">
                    <div class="my-3">
                        <p class="page-title PrimaryText my-4">Name <small class="base-line">(Admin)</small></p>
                        <p class="base-line PrimaryText">"short description"</p>
                    </div>
                  </div>
                  <div class="d-flex flex-column align-items-center text-center">
                   <div class="row row-cols-auto d-flex justify-content-center text-center my-4">
                     <div>
                     <p class="base-line PrimaryText mb-0 d-block">Followers</p>
                     <p class="base-line PrimaryText mb-0 d-block">number</p>
                     </div>
                     <div>
                     <p class="base-line PrimaryText mb-0 d-block">Following</p>
                     <p class="base-line PrimaryText mb-0 d-block">number</p>
                     </div>
                    </div>
                    <button class="btn button-primary TB">Follow</button>
                  </div>
                </div>
            {{----}}

            {{--information--}}
            <div class="card mb-2">
              <div class="mb-4">
                 <div class="card-body">
                  <div class="row border-bottom my-4">
                    <div class="col-sm-3">
                      <p class="mb-0 base-line text-Secondary">Email</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="base-line text-Secondary">####@gmail.com</p>
                    </div>
                  </div>
                  <div class="row border-bottom my-4">
                    <div class="col-sm-3">
                      <p class="mb-0 base-line text-Secondary">Birthdate</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="base-line text-Secondary">number</p>
                    </div>
                  </div>
                 </div>
                </div>
               </div>
             </div>
            </div>
            {{----}}
          </div>
    </div>
@endsection
