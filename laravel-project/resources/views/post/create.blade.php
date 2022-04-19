@extends('layouts.app')
@section('title','Create post')
@section('content')
<div class="container pt-3">
    <div class="card">
        <div class="card-body bg-dark">
            <div class="row">
                <div class="col">
                    <p class="base-line">
                        Name
                    </p>
                    <div class="row row-cols-auto orange-text">
                        <div class="">
                            <i class="bi bi-calendar3 px-1"></i>
                        </div>
                         <div class="">
                            <p>2 days, 8 hours</p> 
                         </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body bg-dark">
            <form method="POST" action="">
                <div class="row">
                    <div class="col-11 form-group">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Title</span>
                            <input type="text" class="form-control shadow-none" placeholder="Post Title" aria-label="Username" aria-describedby="basic-addon1">
                          </div>
                        <textarea class="form-control shadow-none" id="floatingTextarea" rows="10"></textarea>
                       </div>
                       <div class="co-12 mt-2">
                            <button type="submit" class="btn button-primary btn-sm shadow-none me-2"
                             type="button">Done</button>
                       </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection