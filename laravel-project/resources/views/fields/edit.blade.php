@extends('layouts.app')
@section('title','Edit '.$sheet->title)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <fields-component back-href = "{{ route('sheet.show',$sheet) }}" add-field = "{{ route('fields.store', $sheet) }}"
                    sheet-title = "{{ $sheet->title }}" sheet-id = "{{ $sheet->id }}"
                    update-url = "{{ route('fields.update', ['sheet'=>$sheet,'field'=> 'filler']) }}" delete-url = "{{ route('fields.destroy', ['sheet'=>$sheet,'field'=> 'filler']) }}"
                    get-url = {{ route('fields.index',$sheet) }}
                ></fields-component>
            </div>
        </div>
    </div>
@endsection