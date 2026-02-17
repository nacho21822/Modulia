@extends('layouts.app')

@section('title', 'My Profile')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endpush

@section('content')
<div class="profile-wrapper">

    {{-- Cabecera del perfil --}}
    <div class="profile-header">
        <div class="profile-avatar">
            {{-- Inicial del nombre como avatar (sin imagen, puro CSS) --}}
            {{ strtoupper(substr($user->name, 0, 1)) }}
        </div>
        <div class="profile-header-info">
            <h1>{{ $user->name }}</h1>
            <span class="profile-role-badge">{{ ucfirst($user->role) }}</span>
        </div>
    </div>

    {{-- Tarjeta con los datos --}}
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
                {{-- Formatea la fecha de creación: "February 2025" --}}
                {{ $user->created_at->format('F j, Y') }}
            </span>
        </div>

        <div class="profile-field">
            <span class="profile-label">Account type</span>
            <span class="profile-value">{{ ucfirst($user->role) }}</span>
        </div>
    </div>

    {{-- Acciones --}}
    <div class="profile-actions">
        {{-- Botón "Edit" visual (funcionalidad futura) --}}
        <button class="profile-btn-edit" disabled title="Coming soon">
            ✏️ Edit Profile
        </button>

        {{-- Volver al catálogo --}}
        <a href="{{ route('products.index') }}" class="profile-btn-back">
            ← Back to catalogue
        </a>
    </div>

</div>
@endsection