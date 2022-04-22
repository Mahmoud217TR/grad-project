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
                    <a href="{{ route('profile.show',$comment->user->profile) }}"  class="unstyled-anchor d-flex align-items-center">
                        <img class="rounded-circle" src="@if(!$comment->user->profile->hasProfilePic()){{ asset('images/blank-profile-picture.svg') }}@else {{ asset('storage/'.$comment->user->profile->profile_pic) }} @endif" width="60" height="60">
                        <div class="d-flex flex-column ms-3">
                            <p class="orange-text base-line mb-0">{{ $comment->user->name }}</p>
                            <p class="text-secondary mb-0">{{ $comment->created_at->format('y-M-d h:m:s a') }}</p> 
                        </div>
                    </a>
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
                                @include('comment.create')
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

            
            @canany(['update','delete'],$comment)
            @can('delete',$comment)
            <remove-component 
                hidden='hidden'
                button-id ='remove-post-{{ $post->id }}'
                text="Remove"
                action="{{ route('post.destroy',$post) }}"
                title="Removing {{ $post->title }}"
                msg="Are you Sure you want to REMOVE {{ $post->title }}??"
            ></remove-component>
            @endcan
                <div class="col-1">
                    <a class="orange-text unstyled-anchor base-line" type="button" 
                    data-bs-toggle="dropdown" id="#f"
                    aria-expanded="false">

                    <i class="bi bi-three-dots"></i>
                    </a>
                    <div class="col-6 col-md-4 col-lg-2 mx-2 card collapse text-dark dropdown-menu" aria-labelledby="f">
                        <ul class="m-3 list-unstyled">
                            @can('update',$comment)
                                <a class="unstyled-anchor1" href="{{ route('comment.edit',$comment) }}" class="border-bottom mb-2" type="button"><i class="orange-text TB bi bi-pencil-square mx-1"></i> Edit</a>
                            @endcan
                            @can('delete',$comment)
                                <li class="mb-2" type="button"><i class="orange-text TB bi bi-trash mx-1"></i> Delete</li>
                            @endcan
                        </ul>
                    </div>
                </div>
            @endcanany

        </div>
    </div>
</div>