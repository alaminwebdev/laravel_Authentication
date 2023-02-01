@extends('layouts.master')
@section('content')
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3>Reset Password</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('reset_password_submit') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ $email }}">
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                        @error('password')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
