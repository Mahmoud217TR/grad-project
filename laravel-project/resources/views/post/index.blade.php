@extends('layouts.app')
@section('title','Posts')
@section('content')
<div class="container pt-3">

    @auth
        @if (auth()->user()->isOrAbove('editor'))
            <a href="{{ route('post.create') }}" class="btn button-primary mx-2">Create a new Post</a>
            <a href="{{ route('post.all') }}" class="btn button-primary mx-2">Show All Posts</a>
            <a href="{{ route('post.drafted') }}" class="btn button-primary mx-2">Show Drafted</a>
            <a href="{{ route('post.archived') }}" class="btn button-primary mx-2">Show Archived</a>
        @endif
    @endauth

    @forelse ($posts as $post)
    <div class="card bg-dark my-5">
        <div class="card-body">
            <div class="card-header bg-dark bottom-line">
                <p class="head-line">
                    {{ $post->title }}
                </p>
            </div>
            <div class="card-body">
                <p class="base-line">
                    By {{ $post->user->name }}
                </p>
                <p class="base-line">
                    {!! $post->content !!}
                </p>
                <div class="row flex">
                    <div class="col-md-9 align-items-md-start">
                        <ul class="list-group list-group-horizontal list-unstyled">
                            <li class="py-2">
                                <div class="row row-cols-auto text-center">
                                    <div class="col-md-2">
                                        <i class="bi bi-calendar3 px-1"></i>
                                    </div>
                                        <div class="col-md-9">
                                        <p>{{ $post->created_at->format('y-M-d') }}</p> 
                                        </div>
                                </div>
                            </li>
                            <li class="py-2">
                                <div class="row row-cols-auto text-center">
                                    <div class="col-md-2">
                                        <i class="bi bi-chat-left-fill px-1"></i>
                                    </div>
                                        <div class="col-md-9">
                                        <p>{{ $post->comments->count() }} comments</p> 
                                        </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 align-items-md-end py-3">
                        <h6><a href="{{ route('post.show',$post) }}" class="orange-text unstyled-anchor TB mx-2" type="button">Read More <i class="bi bi-chevron-double-right"></i></a></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @empty
        <div class="display-4 mt-5 text-center">
            NO Posts here.
        </div>
    @endforelse
    <hr>
    <div class="row">
        <div class="col d-flex justify-content-center align-items-center">
            <!-- Previous link -->
            <a class='btn mx-2
                @if($posts->currentPage() > 1)
                    button-secondary
                @else
                    btn-secondary unclickable
                @endif'
                @if($posts->currentPage() > 1)
                    href="{{ $posts->previousPageUrl() }}"
                @else
                    href='#'
                @endif
            >Previous</a>
            

            <!-- Current Page Number -->
            <span class="btn btn-light mx-2 cursor-auto"> {{ $posts->currentPage() }} </span>

            <!-- Next link -->
            <a class='btn mx-2
                @if($posts->hasMorePages())
                    button-secondary
                @else
                    btn-secondary unclickable
                @endif'
                @if($posts->hasMorePages())
                    href="{{ $posts->nextPageUrl() }}"
                @else
                    href='#'
                @endif
            >Next</a>
        </div>
    </div>
</div>
@endsection