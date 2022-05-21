
<div class="codesubmit container cardcode py-2 my-4">
    <h3 class="orange-text">{{$language->name}}</h3>
    <hr>
    <p class="mx-0 truncate-3-lines">{!! $language->description !!}</p>
    <div class="text-center">
        <a href="{{ route('language.show',$language) }}" class="btn button-primary TB mx-2" type="button">View</a>
        @auth
            @if(auth()->user()->isWebAdmin())
                @if($language->isRequested())
                    <a href="{{ route('language.approve',$language) }}" class="btn button-secondary TB mx-2">Approve</a>
                @endif
            @else
                <a href="#" class="btn button-secondary TB mx-2">Report</a>
            @endif
        @endauth
    </div>
    <hr class="my-2">
    <div class="text-center">
        @auth
            @if (auth()->user()->isWebAdmin())
                <a href="{{ route('code.edit',$language) }}" class="btn button-secondary TB mx-2">Edit</a>
                <remove-component 
                    text="Remove"
                    action="{{ route('language.destroy',$language->id) }}"
                    title="Removing {{ $language->title }}"
                    msg="Are you Sure you want to REMOVE {{ $language->title }}??"
                ></remove-component>
            @endif
        @endauth
    </div>
</div>