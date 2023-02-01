@extends('layouts.master')
@section('title', 'Dashboard')
@php
    $user = Auth::guard()->user();
@endphp
@section('content')
    <h1>Hello {{ $user->name }} , Wellcome to Dashboard</h1>
    <p>
        <span class="badge rounded-pill text-bg-secondary">
            {{ $user->status }}
        </span>
    </p>
@endsection
