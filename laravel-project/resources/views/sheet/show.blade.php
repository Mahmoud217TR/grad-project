@extends('layouts.app')
@section('content')
<div class="container pt-3">
    <div class="row my-2 my-md-4">
        <div class="showSheet container codeinfo py-2 my-4 col-md-7 col-10">
            <div class="row">
                <div class="col">
                    <h1 class="page-title orange-text  ps-2 pt-2 ">{{ $sheet->title }}</h1>
                    <hr>
                    <p>
                        {!! $sheet->description !!}
                    </p>
                    <p class="text-muted">
                        Made By {{ $sheet->user->name }}
                    </p>
                    <hr>
                </div>
            </div>
            
            @foreach ($sheet->fields as $field)
                <div class="row mt-4">
                    <div class="col ps-4">
                        <h3 class="orange-text">{{ $field->title }}</h3>  
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>{{ $field->info }}</p>
                    </div>
                </div>
             @endforeach

            <div class="row justify-content-center  justify-content-md-end  mx-1">
                @auth
                    @if (auth()->user()->isOwner($sheet))
                        <div class="col-md-3 text-end col-5 mb-3">
                            <a href="{{ route('sheet.edit',$sheet) }}" class="btn button-primary TB box ">
                                {{ __('Edit') }}
                            </a>
                        </div>
                        <div class="col-md-3 text-end col-5 mb-3">
                            <remove-component 
                                text="Remove"
                                action="{{ route('snippet.destroy',$sheet->id) }}"
                                title="Removing {{ $sheet->title }}"
                                msg="Are you Sure you want to REMOVE {{ $sheet->title }}??"
                            ></remove-component>
                        </div>
                    @else
                        <div class="col-md-3 text-end col-5 mb-3">
                            <a href="#" class="btn button-primary TB box ">
                                {{ __('Report') }}
                            </a>
                        </div>
                    @endif
                @else
                <div class="col-md-3 text-end col-5 mb-3">
                    <a href="#" class="btn button-primary TB box ">
                        {{ __('Report') }}
                    </a>
                </div>
                @endauth
            </div>
             
        </div>
        <div class="col-md-4  d-md-flex d-none" style="margin-top: -90px; margin-left:20px;">
            @include('components.SVG7')
        </div>
      </div>
    </div>
</div>
@endsection