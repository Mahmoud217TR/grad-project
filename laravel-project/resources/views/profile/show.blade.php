@extends('layouts.app')
@section('title','Profile')

@section('content')
<div class="container mt-5">
    <div class="container">
          <div class="row">
            {{--card image--}}
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="@if(!$profile->hasProfilePic()){{ asset('images/blank-profile-picture.svg') }}@else {{ $profile->profile_pic }} @endif" class="profile-image rounded-circle">
                    <div class="my-3">
                        <p class="page-title normal PrimaryText my-4">{{ $profile->user->name }} @if($profile->user->isWebAdmin())<sub class="base-line role">({{ $profile->user->role }})</sub> @endif</p>
                        <p class="base-line PrimaryText">{{ $profile->bio }}</p>
                    </div>
                  </div>
                  <div class="d-flex flex-column align-items-center text-center">
                   <div class="row row-cols-auto d-flex justify-content-center text-center my-4">
                     <div>
                     <p class="base-line PrimaryText mb-0 d-block">Followers</p>
                     <p class="base-line PrimaryText mb-0 d-block">{{ $profile->user->followers->count() }}</p>
                     </div>
                     <div>
                     <p class="base-line PrimaryText mb-0 d-block">Following</p>
                     <p class="base-line PrimaryText mb-0 d-block">{{ $profile->user->following->count() }}</p>
                     </div>
                    </div>
                    @can('update',$profile)
                      <a href="{{ route('profile.edit',auth()->id()) }}" class="btn button-primary TB">Edit</a>
                    @else
                      <button class="btn button-primary TB">Follow</button>
                    @endcan
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
                      <p class="base-line text-Secondary">{{ $profile->user->email }}</p>
                    </div>
                  </div>
                  <div class="row border-bottom my-4">
                    <div class="col-sm-3">
                      <p class="mb-0 base-line text-Secondary">Birthdate</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="base-line text-Secondary">{{ $profile->user->bdate }}</p>
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
