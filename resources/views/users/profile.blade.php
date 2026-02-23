@extends('layouts.app')

@section('title', 'My Profile')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endpush

@section('content')
<div class="profile-wrapper">

    {{-- Profile header --}}
    <div class="profile-header">
        <div class="profile-avatar">
            {{-- Use first letter of the name as avatar (no image, CSS only) --}}
            {{ strtoupper(substr($user->name, 0, 1)) }}
        </div>
        <div class="profile-header-info">
            <h1>{{ $user->name }}</h1>
            <span class="profile-role-badge">{{ ucfirst($user->role) }}</span>
        </div>
    </div>

    {{-- Card with account details --}}
    <div class="profile-card">
        <h2 class="profile-section-title">Account Details</h2>

        <div class="profile-field">
            <span class="profile-label">Full name</span>
            <span class="profile-value">{{ $user->name }}</span>
        </div>

        <div class="profile-field">
            <span class="profile-label">Email address</span>
            <span class="profile-value">{{ $user->email }}</span>
        </div>

        <div class="profile-field">
            <span class="profile-label">Member since</span>
            <span class="profile-value">
                {{-- Format the creation date (e.g. "February 3, 2025") --}}
                {{ $user->created_at->format('F j, Y') }}
            </span>
        </div>

        <div class="profile-field">
            <span class="profile-label">Account type</span>
            <span class="profile-value">{{ ucfirst($user->role) }}</span>
        </div>
    </div>

    {{-- Actions --}}
    <div class="profile-actions">
        {{-- Visual "Edit" button (future functionality) --}}
        <button class="profile-btn-edit" disabled title="Coming soon">
            ✏️ Edit Profile
        </button>

        {{-- Back to catalogue --}}
        <a href="{{ route('products.index') }}" class="profile-btn-back">
            ← Back to catalogue
        </a>
    </div>

</div>
@endsection