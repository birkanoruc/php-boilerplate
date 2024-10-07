@extends('layouts.app')
@section('title', 'Profile - PHP Boilerplate')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title fs-3">Profile</h1>
        </div>
        <div class="card-body">
            @include('profile.partials.update-profile-information')
            @include('profile.partials.update-password')
            @include('profile.partials.delete-account')
        </div>
    </div>
@endsection
