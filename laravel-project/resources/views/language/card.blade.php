
<div class="codesubmit container cardcode py-2 my-4">
    <h3 class="orange-text">{{$language->name}}</h3>
    <hr>
    <p class="mx-0 truncate-3-lines">{{$language->description}}</p>
    <div class="text-center">
        <a href="{{ route('language.show',$language) }}" class="btn button-primary TB mx-2" type="button">View</a>
        <a href="#" class="btn button-secondary TB mx-2" type="button">Report</a>
    </div>
</div>