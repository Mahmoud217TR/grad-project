
<div class="codesubmit container cardcode py-2 my-4">
    <h3 class="orange-text">{{$code->title}}</h3>
    <hr>
    <p class="mx-0 truncate-3-lines">{{$code->description}}</p>
    <div class="text-center">
        <a href="{{ route('code.show',$code) }}" class="btn button-primary TB mx-2">View</a>
        <a href="#" class="btn button-secondary TB mx-2">Report</a>
    </div>
    <hr class="my-2">
    <div class="text-center">
        @auth
            @if (auth()->user()->isWebAdmin())
                <a href="{{ route('code.edit',$code) }}" class="btn button-secondary TB mx-2">Edit</a>
                <remove-component 
                    text="Remove"
                    action="{{ route('code.destroy',$code->id) }}"
                    title="Removing {{ $code->title }}"
                    msg="Are you Sure you want to REMOVE {{ $code->title }}??"
                ></remove-component>
            @endif
        @endauth
    </div>
</div>

