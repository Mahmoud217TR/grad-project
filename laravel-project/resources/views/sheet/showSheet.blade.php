@extends('layouts.app')
@section('content')
<div class="container pt-3">
    <div class="row my-2 my-md-4">
        <div class="showSheet container codeinfo py-2 my-4 col-md-7 col-10">
            <h1 class="page-title orange-text  ps-2 pt-2 ">sheet title</h1>
             <hr>
             <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, necessitatibus? Veritatis similique ut nostrum et eum porro nobis,
                  dolore exercitationem in architecto labore eius rerum quia consectetur veniam consequuntur repudiandae!
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur doloremque est dolorum harum nisi, quasi nulla quia in architecto dolor natus quae. Iste saepe, mollitia at vero assumenda repellat impedit.</p>
             <div class="row justify-content-center  justify-content-md-end  mx-1">
                 <div class="col-md-3 text-end col-5 mb-3">
                    <button type="submit" class="btn button-primary TB box ">
                        {{ __('Edite') }}
                    </button>
                 </div>
                 <div class="col-md-2 col-5">
                    <button type="submit" class="btn button-primary TB box del ">
                        {{ __('Delete') }}
                    </button>
                 </div>
             </div>
             
        </div>
        <div class="col-md-4  d-md-flex d-none" style="margin-top: -90px; margin-left:20px;">
            @include('components.SVG7')
        </div>
      </div>
    </div>
</div>
@endsection