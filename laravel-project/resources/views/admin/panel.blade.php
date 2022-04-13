@extends('layouts.app')
@section('content')
    <div class="container py-3 adminpanel">
        <div class="row">
            <div class="col text-start py-2">
                <h1 class="head-line orange-text bold" >Admin Panel</h1>
            </div>
        </div>
        <div class="row py-3 py-md-1 adminbut my-2 my-md-2 mx-sm-0 mx-1">
            <div class=" justify-content-start d-flex flex-wrap cont">
                <div class="div-tag">
                    <a href="#" class="btn-tag btn TB">Archived</a>
                </div>
                <div class="div-tag">
                    <a href="{{ route('code.index') }}" class="btn-tag btn TB">Codes</a>
                </div>
                <div class="div-tag">
                    <a href="{{ route('language.index') }}" class="btn-tag btn TB">Languages</a>
                </div>
                <div class="div-tag">
                    <a href="{{ route('snippet.index') }}" class="btn-tag btn TB">Snippets</a>
                </div>
                <div class="div-tag">
                    <a href="{{ route('logs') }}" class="btn-tag btn TB">Logs</a>
                </div>
                <div class="div-tag">
                    <a href="#" class="btn-tag btn TB ">Reports</a>
                </div>
                <div class="div-tag">
                    <a href="{{ route('telescope') }}" class="btn-tag btn TB">Telescope</a>
                </div>
                <div class="div-tag">
                    <a href="#" class="btn-tag btn TB">Roles</a>
                </div>

            </div>
        </div>
        <div class="row pt-4 py-md-2 my-2 my-md-4 mx-sm-0 mx-1">
            <div class="col-md-6 adminoutput">
                <div>
                    <h2 class="head-line orange-text bold" >Datebase State:</h2>
                    <hr>
                    <div class="row">
                        @foreach ($database as $chunk)
                            <div class="col-md-6">
                                <p class="base-line pt-1 text-center text-md-start">
                                    @foreach ($chunk as $key => $value)
                                        <span>{{ $key }}:</span> <span class="orange-text">{{ $value }}</span><br>
                                    @endforeach
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-md-flex align-items-end justify-content-center d-none">
                @include('components.SVG4')
            </div>
        </div>

    </div>
@endsection
