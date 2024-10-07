@extends('layouts.app')
@section('title', 'Register - PHP Boilerplate')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title fs-3">Register</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('auth.register.store') }}">
                <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ $input['name'] ?? '' }}">
                    @if (isset($errors['name']))
                        <p class="text-danger">{{ $errors['name'] }}</p>
                    @endif
                </div>
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
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
@endsection
