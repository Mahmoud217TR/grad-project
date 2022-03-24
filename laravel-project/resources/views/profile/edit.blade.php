@extends('layouts.app')
@section('title','Profile')

@section('content')
  <div class="container mt-5">
    <div class="row">
      {{--card image--}}
      <div class="col">
        <div class="card-body">
          <div class="d-flex flex-column align-items-center text-center">
            <div>
              <img src="@if(!$profile->hasProfilePic()){{ asset('images/blank-profile-picture.svg') }}@else {{ asset('storage/'.$profile->profile_pic) }} @endif" id="preview" class="profile-image rounded-circle">
            </div>
            {{--edit photo--}}
            <div class="camera-button">
              <form id='image-form' method="post" action="{{ route('upload-img') }}" enctype="multipart/form-data">
                @csrf
                <input type="file" name="profile_pic" id='profile_pic' class="file" accept="image/*" hidden="hidden" onchange="document.getElementById('image-submit').click()">
                <label for="profile_pic" type="button" class="browse btn button-primary">
                    <i class="bi bi-camera"></i>
                </label>
                <button id = 'image-submit' type="submit" hidden></button>
            </form>
            </div>
            {{--end edit photo--}}
          </div>
        </div>
      </div>
      {{----}}
    </div>
    <div class="row">
      <div class="col">
        {{--information--}}
        <div class="card mx-5 mb-2">
          <div class="container mb-4">
             <div class="card-body">
              <div class="my-4">
                <form method="POST" action="{{ route('profile.update',auth()->user()->profile) }}">
                  @csrf
                  @method('patch')
                  <div class="row row-cols-auto mb-3 px-5">
                      <div class="col-md-4 text-md-end">
                        <label for="name" class="col-form-label text-start base-line text-Secondary">
                          {{ __('Name') }}
                        </label>
                      </div>
                      <div class="col-md-8 py-2">
                          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $profile->user->name??old('name') }}" required autocomplete="name" autofocus>
                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
                   <div class="row row-cols-auto mb-3 px-5">
                    <div class="col-md-4 text-md-end">
                      <label for="bio" class="col-form-label text-start base-line text-Secondary">
                        {{ __('BIO') }}
                      </label>
                    </div>
                    <div class="col-md-8 py-2">
                        <input id="bio" type="text" class="form-control 
                        @error('bio') is-invalid @enderror" 
                        name="bio" value="{{ $profile->bio??old('bio') }}"
                         required autocomplete="bio" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                   </div>
                  <div class="row row-cols-auto mb-3 px-5">
                    <div class="col-md-4 text-md-end">
                      <label for="bdate" class="col-form-label text-start base-line text-Secondary">
                        {{ __('Birthdate') }}
                    </label>
                    </div>
                    <div class="col-md-8 py-2">
                        <input id="bdate" type="date" class="form-control
                         @error('bdate') is-invalid @enderror" 
                         name="bdate" value="{{ $profile->user->bdate??old('bdate') }}" 
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
                              {{ __('Update') }}
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
