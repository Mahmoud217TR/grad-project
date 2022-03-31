
<div class="codesubmit container cardcode py-2 my-4">
    <h3 class="orange-text">{{$snippet->code->title}} In {{$snippet->language->name}}</h3>
    <hr>
    <p class="mx-0 truncate-3-lines">{{$snippet->note}}</p>
    <div class="text-center">
        <a href="{{ route('snippet.show',$snippet) }}" class="btn button-primary TB mx-2">View</a>
        <a href="#" class="btn button-secondary TB mx-2">Report</a>
    </div>
    <hr class="my-2">
    <div class="text-center">
        @auth
            @if (auth()->user()->isWebAdmin())
                <a href="{{ route('snippet.edit',$snippet) }}" class="btn button-secondary TB mx-2">Edit</a>
                <remove-component 
                    text="Remove"
                    action="{{ route('snippet.destroy',$snippet->id) }}"
                    title="Removing {{ $snippet->title }}"
                    msg="Are you Sure you want to REMOVE {{ $snippet->title }}??"
                ></remove-component>
            @endif
        @endauth
    </div>
</div>

