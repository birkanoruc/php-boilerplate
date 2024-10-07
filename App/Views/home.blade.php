@extends('layouts.app')
@section('title', 'Home - PHP Boilerplate')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title fs-3">Home</h1>
        </div>
        <div class="card-body">
            @if ($user)
                <p>Welcome, {{ $user->name }}!</p>
            @else
                <p>Please <a href="{{ url('auth.login') }}">login</a> or <a href="{{ url('auth.register') }}">register</a>
                </p>
            @endif
        </div>
    </div>
@endsection
