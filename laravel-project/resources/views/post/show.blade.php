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
				<remove-component 
					hidden='hidden'
					button-id ='remove-post-{{ $post->id }}'
					text="Remove"
					action="{{ route('post.destroy',$post) }}"
					title="Removing {{ $post->title }}"
					msg="Are you Sure you want to REMOVE {{ $post->title }}??"
				></remove-component>
				<div class="col-sm-4 d-flex justify-content-end dropstart">
                    <a class="orange-text unstyled-anchor base-line" type="button" 
                        data-bs-toggle="dropdown" id="#ff"
                        aria-expanded="false">

                        <i class="bi bi-three-dots"></i>
                    </a>
                    <div class="col col-md-6 mx-2 card collapse text-dark dropdown-menu" aria-labelledby="ff">
                        <ul class="m-3 list-unstyled">
							@can('update',$post)
                            	<a class="unstyled-anchor1" href="{{ route('post.edit',$post) }}"><li class="border-bottom mb-2" type="button"><i class="orange-text TB bi bi-pencil-square mx-1"></i>Edite</li></a>
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
            	@include('comments.create')
		   	{{--end box write comment--}}

			{{--يتم معاملة المقطع التالي ك جزء كامل من اجل انشاء مكون يمثل صندوق الرد على التعليقات في ال
				vue.js 
				 للتوضيح نضع المقطع التالي كله كمحتوى ضمن 
				 reply ----> reply box comment ----> comments
				 فينتج لدينا تعليقات وردودها 
				--}}

			{{--other comment--}}
			@foreach ($post->comments as $comment)
			<div class="mx-3 border-start border-2 border-secondary">
				<div class="d-flex justify-content-start row mt-4">
					<div class="d-flex">
						{{--hr--}}
						<div class="col-1 py-4">
							<hr class="reply-list">
						</div>
						{{--end hr--}}

						{{--content comment--}}
						<div class="col-10 p-3 border-bottom">
							{{--name person--}}
							<div class="d-flex">
								<img class="rounded-circle" src="@if(!$comment->user->profile->hasProfilePic()){{ asset('images/blank-profile-picture.svg') }}@else {{ asset('storage/'.$comment->user->profile->profile_pic) }} @endif" width="60" height="60">
								<div class="d-flex flex-column ms-3">
									<p class="orange-text base-line mb-0">{{ $comment->user->name }}</p>
									<p class="text-secondary">{{ $comment->created_at->format('y-M-d h:m:s a') }}</p> 
								</div>
							</div>
							{{--end name person--}}

							{{--comment person--}}
							<div class="mt-2 text-Secondary" style="text-indent: 2rem">
								{!! $comment->content !!}
							</div>
							{{--end comment person--}}

							{{--reply--}}
							<div class="mt-2">
								<div class="col justify-content-start">
									<a class="orange-text unstyled-anchor1 TB" type="button" 
                                            data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-controls="collapseExample"
                                            aria-expanded="false">
                                            <i class="bi bi-reply"></i>
                                            reply
									</a>
									{{--reply box comment--}}
									<div class="mx-2 text-dark collapse" id="collapseExample">

										{{--comments--}}
											
										{{--commens--}}
										
										{{--box write comment--}}
										<div class="col-lg-8 ps-2 my-2">
											@include('comments.create')
										</div>
										{{--end box write comment--}}

									</div>
									{{--end reply box comment--}}
								</div>
							</div>
							{{--end reply--}}

						</div>
							
						{{--end content comment--}}

						{{--اذا كان صاحب التعليق بيطلعله هالخيار--}}

						{{--
						<div class="col-1">
							<a class="orange-text unstyled-anchor base-line" type="button" 
							data-bs-toggle="dropdown" id="#f"
							aria-expanded="false">
	
							<i class="bi bi-three-dots"></i>
							</a>
							<div class="col-6 col-md-4 col-lg-2 mx-2 card collapse text-dark dropdown-menu" aria-labelledby="fب">
								<ul class="m-3 list-unstyled">
									<li class="border-bottom mb-2" type="button"><i class="orange-text TB bi bi-pencil-square mx-1"></i> Edit</li>
									<li class="border-bottom mb-2" type="button"><i class="orange-text TB bi bi-trash mx-1"></i> Delete</li>
								</ul>
							</div>
						</div>
						--}}

						{{----}}

						{{--اذا كان صاحب البوست بيطلعله هالخيار--}}

						{{--
						<div class="col-1">
							<a class="orange-text unstyled-anchor base-line" type="button" 
							data-bs-toggle="dropdown" id="#f"
							aria-expanded="false">
	
								<i class="bi bi-three-dots"></i>
							</a>
							<div class="col-6 col-md-4 col-lg-2 mx-2 card collapse text-dark dropdown-menu" aria-labelledby="fب">
								<ul class="m-3 list-unstyled">
									<li class="border-bottom mb-2" type="button"><i class="orange-text TB bi bi-trash mx-1"></i> Delete</li>
								</ul>
							</div>
						</div>
						--}}

						{{----}}

					</div>
				</div>
			</div>
			{{--end other comment--}}
			@endforeach
			
        </div>
		{{--end comment--}}
    </div>
</div>
@endsection