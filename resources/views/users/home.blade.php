@extends('layouts.master')
@section('title', 'Home')
@section('content')
@php
    echo Auth::guard('admin')->user();
@endphp
<h1>Hello, Wellcome to home page</h1>
    
@endsection