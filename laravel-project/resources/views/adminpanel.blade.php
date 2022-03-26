@extends('layouts.app')
@section('content')
    <div class="container py-3 adminpanel">
        <div class="row">
            <div class="col text-start py-2">
                <h1 class="head-line orange-text bold" >Admin panel</h1>
            </div>
        </div>
        <div class="row py-3 py-md-1 adminbut my-2 my-md-2 mx-sm-0 mx-1">
            <div class=" justify-content-start d-flex flex-wrap cont">
                <div class="div-tag">
                    <a href="#" class="btn-tag btn TB">Archived</a>
                </div>
                <div class="div-tag">
                    <a href="#" class="btn-tag btn TB">Add Codes</a>
                </div>
                <div class="div-tag">
                    <a href="#" class="btn-tag btn TB">Add Languages</a>
                </div>
                <div class="div-tag">
                    <a href="#" class="btn-tag btn TB">Requested Snippets</a>
                </div>
                <div class="div-tag">
                    <a href="#" class="btn-tag btn TB">Logs</a>
                </div>
                <div class="div-tag">
                    <a href="#" class="btn-tag btn TB ">Reports</a>
                </div>

                <div class="div-tag">
                    <a href="#" class="btn-tag btn TB">Add Snippets</a>
                </div>
                <div class="div-tag">
                    <a href="#" class="btn-tag btn TB">Roles</a>
                </div>

            </div>
        </div>
        <div class="row pt-4 py-md-2 my-2 my-md-4 mx-sm-0 mx-1">
            <div class="col-md-6 d-flex align-items-start adminoutput">
                <div>
                    <h2 class="head-line orange-text bold" >Datebase State:</h2>
                    <hr>
                    <p class="base-line pt-1">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit repudiandae itaque pariatur quae
                        odio nulla quasi quis fugiat excepturi officia? Reiciendis alias, enim repellendus itaque odit vero
                        error tempora possimus!
                    </p>
                </div>
            </div>
            <div class="col-md-6 d-md-flex align-items-end justify-content-center d-none">
                @include('components.SVG4')
            </div>
        </div>

    </div>
@endsection
