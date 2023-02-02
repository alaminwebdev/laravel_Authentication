@extends('layouts.master')
@section('title', 'Admin Settings')
@php
    $user = Auth::guard('admin')->user();
@endphp
@section('content')
    <h1>Wellcome to Settings</h1>
@endsection
