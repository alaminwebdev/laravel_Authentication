@extends('layouts.master')
@section('title', 'Login')
@section('content')
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h1>Login </h1>
            </div>
            <div class="card-body">
                <form action="{{ route('login_submit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        @error('email')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                        @error('password')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('forget_password') }}" class="text-decoration-none ps-2">Forget password ?</a>
                </form>
            </div>
        </div>
    </div>
@endsection
