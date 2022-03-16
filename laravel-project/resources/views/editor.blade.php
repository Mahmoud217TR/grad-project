@extends('layouts.app')
@section('content')
<link href="{{ asset('css/ide.css') }}" rel="stylesheet">
    <editor-component uri ='{{ route('compile') }}' content = "{{ old('editor') }}"></editor-component>
@endsection