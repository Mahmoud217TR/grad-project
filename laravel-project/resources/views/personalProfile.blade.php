@extends('layouts.app')
@section('title','Profile')

@section('header')
<style>
  .profile-image{
    width:16rem;
    height:16rem;

  }
  .camera-button{
  transform: translate(80%,-120%);
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
                    <div>
                      <img src="{{ asset('images/1.jpg') }}" id="preview" class="profile-image rounded-circle">
                    </div>
                    {{--edit photo--}}
                      <div class="camera-button">
                      <form method="post" id="image-form">
                        <input type="file" name="img[]" class="file" accept="image/*" hidden="hidden">
                           <label type="button" class="browse btn button-primary">
                            <i class="bi bi-camera"></i>
                          </label>
                      </form>
                      </div>
                    {{--end edit photo--}}

                    <div class="my-2">
                        <p class="page-title PrimaryText my-2">Name <small class="base-line">(Admin)</small></p>
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
                  </div>
                </div>
            {{----}}

            {{--information--}}
             <div class="card mx-5 mb-2">
              <div class="container mb-4">
                 <div class="card-body">
                  <div class="my-4">
                    <form method="POST">
                      @csrf
                      <div class="row row-cols-auto mb-3 px-5">
                        <label for="email" class="col-form-label text-start base-line text-Secondary">
                            {{ __('Email Address') }}
                        </label>

                        <div class="col-8 py-2">
                            <input id="email" type="email" class="form-control 
                            @error('email') is-invalid @enderror" 
                            name="email" value="{{ old('email') }}" 
                            required autocomplete="email" disabled>
                        </div>
                       </div>
                      <div class="row row-cols-auto mb-3 px-5">
                        <label for="name" class="col-form-label text-start base-line text-Secondary">
                          {{ __('Name') }}
                        </label>
                        <div class="col-8 py-2">
                            <input id="name" type="text" class="form-control 
                            @error('name') is-invalid @enderror" 
                            name="name" value="{{ old('name') }}"
                             required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                       </div>
                       <div class="row row-cols-auto mb-3 px-5">
                        <label for="name" class="col-form-label text-start base-line text-Secondary">
                          {{ __('Short Description') }}
                        </label>
                        <div class="col-8 py-2">
                            <input id="name" type="text" class="form-control 
                            @error('name') is-invalid @enderror" 
                            name="name" value="{{ old('short description') }}"
                             required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                       </div>
                      <div class="row row-cols-auto mb-3 px-5">
                        <label for="bdate" class="col-form-label text-start base-line text-Secondary">
                            {{ __('Birth Date') }}
                        </label>
                        <div class="col-8 py-2">
                            <input id="bdate" type="date" class="form-control
                             @error('bdate') is-invalid @enderror" 
                             name="bdate" value="{{ old('bdate') }}" 
                             required autocomplete="bdate">

                            @error('bdate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                       </div>
                      <div class="row mb-0 text-center">
                          <div class="py-2">
                              <button type="submit" class="btn button-primary TB ">
                                  {{ __('Edit') }}
                              </button>
                          </div>
                      </div>
                  </form>
                 </div>
                </div>
               </div>
             </div>
            {{----}}
            </div>
          </div>
    </div>
@endsection
