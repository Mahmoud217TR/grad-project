@extends('layouts.app')
@section('title','Edit '.$post->title)
@section('content')
<div class="container pt-3">
    <div class="card">
        <div class="card-body bg-dark">
            <div class="row">
                <div class="col">
                    <p class="base-line">
                        Edit {{ $post->title }}
                    </p>
                </div>
            </div>
        </div>
        <div class="card-body bg-dark">
            <form method="POST" action="{{ route('post.update',$post) }}">
                @csrf
                @method('PATCH')
                @include('post.form')
                <div class="row">
                    <div class="co-12 mt-2">
                        <button type="submit" class="btn button-primary btn-sm shadow-none me-2"
                         type="button">Update</button>
                   </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection