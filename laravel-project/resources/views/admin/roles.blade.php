@extends('layouts.app')
@section('content')
    <div class="container py-3 roles">
        <div class="row">
            <div class="col text-center text-md-start py-2">
                <h1 class="head-line orange-text bold">Roles</h1>
            </div>
        </div>
        <div class="row pt-md-2 py-md-2 my-1 my-md-4">
            <div class="col-md-4">
                <div class="adminoutput">
                    <h2 class="head-line orange-text bold">Reviewers: ({{ $reviewers->count() }})</h2>
                    <hr class="mb-4">
                    <div class="scrollText">
                        @foreach ($reviewers as $reviewer)
                            <div class="item ms-2 mb-4">
                                <h4>{{ $reviewer->name }}</h4>
                                <p>{{$reviewer->email}}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="adminoutput">
                    <h2 class="head-line orange-text bold">Editors: ({{ $editors->count() }})</h2>
                    <hr class="mb-4">
                    <div class="scrollText">
                        @foreach ($editors as $editor)
                            <div class="item ms-2 mb-4">
                                <h4>{{ $editor->name }}</h4>
                                <p>{{$editor->email}}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="adminoutput ">
                    <h2 class="head-line orange-text bold">Admins:({{ $editors->count() }})</h2>
                    <hr class="mb-4">
                    <div class="scrollText">
                        @foreach ($editors as $editor)
                            <div class="item ms-2 mb-4">
                                <h4>{{ $editor->name }}</h4>
                                <p>{{$editor->email}}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container py-4 roles ">
        <div class="row ">
            <div class="col-md-4 text-center  d-md-block d-none" >
                @include('components.SVG6')
            </div>
            <div class="col-md-4 mt-2 contain">
                <form method="POST" action=" ">
                    <div class="row  justify-content-center">
                        <div class="col-11 pt-md-3">
                        <select class="form-select mb-3 box" aria-label="">
                            <option value="1">Admin</option>
                            <option value="2">Reviewer</option>
                            <option value="3">Editor</option>
                        </select>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-11 ">
                            <input type="text" class="form-control  box " id="roles" placeholder="enter email">
                        </div>
                    </div>
                        <div class="row mb-0 justify-content-center  py-2 ">
                            <div class=" my-2 col-4">
                                <button type="submit" class="btn button-primary TB box">
                                    {{ __('Add') }}
                                </button>
                            </div>
                            <div class="  my-2 col-4">
                                <button type="submit" class="btn button-primary TB box ">
                                    {{ __('Remove') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4  d-md-flex d-none" >
                @include('components.SVG5')
            </div>
        </div>
    </div>
@endsection
