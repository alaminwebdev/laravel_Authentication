@extends('layouts.master')
@section('title', 'Admin Dashboard')
@php
    $user = Auth::guard('admin')->user();
@endphp
@section('content')
    <h1>Hello {{ $user->name }}  , Wellcome to Dashboard</h1>
@endsection
