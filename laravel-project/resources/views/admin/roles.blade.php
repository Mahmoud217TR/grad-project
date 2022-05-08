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
                    <h2 class="head-line orange-text bold">Admins: ({{ $admins->count() }})</h2>
                    <hr class="mb-4">
                    <div class="scrollText">
                        @foreach ($admins as $admin)
                            <div class="item ms-2 mb-4">
                                <h4>{{ $admin->name }}</h4>
                                <p>{{$admin->email}}</p>
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
            <div class="col-md-4 mt-2 container">
                <form class="mb-4" method="POST" action="{{ route('roles.add') }}">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col ps-3">
                            <h2>Add a or Edit Role: </h2>
                        </div>
                    </div>
                    <div class="row  justify-content-center">
                        <div class="col pt-md-3">
                            <select class="form-select mb-3 box" name='role' id='role'>
                                <option value="admin">Admin</option>
                                <option value="reviewer">Reviewer</option>
                                <option value="editor">Editor</option>
                            </select>
                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col">
                            <input type="email" class="form-control box" name="email" id="email" placeholder="Enter The Email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row mb-0 justify-content-center  py-2 ">
                            <div class=" my-2 col-4">
                                <button type="submit" class="btn button-primary TB box">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <form class="mb-4" method="POST" action="{{ route('roles.remove') }}">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col ps-3">
                            <h2>Remove a Role: </h2>
                        </div>
                    </div>
                    <div class="row  justify-content-center">
                        <div class="col">
                            <input type="email" class="form-control box" name="email" id="email" placeholder="Enter The Email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-0 justify-content-center  py-2 ">
                        <div class="  my-2 col-4">
                            <button type="submit" class="btn button-primary TB box ">
                                {{ __('Remove') }}
                            </button>
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
