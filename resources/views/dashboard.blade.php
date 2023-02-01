@extends('layouts.master')
@section('title', 'Dashboard')
@php
    //dd(session()->all());
@endphp
@section('content')
    <h1>Hello {{ Auth::guard()->user()->name }}, Wellcome to Dashboard</h1>
@endsection
