@extends('layouts.app')
@section('title',$post->title)
@section('content')
<div class="container pt-3">
    <div class="card">
        <div class="card-body bg-dark">
			<div class="row">
				<div class="col">
					<div class="d-flex align-items-center">
						<a href="{{ route('profile.show',$post->user->profile) }}" class="unstyled-anchor d-flex align-items-center">
							<img class="rounded-circle" src="@if(!$post->user->profile->hasProfilePic()){{ asset('images/blank-profile-picture.svg') }}@else {{ asset('storage/'.$post->user->profile->profile_pic) }} @endif" width="60" height="60">
							<div class="d-flex flex-column ms-3">
								<p class="orange-text base-line mb-0">{{ $post->user->name }}</p>
							</div>
						</a>
					</div>
				</div>
				@canany(['update','delete'],$post)
				@can('delete',$post)
				<remove-component 
					hidden='hidden'
					button-id ='remove-post-{{ $post->id }}'
					text="Remove"
					action="{{ route('post.destroy',$post) }}"
					title="Removing {{ $post->title }}"
					msg="Are you Sure you want to REMOVE {{ $post->title }}??"
				></remove-component>
				@endcan
				<div class="col-sm-4 d-flex justify-content-end dropstart">
                    <a class="orange-text unstyled-anchor base-line" type="button" 
                        data-bs-toggle="dropdown" id="#ff"
                        aria-expanded="false">

                        <i class="bi bi-three-dots"></i>
                    </a>
                    <div class="col col-md-6 mx-2 card collapse text-dark dropdown-menu" aria-labelledby="ff">
                        <ul class="m-3 list-unstyled">
							@can('update',$post)
                            	<a class="unstyled-anchor1" href="{{ route('post.edit',$post) }}"><li class="border-bottom mb-2" type="button"><i class="orange-text TB bi bi-pencil-square mx-1"></i>Edit</li></a>
							@endcan
                            @can('delete',$post)
								<li class="mb-2" type="button" onclick="event.preventDefault();document.getElementById('remove-post-{{ $post->id }}').click();"><i class="orange-text TB bi bi-trash mx-1"></i>Delete</li>
							@endcan
                        </ul>
                    </div>
                </div>
				@endcan
			</div>
            <div class="row">
                <div class="col-8">
                    <p class="base-line">
                        {{ $post->title }}
                    </p>
                    <div class="row row-cols-auto orange-text">
                        <div class="">
                            <i class="bi bi-calendar3 px-1"></i>
                        </div>
                         <div class="">
                            <p>{{ $post->created_at->format('y-M-d h:m:s a') }}</p> 
                         </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body bg-dark">
            <p class="base-line">
                <h5>
                    {!! $post->content !!}
                </h5>
            </p>
        </div>
		{{--comment--}}
        <div class="card-body">

			{{--number of comments--}}
            <div class="row row-cols-auto text-dark">
                <div class="mt-4 pt-1">
                    <h3><i class="bi bi-chat-left-fill px-1"></i></h3>
                </div>
                 <div class="mt-4">
                    <h3><p>{{ $post->comments->count() }} Comments</p></h3> 
                 </div>
            </div>
			{{--end number of comments--}}

			{{--box write comment--}}
            	@include('comment.create')
		   	{{--end box write comment--}}

			{{--يتم معاملة المقطع التالي ك جزء كامل من اجل انشاء مكون يمثل صندوق الرد على التعليقات في ال
				vue.js 
				 للتوضيح نضع المقطع التالي كله كمحتوى ضمن 
				 reply ----> reply box comment ----> comments
				 فينتج لدينا تعليقات وردودها 
				--}}

			
			@foreach ($post->comments as $comment)
				@include('comment.show')
			@endforeach
			
        </div>
		{{--end comment--}}
    </div>
</div>
@endsection