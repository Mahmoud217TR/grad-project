@extends('layouts.app')
@section('content')
<link href="{{ asset('css/ide.css') }}" rel="stylesheet">
    <editor-component uri ='{{ route('compile') }}'></editor-component>
@endsection