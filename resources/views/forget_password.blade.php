@extends('layouts.master')
@section('content')
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3>Forget Password</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('forget_password_submit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        @error('email')
                            <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
