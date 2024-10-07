@extends('layouts.app')
@section('title', 'Login - PHP Boilerplate')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title fs-3">Login</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('auth.login.attemp') }}">
                <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ $input['email'] ?? '' }}">
                    @if (isset($errors['email']))
                        <p class="text-danger">{{ $errors['email'] }}</p>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    @if (isset($errors['password']))
                        <p class="text-danger">{{ $errors['password'] }}</p>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
@endsection
