@extends('layouts.app')

@section('title', 'Add Category')

{{-- CORRECCIÓN: El CSS va dentro de @push para que se inyecte en el <head> --}}
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin-forms.css') }}">
@endpush

@section('content')
<div class="admin-form-wrapper">
    <h2>Add Category</h2>

    <form method="POST" action="{{ route('categories.store') }}">
        @csrf

        <div class="admin-form-group">
            <label for="name">Category name</label>
            {{-- MEJORA: old('name') recupera el valor si falla la validación --}}
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                required
            >
            {{-- MEJORA: Muestra el error de validación del servidor --}}
            @error('name')
                <span class="error-text" style="display:block; color:red; font-size:0.85rem; margin-top:4px;">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <button type="submit" class="admin-add-btn">
            Create Category
        </button>
    </form>
</div>
@endsection